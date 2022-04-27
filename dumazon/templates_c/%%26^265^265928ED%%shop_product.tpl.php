<?php /* Smarty version 2.6.31, created on 2022-04-27 05:31:31
         compiled from shop_product.tpl */ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Dumazon.co.jp 公式サイト。ダマゾンで本, 日用品, ファッション, 食品, ベビー用品, カー用品ほか一億種の商品をいつでもお安く。通常配送無料(一部を除く)</title>
  		<link rel="stylesheet" type="text/css" href="./css/header.css">
      <script language="JavaScript" type="text/JavaScript" src="./js/shop_product.js"></script>
  </head>
  <body>
    <div class="header">
      <a href='./shop_list.php'><img src='./img/logo_small.jpg' class="header_logo"></a>
    </div>
    <?php if ($this->_tpl_vars['member_login'] == false): ?>
      ようこそゲスト様<br />
      <a href="./member_login.html">ログイン</a><br />
      初めてご利用ですか?<a href="./member_add.php">新規登録</a>はこちら<br />
      <br />
    <?php else: ?>
      ようこそ<br />
      <?php echo $this->_tpl_vars['member_name']; ?>
様<br />
      <a href="./member_account.php">アカウント</a><br />
      <br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['db_error'] == false): ?>
      <a href="shop_cartin.php?procode=<?php echo $this->_tpl_vars['pro_code']; ?>
">カートに入れる</a><br /><br />
    <?php else: ?>
      ただいま障害により大変ご迷惑をおかけしております。<br />
    <?php endif; ?>
    

    <form>
    商品情報参照<br />
    <br />
    商品コード<br />
    <?php echo $this->_tpl_vars['pro_code']; ?>

    <br />
    <br />
    商品名<br />
    <?php echo $this->_tpl_vars['pro_name']; ?>

    <br />
    <br />
    型番<br />
    <?php echo $this->_tpl_vars['pro_model_number']; ?>

    <br />
    <br />
    商品区分<br />
    <?php echo $this->_tpl_vars['pro_category']; ?>

    <br />
    <br />
    入り数<br />
    <?php echo $this->_tpl_vars['pro_carton']; ?>
個
    <br />
    <br />
    標準価格<br />
    <?php echo $this->_tpl_vars['pro_price']; ?>
円
    <br />
    <br />
    Web価格<br />
    <?php echo $this->_tpl_vars['pro_price_web']; ?>
円
    <br />
    <br />
    在庫<br />
    <?php echo $this->_tpl_vars['pro_stock']; ?>
個
    <br />    
    <br />    
    仕様<br />
    <?php echo $this->_tpl_vars['pro_specification']; ?>

    <br />    
    <br />    
    特徴<br />
    <?php echo $this->_tpl_vars['pro_feature']; ?>

    <br />
    <br />
    <?php echo $this->_tpl_vars['disp_gazou']; ?>

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
    <?php echo '<?php'; ?>

      if ( isset($_SESSION['member_login']) == true )      else     <?php echo '?>'; ?>

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
    <?php echo '<?php'; ?>


      $web_id = '';
      $company_name = '';
      $division_name = '';
      $member_name = '';

      if(isset($_SESSION['member_login'])==true)catch (Exception $e)      }

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

    <?php echo '?>'; ?>

    <script language="JavaScript"  type="text/javascript">

      function linkToCPQ() 
        else if (document.getElementById('Radio2').checked)        else if (document.getElementById('Radio3').checked)        else if ( document.getElementById('Radio4').checked ) 
        else if (document.getElementById('Radio5').checked)        else if (document.getElementById('Radio6').checked)        else if ( document.getElementById('Radio21').checked ) 
        else if (document.getElementById('Radio22').checked)        else if (document.getElementById('Radio23').checked)        else if ( document.getElementById('Radio24').checked ) 
        else if (document.getElementById('Radio25').checked)        else if (document.getElementById('Radio26').checked)        
        //const baseURL = "http://localhost:3000/#/index-from-AXEL.html";
        const baseURL = "http://localhost:3000/#/index.html";

        var rawurlencode = '<?php echo '<?php'; ?>
 echo $rawurlencod}';

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