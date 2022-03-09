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

      $staff_code = $_GET['staffcode'];

      $dns = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dns, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT name FROM mst_staff where code=?';
      $stmt = $dbh->prepare($sql);
      $data[]=$staff_code;
      $stmt->execute($data);

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $staff_name=$rec['name'];

      $dbh = null;

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    スタッフ情報参照<br />
    <br />
    スタッフコード<br />
    <?php print $staff_code; ?>
    <br />
    スタッフ名<br />
    <?php print $staff_name; ?>
    <br />
    <br />
    <input type="button" onclick="history.back()" value="戻る">
  </fomr>

  </body>
</html>
