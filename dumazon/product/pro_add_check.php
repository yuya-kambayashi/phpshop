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
      $pro_gazou=$_FILES['gazou'];

      $okflg = true;

      if($pro_name==''){
          print '商品名が入力されていません。<br />';
          $okflg = false;
      }
      else{
          print '商品名:';
          print $pro_name;
          print '<br />';
      }

      if($pro_model_number==''){
          print '型番が入力されていません。<br />';
          $okflg = false;
      }
      else{
          print '型番:';
          print $pro_model_number;
          print '<br />';
      }
            
      if($pro_category==''){
          print '商品区分が入力されていません。<br />';
          $okflg = false;
      }
      else{
          print '商品区分:';
          print $pro_category;
          print '<br />';
      }

      if(preg_match('/\A[0-9]+\z/', $pro_carton)==0){
          print '入り数をきちんと入力してください。<br />';
          $okflg = false;
      }
      else{
          print '入り数:';
          print $pro_carton;
          print '<br />';
      }

      if(preg_match('/\A[0-9]+\z/', $pro_price)==0){
        print '標準価格をきちんと入力してください。<br />';
        $okflg = false;
      }
      else{
        print '標準価格:';
        print $pro_price;
        print '<br />';
      }

      if(preg_match('/\A[0-9]+\z/', $pro_price_web)==0){
        print 'Web価格をきちんと入力してください。<br />';
        $okflg = false;
      }
      else{
        print 'Web価格:';
        print $pro_price_web;
        print '<br />';
      }

      if(preg_match('/\A[0-9]+\z/', $pro_stock)==0){
        print '在庫をきちんと入力してください。<br />';
        $okflg = false;
      }
      else{
        print '在庫:';
        print $pro_stock;
        print '<br />';
      }

      if($pro_specification==''){
          print '仕様が入力されていません。<br />';
          $okflg = false;
      }
      else{
          print '仕様:';
          print $pro_specification;
          print '<br />';
      }

      if($pro_feature==''){
          print '特徴が入力されていません。<br />';
          $okflg = false;
      }
      else{
          print '特徴:';
          print $pro_feature;
          print '<br />';
      }

      if ($pro_gazou['size'] > 0){
        if($pro_gazou['size'] > 10000000){
          print "画像が大きすぎます";
          $okflg = false;
        }
        else{
          move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
          print '<img src = "./gazou/'.$pro_gazou['name'].'">';
          print '<br />';
        }
      }

      if($okflg == false){
          print '<form>';
          print '<input type="button" onclick="history.back()" value="戻る">';
          print '</form>';
      }
      else{
          print '上記の商品を追加します。<br />';
          print '<form method="post" action="pro_add_done.php">';
          print '<input type="hidden" name="name" value="'.$pro_name.'">';
          print '<input type="hidden" name="model_number" value="'.$pro_model_number.'">';
          print '<input type="hidden" name="category" value="'.$pro_category.'">';
          print '<input type="hidden" name="carton" value="'.$pro_carton.'">';
          print '<input type="hidden" name="price" value="'.$pro_price.'">';
          print '<input type="hidden" name="price_web" value="'.$pro_price_web.'">';
          print '<input type="hidden" name="stock" value="'.$pro_stock.'">';
          print '<input type="hidden" name="specification" value="'.$pro_specification.'">';
          print '<input type="hidden" name="feature" value="'.$pro_feature.'">';
          print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
          print '<br />';
          print '<input type="button" onclick="history.back()" value="戻る">';
          print '<input type="submit" value="ＯＫ">';
          print '</form>';          
      }
      ?>  
  </body>
</html>
