<?php  

  require("../smarty/libs/Smarty.class.php");
  $smarty = new Smarty();
  $smarty->template_dir = "./templates";
  $smarty->compile_dir = "./templates_c";
  $smarty->cache_dir = "./cache";
  $smarty->config_dir = "./configs";

  try{

    require_once($_SERVER['DOCUMENT_ROOT']. '/dumazon/common/common.php');

    $post=sanitize($_POST);

    $member_name=$post['name'];
    $member_email=$post['email'];
    $member_company_name=$post['company_name'];
    $member_division_name=$post['division_name'];
    $member_pass=$post['pass'];
    $member_pass2=$post['pass2'];

    $smarty->assign( 'member_name', $member_name);
    $smarty->assign( 'member_email', $member_email);
    $smarty->assign( 'member_company_name', $member_company_name);
    $smarty->assign( 'member_division_name', $member_division_name);
    $smarty->assign( 'member_pass_MD5', md5($member_pass));

    $okflg = true;

    if($member_name==''){

      $smarty->assign( 'invalid_member_name', true);
      $okflg = false;
    }
    else{

      $smarty->assign( 'invalid_member_name', false);
    }

    if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $member_email) == 0){
      $smarty->assign( 'invalid_member_email', true);
      $okflg = false;
    }
    else {

      $ini = get_ini();
      $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
      $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $sql = 'SELECT member_name FROM dat_member where email=? LIMIT 1';
      $stmt = $dbh->prepare($sql);
      $data[] = $member_email;
      $stmt->execute($data);

      $dbh = null;

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($rec['member_name'] != ''){
        
        $smarty->assign( 'duplicate_member_email', true);
        $okflg = false;
      }
      else {
        
        $smarty->assign( 'invalid_member_email', false);
        $smarty->assign( 'duplicate_member_email', false);
      }
    }
    
    if($member_company_name==''){

      $smarty->assign( 'invalid_company_name', true);
      $okflg = false;
    }
    else{

      $smarty->assign( 'invalid_company_name', false);
    }

    if($member_division_name==''){

      $smarty->assign( 'invalid_division_name', true);
      $okflg = false;
    }
    else{

      $smarty->assign( 'invalid_division_name', false);
    }

    if($member_pass==''){

      $smarty->assign( 'invalid_member_pass', true);
      $okflg = false;
    }
    else if ($member_pass!=$member_pass2){
      $smarty->assign( 'incorrect_member_pass', true);
      $okflg = false;
    }
    else{
      $smarty->assign( 'invalid_member_pass', false);
      $smarty->assign( 'incorrect_member_pass', false);
    }

    if($okflg==false){

      $smarty->assign( 'invalid_input', false);
    }
    else{

      $smarty->assign( 'invalid_input', false);
    }
  }
  catch (Exception $e){

    $smarty->assign( 'db_error', false);
  }

  $smarty->display('member_add_check.tpl');
?>
