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

      require_once('../common/common.php');

      $post=sanitize($_POST);

      $pro_name=$post['name'];
      $pro_model_number=$post['model_number'];
      $pro_category=$post['category'];
      $pro_carton=$post['carton'];
      $pro_price=$post['price'];
      $pro_price_web=$post['price_web'];
      $pro_stock=$post['stock'];
      $pro_specification=$post['specification'];
      $pro_feature=$post['feature'];
      $pro_gazou_name=$post['gazou_name'];

      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'INSERT INTO mst_product(name, price, gazou, model_number, category, carton, price_web, stock, specification, feature) VALUES (?,?,?,?,?,?,?,?,?,?)';
      $stmt = $dbh->prepare($sql);
      $data[] = $pro_name;
      $data[] = $pro_price;
      $data[] = $pro_gazou_name;
      $data[] = $pro_model_number;
      $data[] = $pro_category;
      $data[] = $pro_carton;
      $data[] = $pro_price_web;
      $data[] = $pro_stock;
      $data[] = $pro_specification;
      $data[] = $pro_feature;
      $stmt->execute($data);

      $dbh = null;

      print $pro_name;
      print 'を追加しました。<br />';

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    <a href="pro_list.php">戻る</a>

  </body>
</html>
