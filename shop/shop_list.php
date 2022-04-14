<?php  
  session_start();
  session_regenerate_id(true);

  print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';

  if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲスト様<br />';
    print '<a href="member_login.html">ログイン</a><br />';
    print '初めてご利用ですか? 新規登録はこちら<br />';
    print '<br />';
  }
  else{
    print 'ようこそ<br />';
    print $_SESSION['member_name'];
    print '様　';
    print '<a href="member_account.php">アカウント</a><br />';
    print '<br />';
  }
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
      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT code,name, price FROM mst_product where 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      print '商品一覧<br /><br />';

      while(true){

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false){
          break;
        }

        print '<a href="shop_product.php?procode='.$rec['code'].'">';
        print $rec['name'].'---';
        print $rec['price'].'円';
        print '<a />';
        print '<br />';
      }

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    print '<br />';
    print '<a href="shop_cartlook.php">カートを見る</a><br />';

    print '<br />';
    print '<a href="../staff_login/staff_login.html">スタッフログイン</a><br />';
    ?>

  </body>
</html>
