<?php  

  require("../smarty/libs/Smarty.class.php");
  $smarty = new Smarty();
  $smarty->template_dir = "./templates";
  $smarty->compile_dir = "./templates_c";
  $smarty->cache_dir = "./cache";
  $smarty->config_dir = "./configs";

  $smarty->display('shop_cartin.tpl');

  session_start();
  session_regenerate_id(true);

  $smarty->assign( 'member_login', isset($_SESSION['member_login']));
  if (isset($_SESSION['member_login'])){
    $smarty->assign( 'member_name', $_SESSION['member_name']);
  }

  require_once($_SERVER['DOCUMENT_ROOT']. '/dumazon/common/common.php');

  try{

    $pro_code = $_GET['procode']; 

    if(isset($_SESSION['cart'])==true){
      $cart=$_SESSION['cart'];
      $kazu=$_SESSION['kazu'];

      if(in_array($pro_code, $cart)==true){
        
        $smarty->assign( 'existing_in_cart', true);
        exit();
      }
    }
    $cart[] = $pro_code;
    $kazu[] = 1;
    $_SESSION['cart']=$cart;
    $_SESSION['kazu']=$kazu;
    
  }catch (Exception $e){
    $smarty->assign( 'db_error', true);
    exit();
  }
?>