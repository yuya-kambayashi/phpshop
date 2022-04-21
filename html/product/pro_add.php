<?php
  session_start();
  session_regenerate_id(true);
  if(isset($_SESSION['login'])==false){
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
  }
  else{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br />';
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
    商品追加<br />
    <br />
    <form method="post" action="pro_add_check.php" enctype="multipart/form-data">
      商品名<br />
      <input type="text" name="name" style="width:200px"><br />
      型番<br />
      <input type="text" name="model_number" style="width:200px"><br />
      商品区分<br />
      <input type="text" name="category" style="width:200px"><br />
      入り数<br />
      <input type="number" name="carton" style="width:50"><br />
      標準価格<br />
      <input type="number" name="price" style="width:50px"><br />
      Web価格<br />
      <input type="number" name="price_web" style="width:50px"><br />
      在庫<br />
      <input type="number" name="stock" style="width:50px"><br />
      仕様<br />
      <input type="text" name="specification" style="width:200px"><br />
      特徴<br />
      <input type="text" name="feature" style="width:200px"><br />
      画像<br />
      <input type="file" name="gazou" style="width:400px"><br />
      <br />
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
</form>
  </body>
</html>
