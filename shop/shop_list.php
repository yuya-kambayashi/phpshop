<?php  
  session_start();
  session_regenerate_id(true);

  print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';

  if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲスト様<br />';
    print '<a href="member_login.html">ログイン</a><br />';
    print '初めてご利用ですか? ';
    print '<a href="member_add.php">新規登録</a>';
    print 'はこちら<br />';
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
      require_once('../common/common.php');

      $ini = get_ini();
      print var_dump($ini).'<br />';
      $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
      $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT * FROM mst_product where 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      print '商品一覧<br /><br />';

      print '<table border="1">';
      print '<tr>';
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
        print '<td>'.$rec['gazou'].'</td>';
        print '<td><a href="shop_product.php?procode='.$rec['code'].'">'.$rec['name'].'</a></td>';
        print '<td>'.$rec['model_number'].'</td>';
        print '<td>'.$rec['category'].'</td>';
        print '<td>'.$rec['carton'].'</td>';
        print '<td>'.$rec['price'].'</td>';
        print '<td>'.$rec['price_web'].'</td>';
        print '<td>'.$rec['stock'].'</td>';
        print '</tr>';
      }

      print '</table>';


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
