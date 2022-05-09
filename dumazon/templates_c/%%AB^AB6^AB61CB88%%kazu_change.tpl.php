<?php /* Smarty version 2.6.31, created on 2022-05-09 09:41:26
         compiled from kazu_change.tpl */ ?>
<?php echo '<?php'; ?>

  header('Location:./shop_cartlook.php');
  exit();
<?php echo '?>'; ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Dumazon.co.jp 公式サイト。ダマゾンで本, 日用品, ファッション, 食品, ベビー用品, カー用品ほか一億種の商品をいつでもお安く。通常配送無料(一部を除く)</title>
  		<link rel="stylesheet" type="text/css" href="./css/header.css">
  </head>
  <body>
    <?php if ($this->_tpl_vars['count_error'] == true): ?>
      数量に誤りがあります。<br />
      <a href="shop_cartlook.php">カートに戻る</a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['invalid_count'] == true): ?>
      数量は必ず1以上10個までです。<br />
      <a href="shop_cartlook.php">カートに戻る</a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['exceed_stock'] == true): ?>
      数量が在庫を超えています<br />
      <a href="shop_cartlook.php">カートに戻る</a>
    <?php endif; ?>

  </body>
</html>