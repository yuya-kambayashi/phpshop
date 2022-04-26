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

    {if $invalid_member_name == true}
        名前を入力してください。<br />
    {else}
        名前<br />
        { $member_name }<br />
    {/if}

    {if $invalid_member_email == true}
        メールアドレスを正確に入力してください。<br />
    {else}

      {if $duplicate_member_email == true}
        メールアドレスが重複しています<br />
      {else}

        メールアドレス<br />
        { $member_email }<br />
      {/if}
    {/if}

    {if $invalid_company_name == true}
        会社名が入力されていません。<br />
    {else}
        会社名<br />
        { $member_company_name }<br />
    {/if}

    {if $invalid_division_name == true}
        部署名が入力されていません。<br />
    {else}
        部署名<br />
        { $member_division_name }<br />
    {/if}

    {if $invalid_member_pass == true}
        パスワードが入力されていません。<br />
    {else}
        {if $incorrect_member_pass == true}
          パスワードが一致しません。<br />
        {/if}
    {/if}

    {if $invalid_input == false)
      <form>
        <input type="button" onclick="history.back()" value="戻る">
      </form>
    {else}
      <form method="post" action="member_add_done.php">
        <input type="hidden" name="name" value="'.$member_name.'">
        <input type="hidden" name="email" value="'.$member_email.'">
        <input type="hidden" name="company_name" value="'.$member_company_name.'">
        <input type="hidden" name="division_name" value="'.$member_division_name.'">
        <input type="hidden" name="pass" value="'.$member_pass_MD5.'">
        <br />
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="ＯＫ">
      </form>
    {/if}
    
    {if $db_error == true}
      ただいま障害により大変ご迷惑をおかけしております。
    {/if} 
  </body>
</html>
