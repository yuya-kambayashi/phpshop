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

      $staff_name=$_POST['name'];
      $staff_pass=$_POST['pass'];

      $staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
      $staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

      $dns = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dns, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'INSERT INTO mst_staff(name, password) VALUES (?,?)';
      $stmt = $dbh->prepare($sql);
      $data[] = $staff_name;
      $data[] = $staff_pass;
      $stmt->execute($data);

      $dbh = null;

      print $staff_name;
      print 'さんを追加しました。<br />';

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    <a href="staff_list.php">戻る</a>

  </body>
</html>
