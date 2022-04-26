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
            
        $member_email=$post['email'];
        $member_pass=$post['pass'];
        
        $member_pass=md5($member_pass);

        $ini = get_ini();
        $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
        $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT id, member_name FROM dat_member where email = ? AND password = ?';
        $stmt = $dbh->prepare($sql);
        $data[]=$member_email;
        $data[]=$member_pass;
        $stmt->execute($data);

        $dbh = null;

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec==false){
            
            $smarty->assign( 'input_error', true);
        }
        else{

            session_start();
            $_SESSION['member_login']=1;
            $_SESSION['member_id']=$rec['id'];
            $_SESSION['member_name']=$rec['member_name'];

            header('Location: ./shop_list.php');
            $smarty->assign( 'input_error', false);
            $smarty->assign( 'db_error', false);
        }
    }catch (Exception $e){
        
        $smarty->assign( 'db_error', true);
    }

    $smarty->display('member_login_check.tpl');
?>