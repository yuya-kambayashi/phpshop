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
    print '<a href="member_logout.php">ログアウト</a><br />';
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

      $pro_code = $_GET['procode'];

      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT name, price, gazou FROM mst_product where code=?';
      $stmt = $dbh->prepare($sql);
      $data[]=$pro_code;
      $stmt->execute($data);

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $pro_name=$rec['name'];
      $pro_price=$rec['price'];
      $pro_gazou_name=$rec['gazou'];

      $dbh = null;

      if ($pro_gazou_name==''){
          $disp_gazou='';
      }
      else{
        $disp_gazou = '<img src = "../product/gazou/'.$pro_gazou_name.'">';
      }
      print '<a href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a><br /><br />';
      print '<a href="shop_product_customize.php">カスタマイズ</a><br /><br />';

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }

    ?>

    <form>
    商品情報参照<br />
    <br />
    商品コード<br />
    <?php print $pro_code; ?>
    <br />
    商品名<br />
    <?php print $pro_name; ?>
    <br />
    価格<br />
    <?php print $pro_price; ?>円
    <br />
    <?php print $disp_gazou; ?>
    <br />
    <br />
    <input type="button" onclick="history.back()" value="戻る">
    </form>
    <form name="form1" action="">
      <input id="Radio1" name="RadioGroup1" type="radio" />
      <label for="Radio1">AXEL_cjT5K　特定アカウント　自動処理</label><br/>
      <input id="Radio2" name="RadioGroup1" type="radio" checked/>
      <label for="Radio2">CORP_12345　個別アカウント　自動処理</label><br />
    </form>
  	<button id="linkToCPQ" type="button" onclick="linkToCPQ()">CPQ連携</button>
    <br />
    <br />
    
    <?php

      require_once('../common/encrypt.php');

      // Usage:
      $data = array(
        'web_id' 		=> '01234569',
        'company_name' 	=> '海山商事',
        'division_name'	=> '営業部',
        'member_name' 	=> 'フグ田マスオ'
      );

      // jsonに変換
      $json_data = json_encode( $data );
      print "json_data: " . $json_data . "<br>";

      $str = $json_data;
      print "Plain text: " . $str . "<br>";

      // 暗号化用事前共有鍵（8桁のランダム文字列）
      // !!!!!10桁ではなく、8桁!!!!!!!!!!!!!!!
      $password = "Tu31J7F1";
      print "Password: " . $password . "<br>";

      // 暗号化処理
      $encrypted = encrypt($str, $password);
      print "encrypted：" . $encrypted . "<br>";

      $rawurlencode = rawurlencode($encrypted);
      print "rawurlencode:" . $rawurlencode . "<br>";

      // 復号処理
      $decrypted = decrypt($encrypted, $password);
      print "decrypted：" . $decrypted . "<br>";

      // 連携用認証コード（10桁のランダム文字列）


      //$auth = "AXEL_cjT5K";
      //$auth = "CORP_12345";
      // $url = "http://localhost:3000/#/index-from-AXEL.html" ."?s=" .$auth. "&m=" . $rawurlencode;
      //$url = "http://localhost:3000/#/index.html" ."?s=" .$auth. "&m=" . $rawurlencode;
      //print "url:" . $url . "<br>";

    ?>
    <script language="JavaScript"  type="text/javascript">

      function linkToCPQ(){
        
        // 連携用URLの生成
        var key=document.getElementById('Radio1').checked ? 'AXEL_cjT5K' : 'CORP_12345';					
        
        //const baseURL = "http://localhost:3000/#/index-from-AXEL.html";
        const baseURL = "http://localhost:3000/#/index.html";

        var rawurlencode = '<?php echo $rawurlencode; ?>';

        var targetURL = baseURL + "?s=" + key + "&m=" + rawurlencode;
        console.log(targetURL);

        // CPQへの遷移
        window.open(targetURL, '_blank'); 
      }

    </script>
    

  </body>
</html>
