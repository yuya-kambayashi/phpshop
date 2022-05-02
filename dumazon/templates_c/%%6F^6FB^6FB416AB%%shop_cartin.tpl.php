<?php /* Smarty version 2.6.31, created on 2022-04-28 10:01:50
         compiled from shop_cartin.tpl */ ?>
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

    <?php if ($this->_tpl_vars['existing_in_cart'] == true): ?>
      その商品はすでにカートに入っています。<br />
      <a href="shop_list.php">商品一覧に戻る</a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['db_error'] == true): ?>
      ただいま障害により大変ご迷惑をおかけしております。<br />
      <a href="shop_list.php">商品一覧に戻る</a>
    <?php endif; ?>

    カートに追加しました。<br />
    <br />
    <?php if ($this->_tpl_vars['member_login'] == true): ?>
      <a href="./shop/shop_form.html">レジに進む</a><br />
    <?php else: ?>
      <a href="./shop/shop_kantan_check.php">レジに進む</a><br />
    <?php endif; ?>
    <br />
    <a href="./shop_cartlook.php">カートに移動</a>
    <br />
    <br />
    <a href = "./shop_list.php">商品一覧に戻る</a>
  </body>
</html>