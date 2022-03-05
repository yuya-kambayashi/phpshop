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

      $sql = 'SELECT code,name FROM mst_staff where 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      print 'スタッフ一覧<br /><br />';

      print '<form method="post"action="staff_edit.php">';
      while(true){

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false){
          break;
        }

        print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
        print $rec['name'];
        print '<br />';
      }

      print '<input type="submit" value="修正">';
      print '</form>';

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    <a href="staff_list.php">戻る</a>

  </body>
</html>
