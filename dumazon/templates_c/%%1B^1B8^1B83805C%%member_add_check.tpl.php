<?php /* Smarty version 2.6.31, created on 2022-04-26 08:50:10
         compiled from member_add_check.tpl */ ?>
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

    <?php if ($this->_tpl_vars['invalid_member_name'] == true): ?>
        名前を入力してください。<br />
    <?php else: ?>
        名前<br />
        <?php echo $this->_tpl_vars['member_name']; ?>
<br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['invalid_member_email'] == true): ?>
        メールアドレスを正確に入力してください。<br />
    <?php else: ?>

      <?php if ($this->_tpl_vars['duplicate_member_email'] == true): ?>
        メールアドレスが重複しています<br />
      <?php else: ?>

        メールアドレス<br />
        <?php echo $this->_tpl_vars['member_email']; ?>
<br />
      <?php endif; ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['invalid_company_name'] == true): ?>
        会社名が入力されていません。<br />
    <?php else: ?>
        会社名<br />
        <?php echo $this->_tpl_vars['member_company_name']; ?>
<br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['invalid_division_name'] == true): ?>
        部署名が入力されていません。<br />
    <?php else: ?>
        部署名<br />
        <?php echo $this->_tpl_vars['member_division_name']; ?>
<br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['invalid_member_pass'] == true): ?>
        パスワードが入力されていません。<br />
    <?php else: ?>
        <?php if ($this->_tpl_vars['incorrect_member_pass'] == true): ?>
          パスワードが一致しません。<br />
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['invalid_input'] == false): ?>
      <form>
        <input type="button" onclick="history.back()" value="戻る">
      </form>
    <?php else: ?>
      <form method="post" action="./shop/member_add_done.php">
        <input type="hidden" name="name" value="'.$member_name.'">
        <input type="hidden" name="email" value="'.$member_email.'">
        <input type="hidden" name="company_name" value="'.$member_company_name.'">
        <input type="hidden" name="division_name" value="'.$member_division_name.'">
        <input type="hidden" name="pass" value="'.$member_pass_MD5.'">
        <br />
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="ＯＫ">
      </form>
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['db_error'] == true): ?>
      ただいま障害により大変ご迷惑をおかけしております。
    <?php endif; ?> 
  </body>
</html>