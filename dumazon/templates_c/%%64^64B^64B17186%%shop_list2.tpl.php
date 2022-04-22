<?php /* Smarty version 2.6.31, created on 2022-04-22 10:06:46
         compiled from shop_list2.tpl */ ?>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>dumazon</title>
  </head>
<body>
    <?php if ($this->_tpl_vars['logined'] == true): ?>
    <p>ログイン中</p>
    <p><?php echo $this->_tpl_vars['name']; ?>
さん</p>
    <?php else: ?>
    <p>非ログイン</p>
    <?php endif; ?>

    <p>aaaa</>

    <br />
    <a href="shop_cartlook.php">カートを見る</a><br />

    <br />
    <br />
    <br />
    <a href="../staff_login/staff_login.html">スタッフログイン</a><br />
</body>
</html>