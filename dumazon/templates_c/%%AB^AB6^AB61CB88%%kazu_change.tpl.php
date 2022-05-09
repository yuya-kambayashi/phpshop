<?php /* Smarty version 2.6.31, created on 2022-05-09 08:17:24
         compiled from kazu_change.tpl */ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Dumazon.co.jp 公式サイト。ダマゾンで本, 日用品, ファッション, 食品, ベビー用品, カー用品ほか一億種の商品をいつでもお安く。通常配送無料(一部を除く)</title>
  		<link rel="stylesheet" type="text/css" href="./css/header.css">
  </head>
  <body>
    <div class="header">
      <a href='./shop_list.php'><img src='./img/logo_small.jpg' class="header_logo"></a>
    </div>
    <?php if ($this->_tpl_vars['member_login'] == false): ?>
      ようこそゲスト様<br />
      <a href="./member_login.html">ログイン</a><br />
      初めてご利用ですか?<a href="./member_add.php">新規登録</a>はこちら<br />
      <br />
    <?php else: ?>
      ようこそ<br />
      <?php echo $this->_tpl_vars['member_name']; ?>
様<br />
      <a href="./member_account.php">アカウント</a><br />
      <br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['has_count_error'] == true): ?>
      数量に誤りがあります。<br />
      <a href="./member_login.html">ログイン</a><br />
      <a href="shop_cartlook.php">カートに戻る</a>
    <?php endif; ?>

    製品数<?php echo $this->_tpl_vars['product_count']; ?>
個<br />
    


  </body>
</html>