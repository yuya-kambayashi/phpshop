<?php
  session_start();
  session_regenerate_id(true);

  print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php

      try{
        require_once('../common/common.php');

        $post = sanitize($_POST);

        $onamae = $post['onamae'];
        $email = $post['email'];
        $company_name = $post['company_name'];
        $division_name = $post['division_name'];
        $postal1 = $post['postal1'];
        $postal2 = $post['postal2'];
        $address = $post['address'];
        $tel = $post['tel'];
        $chumon = $post['chumon'];
        $pass = $post['pass'];
        $danjo = $post['danjo'];
        $birth = $post['birth'];
        
        print $onamae.'様<br />';
        print 'ご注文ありがとうございました。<br />';
        print $email.'にメールをお送りしましたのでご確認ください。<br />';
        print '商品は以下の住所に発送させていただきます。<br />';
        print $postal1.'-'.$postal2.'<br />';
        print $address.'<br />';
        print $tel.'<br />';

        $honbun="";
        $honbun.=$onamae."様\n\nこのたびはご注文ありがとうございました。\n";
        $honbun.="\n";
        $honbun.="ご注文商品\n";
        $honbun.="---------------------\n";

        $cart=$_SESSION['cart'];
        $kazu=$_SESSION['kazu'];
        $max=count($cart);

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        for($i = 0; $i <$max; $i++){
          
          $sql = 'SELECT name, price FROM mst_product where code=?';
          $stmt = $dbh->prepare($sql);
          $data[0]=$cart[$i];
          $stmt->execute($data);

          $rec = $stmt->fetch(PDO::FETCH_ASSOC);

          $name = $rec['name'];
          $price = $rec['price'];
          $kakaku[] = $price;
          $suryo = $kazu[$i];
          $shokei = $price * $suryo;

          $honbun.=$name.' ';
          $honbun.=$price.'円 x ';
          $honbun.=$suryo.'個 = ';
          $honbun.=$shokei.'円\n';

        }

        $sql = 'LOCK TABLES dat_sales WRITE, dat_sales_product WRITE, dat_member WRITE';
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $lastmemberid=0;

        if($chumon=='chumontouroku'){

          $sql = 'INSERT INTO dat_member(password, member_name, email, postal1, postal2, address, tel, danjo, born, web_id, company_name, division_name ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)';
          $stmt= $dbh->prepare($sql);
          $data = array();
          $data[] = md5($pass);
          $data[] = $onamae;
          $data[] = $email;
          $data[] = $postal1;
          $data[] = $postal2;
          $data[] = $address;
          $data[] = $tel;
          if ( $danjo == 'dan'){
            $data[] = 1;
          }
          elseif ($danjo=='jo'){
            $data[] = 2;
          }
          elseif ($danjo=='sonota'){
            $data[] = 3;
          }
          elseif ($danjo=='noanswer'){
            $data[] = 4;
          }
          $data[] = $birth;
          $data[] = '01234567';
          $data[] = $company_name;
          $data[] = $division_name;

          $stmt->execute($data);

          $sql = 'SELECT LAST_INSERT_ID()';
          $stmt = $dbh->prepare($sql);
          $stmt->execute();

          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          $lastmemberid = $rec['LAST_INSERT_ID()'];
        }

        $sql = 'INSERT INTO dat_sales( id_member, name, email, postal1, postal2, address, tel) VALUES (?,?,?,?,?,?,?) ';
        $stmt = $dbh->prepare($sql);
        $data = array();
        $data[] = $lastmemberid;
        $data[] = $onamae;
        $data[] = $email;
        $data[] = $postal1;
        $data[] = $postal2;
        $data[] = $address;
        $data[] = $tel;
        $stmt->execute($data);

        $sql = 'SELECT LAST_INSERT_ID()';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastcode = $rec['LAST_INSERT_ID()'];

        for ($i = 0; $i < $max; $i++){

          $sql = 'INSERT INTO dat_sales_product( code_sales, code_product, price, quantity) VALUES (?,?,?,?) ';
          $stmt = $dbh->prepare($sql);
          $data = array();
          $data[] = $lastcode;
          $data[] = $cart[$i];
          $data[] = $kakaku[$i];
          $data[] = $kazu[$i];
          $stmt->execute($data);

        }

        $sql = 'UNLOCK TABLES';
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $dbh = null;

        if($chumon == 'chumontouroku'){
          print '会員登録が完了いたしました。<br />';
          print '次回からメールアドレスとパスワードでログインしてください。<br />';
          print 'ご注文が簡単にできるようになります。<br />';
          print '<br />';
        }

        $honbun.="送料は無料です。\n";
        $honbun.="---------------------\n";
        $honbun.="\n";

        print '<br />';
        print nl2br($honbun);

        $title ='ご注文ありがとうございます。';
        $header = 'From:info@aaa.co.jp';
        $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
        mb_language('Japanese');
        mb_internal_encoding('UTF-8');
        // mb_send_mail($email, $title, $honbun, $header);

      }catch (Exception $e){
        print 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
      }

      
      // カートを空にします
      session_destroy();

    ?>

  <br />
  <a href = "shop_list.php">商品一覧へ</a>

  </body>
</html>
