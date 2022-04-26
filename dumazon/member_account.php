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

  require_once($_SERVER['DOCUMENT_ROOT']. '/dumazon/common/common.php');

  try {

    $member_id= $_SESSION['member_id'];

    $ini = get_ini();
    $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
    $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    $sql = 'SELECT member_name, email, postal1, postal2, address, tel FROM dat_member WHERE id = ?';
    $stmt = $dbh->prepare($sql);
    $data[0] = $member_id;
    $stmt->execute($data);
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $dbh = null;

    $smarty->assign( 'onamae', $rec['member_name']);
    $smarty->assign( 'email', $rec['email']);
    $smarty->assign( 'postal1', $rec['postal1']);
    $smarty->assign( 'postal2', $rec['postal2']);
    $smarty->assign( 'address', $rec['address']);
    $smarty->assign( 'tel', $rec['tel']);

    $smarty->assign( 'db_error', false);
  }
  catch (Exception $e){
    $smarty->assign( 'db_error', true);
    exit();
  }
    
  $smarty->display('member_account.tpl');

?>
