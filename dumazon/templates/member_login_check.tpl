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

    {if $input_error == true}

        <div>
            メールアドレスかパスワードが間違っています。<br />
        </div>
    {else}
        {if $db_error == true}
            <div>
                ただいま障害により大変ご迷惑をおかけしております。
            </div>
        {/if}
    {/if}

    </body>
</html>

