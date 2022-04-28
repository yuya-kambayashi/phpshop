<?php /* Smarty version 2.6.31, created on 2022-04-28 07:50:39
         compiled from shop_product.tpl */ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Dumazon.co.jp 公式サイト。ダマゾンで本, 日用品, ファッション, 食品, ベビー用品, カー用品ほか一億種の商品をいつでもお安く。通常配送無料(一部を除く)</title>
  		<link rel="stylesheet" type="text/css" href="./css/header.css">
  <script language="JavaScript"  type="text/javascript">
    $data = '<?php echo $this->_tpl_vars['rawurlencode']; ?>
';
    <?php echo '
    function linkToCPQ(){

        // 連携用URLの生成
        var key = \'\';
        if ( document.getElementById(\'Radio1\').checked ){
            key = \'AXEL_TYPE_1\';
        } 
        else if (document.getElementById(\'Radio2\').checked){
            key = \'AXEL_TYPE_2\';
        }
        else if (document.getElementById(\'Radio3\').checked){
            key = \'AXEL_TYPE_0\';
        }
        else if ( document.getElementById(\'Radio4\').checked ){
            key = \'AXEL_STANDARD_1\';
        } 
        else if (document.getElementById(\'Radio5\').checked){
            key = \'AXEL_STANDARD_2\';
        }
        else if (document.getElementById(\'Radio6\').checked){
            key = \'AXEL_STANDARD_0\';
        }
        else if ( document.getElementById(\'Radio21\').checked ){
            key = \'CORP_TYPE_1\';
        } 
        else if (document.getElementById(\'Radio22\').checked){
            key = \'CORP_TYPE_2\';
        }
        else if (document.getElementById(\'Radio23\').checked){
            key = \'CORP_TYPE_0\';
        }
        else if ( document.getElementById(\'Radio24\').checked ){
            key = \'CORP_STANDARD_1\';
        } 
        else if (document.getElementById(\'Radio25\').checked){
            key = \'CORP_STANDARD_2\';
        }
        else if (document.getElementById(\'Radio26\').checked){
            key = \'CORP_STANDARD_0\';
        }

        //const baseURL = "http://localhost:3000/#/index-from-AXEL.html";
        const baseURL = "http://localhost:3000/#/index.html";

        var targetURL = baseURL + "?s=" + key + "&m=" + $data;
        console.log(targetURL);
        // URLの表示
        document.getElementById("URL").textContent = targetURL;
        // CPQへの遷移
        window.open(targetURL, \'_blank\'); 
    }
    '; ?>

  </script>
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
      <a href="./shop_cartin.php?procode=<?php echo $this->_tpl_vars['pro_code']; ?>
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

    <?php if ($this->_tpl_vars['member_login'] == true): ?>
      <button id="linkToCPQ" type="button" onclick="linkToCPQ($data)">CPQ連携</button>
    <?php else: ?>
      CPQ連携には会員ログインが必要です<br>
      <button id="linkToCPQ" type="button" onclick="linkToCPQ($data)" disabled=true>CPQ連携</button>
    <?php endif; ?>
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

    raw_data: <?php echo $this->_tpl_vars['raw_data']; ?>

    <br>
    json_string: <?php echo $this->_tpl_vars['json_string']; ?>

    <br>
    password: <?php echo $this->_tpl_vars['password']; ?>

    <br>
    encrypted: <?php echo $this->_tpl_vars['encrypted']; ?>

    <br>
    rawurlencode: <?php echo $this->_tpl_vars['rawurlencode']; ?>

    <br>
    decrypted: <?php echo $this->_tpl_vars['decrypted']; ?>

    <br>
    
  </body>
</html>