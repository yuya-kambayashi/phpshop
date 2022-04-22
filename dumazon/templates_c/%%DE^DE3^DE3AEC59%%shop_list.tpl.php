<?php /* Smarty version 2.6.31, created on 2022-04-22 10:11:56
         compiled from shop_list.tpl */ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php if ($this->_tpl_vars['member_login'] == false): ?>
      ようこそゲスト様<br />
      <a href="./shop/member_login.html">ログイン</a><br />
      初めてご利用ですか?<a href="../shop/member_add.php">新規登録</a>はこちら<br />
      <br />
    <?php else: ?>
      ようこそ<br />
      <?php echo $this->_tpl_vars['member_name']; ?>
様　<a href="../shop/member_account.php">アカウント</a><br />
      <br />
    <?php endif; ?>
    <?php echo '<?php'; ?>


    try
        print '<tr>';
        print '<td>'.$rec['gazou'].'</td>';
        print '<td><a href="shop_product.php?procode='.$rec['code'].'">'.$rec['name'].'</a></td>';
        print '<td>'.$rec['model_number'].'</td>';
        print '<td>'.$rec['category'].'</td>';
        print '<td>'.$rec['carton'].'</td>';
        print '<td>'.$rec['price'].'</td>';
        print '<td>'.$rec['price_web'].'</td>';
        print '<td>'.$rec['stock'].'</td>';
        print '</tr>';
      }

      print '</table>';

    }catch (Exception $e)
    print '<br />';
    print '<a href="shop_cartlook.php">カートを見る</a><br />';

    print '<br />';
    print '<a href="../staff_login/staff_login.html">スタッフログイン</a><br />';
    <?php echo '?>'; ?>


    

  </body>
</html>