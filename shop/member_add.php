<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
    <a href="../../index.php"><img src = "../../icon.png"></a><br /><br />

    アカウントを作成<br />
    <br />
    <form method="post" action="member_add_check.php">
      名前<br />
      <input type="text" name="name" style="width:200px"><br /><br />
      メールアドレス<br />
      <input type="text" name="email" style="width:200px"><br /><br />
      会社名<br />
      <input type="text" name="company_name" style="width:200px"><br /><br />
      部署名<br />
      <input type="text" name="division_name" style="width:200px"><br /><br />
      パスワード<br />
      <input type="password" name="pass" style="width:200px"><br /><br />
      もう一度パスワードを入力してください<br />
      <input type="password" name="pass2" style="width:200px"><br /><br />
      <br />
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
</form>
  </body>
</html>
