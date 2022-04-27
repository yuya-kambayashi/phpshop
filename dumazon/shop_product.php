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

  try{
    require_once($_SERVER['DOCUMENT_ROOT']. '/dumazon/common/common.php');

    $pro_code = $_GET['procode'];

    $ini = get_ini();
    $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
    $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
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
      $disp_gazou = '<img src = "../product/gazou/'.$pro_gazou_name.'">';
    }

    $smarty->assign( 'pro_code', $pro_code);
    $smarty->assign( 'pro_name', $pro_name);
    $smarty->assign( 'pro_price', $pro_price);
    $smarty->assign( 'disp_gazou', $disp_gazou);
    $smarty->assign( 'pro_model_number', $pro_model_number);
    $smarty->assign( 'pro_category', $pro_category);
    $smarty->assign( 'pro_carton', $pro_carton);
    $smarty->assign( 'pro_price_web', $pro_price_web);
    $smarty->assign( 'pro_stock', $pro_stock);
    $smarty->assign( 'pro_specification', $pro_specification);
    $smarty->assign( 'pro_feature', $pro_feature);


    $smarty->assign( 'db_error', false);

  }catch (Exception $e){
    $smarty->assign( 'db_error', true);
    exit();
  }

  // CPQ連携

  $web_id = '';
  $company_name = '';
  $division_name = '';
  $member_name = '';

  if(isset($_SESSION['member_login'])==true){

    try{
      require_once($_SERVER['DOCUMENT_ROOT']. '/dumazon/common/common.php');

      $member_id= $_SESSION['member_id'];

      $ini = get_ini();
      $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
      $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT member_name, web_id, company_name, division_name FROM dat_member WHERE id = ?';
      $stmt = $dbh->prepare($sql);
      $data[0] = $member_id;
      $stmt->execute($data);
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      $dbh = null;

      $web_id = $rec['web_id'];
      $company_name = $rec['company_name'];
      $division_name = $rec['division_name'];
      $member_name = $rec['member_name'];

    }catch (Exception $e){
      $smarty->assign( 'db_error', true);
      exit();
    }
  }

  require_once($_SERVER['DOCUMENT_ROOT']. '/dumazon/common/encrypt.php');

  
  // Usage:
  $raw_data = array(
    'web_id' 		=> $web_id,
    'company_name' 	=> $company_name,
    'division_name'	=> $division_name,
    'member_name' 	=> $member_name
  );
  $smarty->assign( 'raw_data', $raw_data);

  // jsonに変換
  $json_string = json_encode( $raw_data );
  $smarty->assign( 'json_string', $json_string);

  // 暗号化用事前共有鍵（8桁のランダム文字列）
  // !!!!!10桁ではなく、8桁!!!!!!!!!!!!!!!
  $password = "Tu31J7F1";
  $smarty->assign( 'password', $password);

  // 暗号化処理
  $encrypted = encrypt($json_string, $password);
  $smarty->assign( 'encrypted', $encrypted);

  $rawurlencode = rawurlencode($encrypted);
  $smarty->assign( 'rawurlencode', $rawurlencode);

  // 復号処理
  $decrypted = decrypt($encrypted, $password);
  $smarty->assign( 'decrypted', $decrypted);
    
  $smarty->display('shop_product.tpl');
?>