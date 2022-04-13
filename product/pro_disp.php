<?php
  session_start();
  session_regenerate_id(true);
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

      $pro_code = $_GET['procode'];

      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT * FROM mst_product where code=?';
      $stmt = $dbh->prepare($sql);
      $data[]=$pro_code;
      $stmt->execute($data);

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $pro_name=$rec['name'];
      $pro_price=$rec['price'];
      $pro_gazou_name=$rec['gazou'];
      $pro_model_number=$rec['model_number'];
      $pro_category=$rec['category'];
      $pro_carton=$rec['carton'];
      $pro_price_web=$rec['price_web'];
      $pro_stock=$rec['stock'];
      $pro_specification=$rec['specification'];
      $pro_feature=$rec['feature'];

      $dbh = null;

      if ($pro_gazou_name==''){
          $disp_gazou='';
      }
      else{
        $disp_gazou = '<img src = "./gazou/'.$pro_gazou_name.'">';
      }

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

  <form>
    商品情報参照<br />
    <br />
    <br />
    商品コード<br />
    <?php print $pro_code; ?>
    <br />
    <br />
    商品名<br />
    <?php print $pro_name; ?>
    <br />
    <br />
    型番<br />
    <?php print $pro_model_number; ?>
    <br />
    <br />
    商品区分<br />
    <?php print $pro_category; ?>
    <br />
    <br />
    入り数<br />
    <?php print $pro_carton; ?>個
    <br />
    <br />
    標準価格<br />
    <?php print $pro_price; ?>円
    <br />
    <br />
    Web価格<br />
    <?php print $pro_price_web; ?>円
    <br />
    <br />
    在庫<br />
    <?php print $pro_stock; ?>個
    <br />    
    <br />    
    仕様<br />
    <?php print $pro_specification; ?>
    <br />    
    <br />    
    特徴<br />
    <?php print $pro_feature; ?>
    <br />
    <br />
    <?php print $disp_gazou; ?>
    <br />
    <br />
    <input type="button" onclick="history.back()" value="戻る">
  </form>

  </body>
</html>
