<html>
  <head>
    <meta charset="UTF-8" />
    <title>dumazon</title>
  </head>
<body>
    {if $logined == true}
    <p>ログイン中</p>
    <p>{$name}さん</p>
    {else}
    <p>非ログイン</p>
    {/if}

    <p>aaaa</>

    <br />
    <a href="shop_cartlook.php">カートを見る</a><br />

    <br />
    <br />
    <br />
    <a href="../staff_login/staff_login.html">スタッフログイン</a><br />
</body>
</html>