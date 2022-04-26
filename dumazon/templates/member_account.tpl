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
      ログインされていません。<br />
      <a href="./shop/member_login.html">ログイン</a><br />
      <a href = "shop_list.php">商品一覧へ</a>
    {/if}

    {if $db_error == false} 
      アカウントサービス<br />
      <br />  

      お名前<br />
      { $onamae }
      <br /><br />

      メールアドレス<br />
      { $email }
      <br /><br />

      郵便番号<br />
      { $postal1 }
      -
      { $postal2 }
      <br /><br />

      住所<br />
      { $address }
      <br /><br />

      電話番号<br />
      { $tel }
      <br /><br />

    {else}
      ただいま障害により大変ご迷惑をおかけしております。
    {/if}
    
    <a href="member_logout.php">ログアウト</a>
    <br />
    <br />
    
    <a href="member_login.html">アカウントの切り替え</a>
    <br />
    <br />

    <input type="button" onclick="history.back()" value="戻る">

  </body>
</html>
