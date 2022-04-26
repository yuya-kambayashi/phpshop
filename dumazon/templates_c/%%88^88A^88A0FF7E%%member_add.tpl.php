<?php /* Smarty version 2.6.31, created on 2022-04-26 08:43:36
         compiled from member_add.tpl */ ?>
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
    
    アカウントを作成<br />
    <br />
    <form method="post" action="./member_add_check.php">
      名前<br />
      <input type="text" name="name" style="width:200px"><br /><br />
      メールアドレス<br />
      <input type="text" name="email" style="width:200px"><br /><br />
      会社名<br />
      <input type="text" name="company_name" style="width:200px"><br /><br />
      部署名<br />
      <input type="text" name="division_name" style="width:200px"><br /><br />
      パスワード<br />
      <input type="password" name="pass" style="width:200px"><br /><br />
      もう一度パスワードを入力してください<br />
      <input type="password" name="pass2" style="width:200px"><br /><br />
      <br />
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  </body>
</html>