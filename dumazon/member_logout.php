<?php
  require("../smarty/libs/Smarty.class.php");
  $smarty = new Smarty();
  $smarty->template_dir = "./templates";
  $smarty->compile_dir = "./templates_c";
  $smarty->cache_dir = "./cache";
  $smarty->config_dir = "./configs";

  session_start();
  $_SESSION=array();
  if(isset($_COOKIE[session_name()])==true){
    
    setcookie(session_name(), '', time()-42000,'/');
  }
  session_destroy();

  $smarty->display('member_logout.tpl');
?>