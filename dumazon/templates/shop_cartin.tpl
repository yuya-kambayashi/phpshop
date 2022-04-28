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
    {if $member_login == false}
      ようこそゲスト様<br />
      <a href="./member_login.html">ログイン</a><br />
      初めてご利用ですか?<a href="./member_add.php">新規登録</a>はこちら<br />
      <br />
    {else}
      ようこそ<br />
      {$member_name}様<br />
      <a href="./member_account.php">アカウント</a><br />
      <br />
    {/if}

    {if $existing_in_cart == true}
      その商品はすでにカートに入っています。<br />
      <a href="shop_list.php">商品一覧に戻る</a>
    {/if}

    {if $db_error == true}
      ただいま障害により大変ご迷惑をおかけしております。<br />
      <a href="shop_list.php">商品一覧に戻る</a>
    {/if}

    カートに追加しました。<br />
    <br />
    {if $member_login == true}
      <a href="shop_form.html">レジに進む</a><br />
    
    {else}
      <a href="shop_kantan_check.php">レジに進む</a><br />
    {/if}
    <br />
    <a href="shop_cartlook.php">カートに移動</a>
    <br />
    <br />
    <a href = "shop_list.php">商品一覧に戻る</a>
  </body>
</html>
