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
    <hr style="border:none;border-top:dashed 3px gray;height:1px;">
    <form name="form1" action="">
      認証コード（ AXEL or 自社サイト　/ 開始画面 / 選択するタイプ ）
      <br />
      <input id="Radio1" name="RadioGroup1" type="radio" checked/>
      <label for="Radio1">AXEL_TYPE_反応装置ラボ</label><br/>
      <input id="Radio2" name="RadioGroup1" type="radio" />
      <label for="Radio2">AXEL_TYPE_反応ろ過装置ラボ</label><br/>
      <input id="Radio3" name="RadioGroup1" type="radio" />
      <label for="Radio3">AXEL_TYPE_NULL</label><br/>
      <input id="Radio4" name="RadioGroup1" type="radio" />
      <label for="Radio4">AXEL_STANDARD_反応装置ラボ</label><br/>
      <input id="Radio5" name="RadioGroup1" type="radio" />
      <label for="Radio5">AXEL_STANDARD_反応ろ過装置ラボ</label><br/>
      <input id="Radio6" name="RadioGroup1" type="radio" />
      <label for="Radio6">AXEL_STANDARD_NULL * error</label><br/>
      <input id="Radio21" name="RadioGroup1" type="radio" />
      <label for="Radio21">CORP_TYPE_反応装置ラボ</label><br/>
      <input id="Radio22" name="RadioGroup1" type="radio" />
      <label for="Radio22">CORP_TYPE_反応ろ過装置ラボ</label><br/>
      <input id="Radio23" name="RadioGroup1" type="radio" />
      <label for="Radio23">CORP_TYPE_NULL</label><br/>
      <input id="Radio24" name="RadioGroup1" type="radio" />
      <label for="Radio24">CORP_STANDARD_反応装置ラボ</label><br/>
      <input id="Radio25" name="RadioGroup1" type="radio" />
      <label for="Radio25">CORP_STANDARD_反応ろ過装置ラボ</label><br/>
      <input id="Radio26" name="RadioGroup1" type="radio" />
      <label for="Radio26">CORP_STANDARD_NULL * error</label><br/>
    </form>
    <?php
      if ( isset($_SESSION['member_login']) == true ){
        print '<button id="linkToCPQ" type="button" onclick="linkToCPQ()">CPQ連携</button>';
      }
      else {
        print '※ CPQ連携には会員ログインが必要です<br>';
        print '<button id="linkToCPQ" type="button" onclick="linkToCPQ()" disabled=true>CPQ連携</button>';
      }
    ?>
    <br />
    <br />
    連携用URL
    <br />
    <p id="URL"></p>
    <hr style="border:none;border-top:dashed 3px gray;height:1px;">
    <br />
    デバッグ用データ
    <br />
    <br />
    <?php

      $web_id = '';
      $company_name = '';
      $division_name = '';
      $member_name = '';

      if(isset($_SESSION['member_login'])==true){

        try{

          $member_id= $_SESSION['member_id'];

          $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
          $user = 'root';
          $password = '';
          $dbh = new PDO($dsn, $user, $password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = 'SELECT member_name, web_id, company_name, division_name FROM dat_member WHERE id = ?';
          $stmt = $dbh->prepare($sql);
          $data[0] = $member_id;
          $stmt->execute($data);
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);

          $dbh = null;

          $web_id = $rec['web_id'];
          $company_name = $rec['company_name'];
          $division_name = $rec['division_name'];
          $member_name = $rec['member_name'];

        }catch (Exception $e){
          print 'ただいま障害により大変ご迷惑をおかけしております。';
          exit();
        }
      }

      require_once('../common/encrypt.php');
      
      // Usage:
      $raw_data = array(
        'web_id' 		=> $web_id,
        'company_name' 	=> $company_name,
        'division_name'	=> $division_name,
        'member_name' 	=> $member_name
      );

      print "raw_data: ";
      print_r($raw_data);
      print "<br>";

      // jsonに変換
      $json_data = json_encode( $raw_data );
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
        var key = '';
        if ( document.getElementById('Radio1').checked ){
          key = 'AXEL_TYPE_1';
        } 
        else if (document.getElementById('Radio2').checked){
          key = 'AXEL_TYPE_2';
        }
        else if (document.getElementById('Radio3').checked){
          key = 'AXEL_TYPE_0';
        }
        else if ( document.getElementById('Radio4').checked ){
          key = 'AXEL_STANDARD_1';
        } 
        else if (document.getElementById('Radio5').checked){
          key = 'AXEL_STANDARD_2';
        }
        else if (document.getElementById('Radio6').checked){
          key = 'AXEL_STANDARD_0';
        }
        else if ( document.getElementById('Radio21').checked ){
          key = 'CORP_TYPE_1';
        } 
        else if (document.getElementById('Radio22').checked){
          key = 'CORP_TYPE_2';
        }
        else if (document.getElementById('Radio23').checked){
          key = 'CORP_TYPE_0';
        }
        else if ( document.getElementById('Radio24').checked ){
          key = 'CORP_STANDARD_1';
        } 
        else if (document.getElementById('Radio25').checked){
          key = 'CORP_STANDARD_2';
        }
        else if (document.getElementById('Radio26').checked){
          key = 'CORP_STANDARD_0';
        }
        
        //const baseURL = "http://localhost:3000/#/index-from-AXEL.html";
        const baseURL = "http://localhost:3000/#/index.html";

        var rawurlencode = '<?php echo $rawurlencode; ?>';

        var targetURL = baseURL + "?s=" + key + "&m=" + rawurlencode;
        console.log(targetURL);
        // URLの表示
        document.getElementById("URL").textContent = targetURL;
        // CPQへの遷移
        window.open(targetURL, '_blank'); 
      }

    </script>
  </body>
</html>
