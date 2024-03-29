<?php
  session_start();
  session_regenerate_id(true);

  print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';

  if(isset($_SESSION['login'])==false){
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
  }
  else{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br />';
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
      require_once('../common/common.php');

      $ini = get_ini();
      $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
      $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT * FROM mst_product where 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      print '商品一覧<br /><br />';

      print '<form method="post"action="pro_branch.php">';
      print '<table border="1">';
      print '<tr>';
      print '<td></td>';
      print '<td>画像</td>';
      print '<td>商品名</td>';
      print '<td>型番</td>';
      print '<td>商品区分</td>';
      print '<td>入り数</td>';
      print '<td>標準価格</td>';
      print '<td>Web価格</td>';
      print '<td>在庫</td>';
      print '</tr>';
      while(true){

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false){
          break;
        }

        print '<tr>';
        print '<td>'.'<input type="radio" name="procode" value="'.$rec['code'].'">'.'</td>';
        print '<td>'.$rec['gazou'].'</td>';
        print '<td>'.$rec['name'].'</td>';
        print '<td>'.$rec['model_number'].'</td>';
        print '<td>'.$rec['category'].'</td>';
        print '<td>'.$rec['carton'].'</td>';
        print '<td>'.$rec['price'].'</td>';
        print '<td>'.$rec['price_web'].'</td>';
        print '<td>'.$rec['stock'].'</td>';
        print '</tr>';
      }
      
      print '</table>';
      print '<br>';

      print '<input type="submit" name="disp" value="参照">';
      print '<input type="submit" name="add" value="追加">';
      print '<input type="submit" name="edit" value="修正">';
      print '<input type="submit" name="delete" value="削除">';
      print '</form>';

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    <br />
    <a href="../staff_login/staff_top.php">トップメニューへ</a><br />

  </body>
</html>
