<?php /* Smarty version 2.6.31, created on 2022-04-26 06:45:26
         compiled from member_account.tpl */ ?>
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
      ログインされていません。<br />
      <a href="./shop/member_login.html">ログイン</a><br />
      <a href = "shop_list.php">商品一覧へ</a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['db_error'] == false): ?> 
      アカウントサービス<br />
      <br />  

      お名前<br />
      <?php echo $this->_tpl_vars['onamae']; ?>

      <br /><br />

      メールアドレス<br />
      <?php echo $this->_tpl_vars['email']; ?>

      <br /><br />

      郵便番号<br />
      <?php echo $this->_tpl_vars['postal1']; ?>

      -
      <?php echo $this->_tpl_vars['postal2']; ?>

      <br /><br />

      住所<br />
      <?php echo $this->_tpl_vars['address']; ?>

      <br /><br />

      電話番号<br />
      <?php echo $this->_tpl_vars['tel']; ?>

      <br /><br />

    <?php else: ?>
      ただいま障害により大変ご迷惑をおかけしております。
    <?php endif; ?>
    
    <a href="member_logout.php">ログアウト</a>
    <br />
    <br />
    
    <a href="member_login.html">アカウントの切り替え</a>
    <br />
    <br />

    <input type="button" onclick="history.back()" value="戻る">

  </body>
</html>