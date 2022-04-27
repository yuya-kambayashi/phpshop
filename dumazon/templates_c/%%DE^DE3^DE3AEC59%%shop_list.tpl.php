<?php /* Smarty version 2.6.31, created on 2022-04-27 02:48:45
         compiled from shop_list.tpl */ ?>
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

    商品一覧<br /><br />

    <table border="1">
      
    <tr>
    <td>画像</td>
    <td>商品名</td>
    <td>型番</td>
    <td>商品区分</td>
    <td>入り数</td>
    <td>標準価格</td>
    <td>Web価格</td>
    <td>在庫</td>
    </tr>

    <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
    <tr>
    <td><?php echo $this->_tpl_vars['product']['gazou']; ?>
</td>
    <td><a href="./shop_product.php?procode=<?php echo $this->_tpl_vars['product']['code']; ?>
"><?php echo $this->_tpl_vars['product']['name']; ?>
</a></td>
    <td><?php echo $this->_tpl_vars['product']['model_number']; ?>
</td>
    <td><?php echo $this->_tpl_vars['product']['category']; ?>
</td>
    <td><?php echo $this->_tpl_vars['product']['carton']; ?>
</td>
    <td><?php echo $this->_tpl_vars['product']['price']; ?>
</td>
    <td><?php echo $this->_tpl_vars['product']['price_web']; ?>
</td>
    <td><?php echo $this->_tpl_vars['product']['stock']; ?>
</td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>


    </table>
    

  </body>
</html>