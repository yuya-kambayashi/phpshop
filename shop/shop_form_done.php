<?php
  session_start();
  session_regenerate_id(true);
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
        $postal1 = $post['postal1'];
        $postal2 = $post['postal2'];
        $address = $post['address'];
        $tel = $post['tel'];

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

        $dns = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dns, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        for($i = 0; $i <$max; $i++){
          
          $sql = 'SELECT name, price FROM mst_product where code=?';
          $stmt = $dbh->prepare($sql);
          $data[0]=$cart[$i];
          $stmt->execute($data);

          $rec = $stmt->fetch(PDO::FETCH_ASSOC);

          $name = $rec['name'];
          $price = $rec['price'];
          $suryo = $kazu[$i];
          $shokei = $price * $suryo;

          $honbun.=$name.' ';
          $honbun.=$price.'円 x ';
          $honbun.=$suryo.'個 = ';
          $honbun.=$shokei.'円\n';

        }

        $dbh = null;

        $honbun.="送料は無料です。\n";
        $honbun.="-------------\n";
        $honbun.="\n";


      }catch (Exception $e){
        print 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
      }

    ?>
  </body>
</html>
