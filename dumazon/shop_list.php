<?php  

  require("../smarty/libs/Smarty.class.php");
  $smarty = new Smarty();
  $smarty->template_dir = "./templates";
  $smarty->compile_dir = "./templates_c";
  $smarty->cache_dir = "./cache";
  $smarty->config_dir = "./configs";

  $smarty->assign( 'name', 'yusaaassya');


  session_start();
  session_regenerate_id(true);

  print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';

  $smarty->assign( 'member_login', isset($_SESSION['member_login']));
  $smarty->assign( 'member_name', isset($_SESSION['member_name']));

  require_once('./common/common.php');

  $ini = get_ini();
  $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
  $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = 'SELECT * FROM mst_product where 1';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $dbh = null;

  $products = array();

  while(true){

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false){
      break;
    }

    $product = array(
      'gazou' => $rec['gazou']
    , 'code' =>  $rec['code']
    , 'name' =>  $rec['name']
    , 'model_number' =>  $rec['model_number']
    , 'category' =>  $rec['category']
    , 'carton' =>  $rec['carton']
    , 'price' =>  $rec['price']
    , 'price_web' =>  $rec['price_web']
    , 'stock' =>  $rec['stock']
  );
    array_push($products, $product);
  }

  $smarty->assign( 'products', $products);



//   if(isset($_SESSION['member_login'])==false){
//     // print 'ようこそゲスト様<br />';
//     // print '<a href="member_login.html">ログイン</a><br />';
//     // print '初めてご利用ですか? ';
//     // print '<a href="member_add.php">新規登録</a>';
//     // print 'はこちら<br />';
//     // print '<br />';
//   }
//    else{
// //     print 'ようこそ<br />';
// //     print $_SESSION['member_name'];
// //     print '様　';
// //     print '<a href="member_account.php">アカウント</a><br />';
// //     print '<br />';
//   }

    $smarty->display('shop_list.tpl');

    


?>
