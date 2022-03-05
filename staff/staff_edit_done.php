<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
      <?php

    try{

      $staff_code=$_POST['code'];
      $staff_name=$_POST['name'];
      $staff_pass=$_POST['pass'];

      $staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
      $staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

      $dns = 'mysql:dbname=shop;host=localhost;sharset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dns, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'UPDATE mst_staff SET name=?, password=? where code=?';
      $stmt = $dbh->prepare($sql);
      $data[] = $staff_name;
      $data[] = $staff_pass;
      $data[] = $staff_code;
      $stmt->execute($data);

      $dbh = null;

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    修正しました。<br />
    <br />

    <a href="staff_list.php">戻る</a>

  </body>
</html>
