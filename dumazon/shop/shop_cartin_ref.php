<?php
  session_start();
  session_regenerate_id(true);

  print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';

  if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲスト様<br />';
    print '<a href="member_login.html">ログイン</a><br />';
    print '初めてご利用ですか? ';
    print '<a href="member_add.php">新規登録</a>';
    print 'はこちら<br />';
    print '<br />';
  }
  else{
    print 'ようこそ<br />';
    print $_SESSION['member_name'];
    print '様　';
    print '<a href="member_account.php">アカウント</a><br />';
    print '<br />';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
      <?php

    try{

      $pro_code = $_GET['procode']; 

      if(isset($_SESSION['cart'])==true){
        $cart=$_SESSION['cart'];
        $kazu=$_SESSION['kazu'];

        if(in_array($pro_code, $cart)==true){
          print 'その商品はすでにカートに入っています。<br />';
          print '<a href="shop_list.php">商品一覧に戻る</a>';
          exit();
        }

      }
      $cart[] = $pro_code;
      $kazu[] = 1;
      $_SESSION['cart']=$cart;
      $_SESSION['kazu']=$kazu;
      
    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    カートに追加しました。<br />
    <br />
    <?php
      if(isset($_SESSION['member_login'])==false){

        print '<a href="shop_form.html">レジに進む</a><br />';
      }
      else{
        print '<a href="shop_kantan_check.php">レジに進む</a><br />';
      }
    ?>
    <br />
    <a href="shop_cartlook.php">カートに移動</a>
    <br />
    <br />
    <a href = "shop_list.php">商品一覧に戻る</a>
  </body>
</html>
