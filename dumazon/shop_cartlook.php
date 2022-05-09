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

  
  if (isset($_SESSION['cart']) == true){
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $product_count = count($cart);
  }
  else{
    $product_count = 0;
  }

  if ($product_count == 0){
    $smarty->assign( 'no_products_in_cart', false);
    exit();
  }

  try{


    $ini = get_ini();
    $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
    $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pro_names = array();
    $pro_prices = array();
    $pro_gazou_names = array();
    $pro_model_numbers = array();
    $pro_categories = array();
    $pro_cartons = array();
    $pro_price_webs = array();
    $pro_stocks = array();
    $pro_gazous = array();
    $pro_quantities = array();

    foreach($cart as $key => $val){
      $sql = 'SELECT * FROM mst_product WHERE code = ?';
      $stmt = $dbh->prepare($sql);
      $data[0] = $val;
      $stmt->execute($data);

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      array_push($pro_names, $rec['name']);
      array_push($pro_prices, $rec['price']);
      array_push($pro_gazou_names, $rec['gazou']);
      array_push($pro_model_numbers, $rec['model_number']);
      array_push($pro_categories, $rec['category']);
      array_push($pro_cartons, $rec['carton']);
      array_push($pro_price_webs, $rec['price_web']);
      array_push($pro_stocks, $rec['stock']);

      if ($rec['gazou'] == ''){
        array_push($pro_gazous, '');

      }
      else{
     
        array_push($pro_gazous, '<img src = "../product/gazou/'.$rec['gazou'].'">');
      }

      array_push($pro_quantities, $kazu[$key]);
    }

    
    $smarty->assign( 'products_count', count($pro_names));

    $smarty->assign( 'pro_names', $pro_names);
    $smarty->assign( 'pro_prices', $pro_prices);
    $smarty->assign( 'pro_gazou_names', $pro_gazou_names);
    $smarty->assign( 'pro_model_numbers', $pro_model_numbers);
    $smarty->assign( 'pro_categories', $pro_categories);
    $smarty->assign( 'pro_cartons', $pro_cartons);
    $smarty->assign( 'pro_price_webs', $pro_price_webs);
    $smarty->assign( 'pro_stocks', $pro_stocks);
    $smarty->assign( 'pro_gazous', $pro_gazous);
    $smarty->assign( 'pro_quantities', $pro_quantities);

    $dbh = null;

  }catch (Exception $e){
    $smarty->assign( 'db_error', true);

    exit();
  }

  $smarty->display('shop_cartlook.tpl');


?>