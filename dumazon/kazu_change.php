<?php
  require("../smarty/libs/Smarty.class.php");
  $smarty = new Smarty();
  $smarty->template_dir = "./templates";
  $smarty->compile_dir = "./templates_c";
  $smarty->cache_dir = "./cache";
  $smarty->config_dir = "./configs";


  session_start();
  session_regenerate_id(true);

  $smarty->assign( 'member_login', isset($_SESSION['member_login']));
  if (isset($_SESSION['member_login'])){
    $smarty->assign( 'member_name', $_SESSION['member_name']);
  }

  require_once($_SERVER['DOCUMENT_ROOT']. '/dumazon/common/common.php');

  $post = sanitize($_POST);

  $product_count = $_POST['product_count'];

  $smarty->assign( 'product_count', $product_count);

  print var_dump($post).'<br />';
  print "pro_stock0 " . $post['pro_stock0'].'<br /><br />';
  


  for($i = 0; $i < $product_count; $i++){

    if (preg_match("/\A[0-9]+\z/", $post['pro_stock'.$i])==0){
  //     print '数量に誤りがあります。<br />';
  //     print '<a href="shop_cartlook.php">カートに戻る</a>';
  //     exit();

        $smarty->assign( 'has_count_error', true);
    }

  //   if ($post['kazu'.$i] < 1 || 10 < $post['kazu'.$i]){
  //     print '数量は必ず1以上10個までです。<br />';
  //     print '<a href="shop_cartlook.php">カートに戻る</a>';
  //     exit();
  //   }

  //   if ($post['kazu'.$i] > $post['pro_stock'.$i]){
  //     print '数量が在庫を超えています<br />';
  //     print '<a href="shop_cartlook.php">カートに戻る</a>';
  //     exit();
  //   }

  //   $kazu[] = $post['kazu'.$i];
  // }

  // $cart=$_SESSION['cart'];

  // for($i = $product_count; 0 <= $i; $i--){

  //   if (isset($_POST['sakujo'.$i]) == true){

  //     array_splice($cart, $i, 1);
  //     array_splice($kazu, $i, 1);

  //   }
  }
  // $_SESSION['cart'] = $cart;
  // $_SESSION['kazu'] = $kazu;

  // header('Location:shop_cartlook.php');
  // exit();
    
  $smarty->display('kazu_change.tpl');

?>