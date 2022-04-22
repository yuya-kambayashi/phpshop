<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
    {if $member_login == false}
      ようこそゲスト様<br />
      <a href="./shop/member_login.html">ログイン</a><br />
      初めてご利用ですか?<a href="./shop/member_add.php">新規登録</a>はこちら<br />
      <br />
    {else}
      ようこそ<br />
      {$member_name}様　<a href="./shop/member_account.php">アカウント</a><br />
      <br />
    {/if}
    <?php

    try{
      require_once('./common/common.php');

      $ini = get_ini();
      $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
      $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'SELECT * FROM mst_product where 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      print '商品一覧<br /><br />';

      print '<table border="1">';
      print '<tr>';
      print '<td>画像</td>';
      print '<td>商品名</td>';
      print '<td>型番</td>';
      print '<td>商品区分</td>';
      print '<td>入り数</td>';
      print '<td>標準価格</td>';
      print '<td>Web価格</td>';
      print '<td>在庫</td>';
      print '</tr>';

      while(true){

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false){
          break;
        }

        print '<tr>';
        print '<td>'.$rec['gazou'].'</td>';
        print '<td><a href="shop_product.php?procode='.$rec['code'].'">'.$rec['name'].'</a></td>';
        print '<td>'.$rec['model_number'].'</td>';
        print '<td>'.$rec['category'].'</td>';
        print '<td>'.$rec['carton'].'</td>';
        print '<td>'.$rec['price'].'</td>';
        print '<td>'.$rec['price_web'].'</td>';
        print '<td>'.$rec['stock'].'</td>';
        print '</tr>';
      }

      print '</table>';

    }catch (Exception $e){
      print $e.'<br />';
      print 'Exception:ただいま障害により大変ご迷惑をおかけしております。';
      print 'by smarty';
      exit();
    }

    print '<br />';
    print '<a href="shop_cartlook.php">カートを見る</a><br />';

    print '<br />';
    print '<a href="../staff_login/staff_login.html">スタッフログイン</a><br />';
    ?>

    

  </body>
</html>
