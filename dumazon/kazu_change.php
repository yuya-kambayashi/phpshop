<?php
  session_start();
  session_regenerate_id(true);

  require_once($_SERVER['DOCUMENT_ROOT']. '/dumazon/common/common.php');

  $post = sanitize($_POST);

  print var_dump($post);

  $product_count = $_POST['product_count'];
  for($i = 0; $i < $product_count; $i++){

    if (preg_match("/\A[0-9]+\z/", $post['pro_quantity'.$i])==0){

      print '数量に誤りがあります。<br />';
      print '<a href="shop_cartlook.php">カートに戻る</a>';
      exit();
    }

    if ($post['pro_quantity'.$i] < 1 || 10 < $post['pro_quantity'.$i]){

      print '数量は必ず1以上10個までです。<br />';
      print '<a href="shop_cartlook.php">カートに戻る</a>';
      exit();
    }

    if ($post['pro_quantity'.$i] > $post['pro_stock'.$i]){

      print '数量が在庫を超えています<br />';
      print '<a href="shop_cartlook.php">カートに戻る</a>';
      exit();
    }

     $kazu[] = $post['pro_quantity'.$i];
  }

  $cart=$_SESSION['cart'];

  for($i = $product_count; 0 < $i; $i--){

    if (isset($post['sakujo'.$i]) == true){

      print '削除対象：';
      print $i;
      print '<br />';

      array_splice($cart, $i, 1);
      array_splice($kazu, $i, 1);

    }
    else{
      print '削除対象外：';
      print $i;
      print '<br />';
    }
  }
  $_SESSION['cart'] = $cart;
  $_SESSION['kazu'] = $kazu;

  header('Location:shop_cartlook.php');
  exit();
?>