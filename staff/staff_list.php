<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
      <?php

    try{
      $dns = 'mysql:dbname=shop;host=localhost;sharset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dns, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT name FROM mst_staff where 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      print 'スタッフ一覧<br /><br />';

      while(true){

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false){
          break;
        }

        print $rec['name'];
        print '<br />';
      }

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    <a href="staff_list.php">戻る</a>

  </body>
</html>
