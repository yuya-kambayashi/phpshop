<?php  

    require("../smarty/libs/Smarty.class.php");
    $smarty = new Smarty();
    $smarty->template_dir = "./templates";
    $smarty->compile_dir = "./templates_c";
    $smarty->cache_dir = "./cache";
    $smarty->config_dir = "./configs";

    $smarty->assign( 'name', 'yuya');

    $logined = !isset($_SESSION['member_login']);

    $smarty->assign( 'logined', $logined);


  session_start();
  session_regenerate_id(true);

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

    $smarty->display('shop_list2.tpl');

?>
