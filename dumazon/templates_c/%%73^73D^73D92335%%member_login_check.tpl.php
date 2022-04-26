<?php /* Smarty version 2.6.31, created on 2022-04-26 07:34:32
         compiled from member_login_check.tpl */ ?>
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

    <?php if ($this->_tpl_vars['input_error'] == true): ?>

        <div>
            メールアドレスかパスワードが間違っています。<br />
        </div>
    <?php else: ?>
        <?php if ($this->_tpl_vars['db_error'] == true): ?>
            <div>
                ただいま障害により大変ご迷惑をおかけしております。
            </div>
        <?php endif; ?>
    <?php endif; ?>

    </body>
</html>
