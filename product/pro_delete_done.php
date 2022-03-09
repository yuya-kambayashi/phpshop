<?php
  session_start();
  session_regenerate_id(true);
  if(isset($_SESSION['login'])==false){
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
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

      $pro_code=$_POST['code'];
      $pro_gazou_name=$_POST['gazou_name'];

      $dns = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dns, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'DELETE FROM mst_product where code=?';
      $stmt = $dbh->prepare($sql);
      $data[] = $pro_code;
      $stmt->execute($data);

      $dbh = null;

      if($pro_gazou_name != ''){
        unlink('./gazou/'.$pro_gazou_name);
      }

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    削除しました。<br />
    <br />

    <a href="pro_list.php">戻る</a>

  </body>
</html>
