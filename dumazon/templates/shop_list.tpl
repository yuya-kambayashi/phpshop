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
      <a href="./shop/member_login.html">ログイン</a><br />
      初めてご利用ですか?<a href="./member_add.php">新規登録</a>はこちら<br />
      <br />
    {else}
      ようこそ<br />
      {$member_name}様<br />
      <a href="./member_account.php">アカウント</a><br />
      <br />
    {/if}

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

    {foreach from=$products item=product}
    <tr>
    <td>{$product.code}</td>
    <td>{$product.name}</td>
    <td>{$product.model_number}</td>
    <td>{$product.category}</td>
    <td>{$product.carton}</td>
    <td>{$product.price}</td>
    <td>{$product.price_web}</td>
    <td>{$product.stock}</td>
    </tr>
    {/foreach}


    </table>
    

  </body>
</html>
