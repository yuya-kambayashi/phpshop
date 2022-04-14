<?php
  session_start();
  session_regenerate_id(true);

  print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';

  if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲスト様　';
    print '<a href="member_login.html">会員ログイン</a><br />';
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

      if (isset($_SESSION['cart']) == true){
        $cart = $_SESSION['cart'];
        $kazu = $_SESSION['kazu'];
        $max = count($cart);
      }
      else{
        $max = 0;
      }

      if ($max == 0){
        print "カートに商品が入っていません。<br />";
        print "<br />";
        print '<a href = "shop_list.php">商品一覧に戻る</a>';
        exit();
      }

      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      foreach($cart as $key => $val){
        $sql = 'SELECT * FROM mst_product WHERE code = ?';
        $stmt = $dbh->prepare($sql);
        $data[0] = $val;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        $pro_name[] = $rec['name'];
        $pro_price[] = $rec['price'];
        $pro_gazou_name[] = $rec['gazou'];
        $pro_model_number[] = $rec['model_number'];
        $pro_category[] = $rec['category'];
        $pro_carton[] = $rec['carton'];
        $pro_price_web[] = $rec['price_web'];
        $pro_stock[] = $rec['stock'];
        if ($rec['gazou'] == ''){
          $pro_gazou[] = '';
        }
        else{
          $pro_gazou[]='<img src = "../product/gazou/'.$rec['gazou'].'">';
        }
      }

      $dbh = null;

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    カートの中身<br />
    <br />
    <form method="post" action="kazu_change.php">
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
          <td>数量</td>
          <td>小計</td>
          <td>削除</td>
        </tr> 
      <?php for($i=0; $i < $max; $i++){
      ?>
        <tr>
          <td>
            <?php print $pro_gazou[$i]; ?>
          </td>
          <td>
            <?php print $pro_name[$i]; ?>
          </td>
          <td>
            <?php print $pro_model_number[$i]; ?>
          </td>
          <td>
            <?php print $pro_category[$i]; ?>
          </td>
          <td>
            <?php print $pro_carton[$i]; ?>個
          </td>
          <td>
            <?php print $pro_price[$i]; ?>円
          </td>
          <td>
            <?php print $pro_price_web[$i]; ?>円
          </td>        
          <td>
            <?php print $pro_stock[$i];?>個
          </td>
          <td>
            <input type="text" name="kazu<?php print $i;?>" value="<?php print $kazu[$i];?>">
          </td>
          <td>
            <?php print $pro_price_web[$i] * $kazu[$i];?>円
          </td>
          <td>
            <input type="checkbox" name="sakujo<?php print $i;?>">
          </td>
        </tr>
      <?php } 
      ?>
      </table>
      <br />
      <input type="hidden" name="max" value="<?php print $max;?>">
      <input type="submit" value="数量変更"><br /><br />
      <input type="button" onclick="history.back()" value="戻る">
    </form>

    <?php
      if(isset($_SESSION['member_login'])==false){

        print '<a href="shop_form.html">レジに進む</a><br />';
      }
      else{
        print '<a href="shop_kantan_check.php">レジに進む</a><br />';
      }
    ?>

  </body>
</html>
