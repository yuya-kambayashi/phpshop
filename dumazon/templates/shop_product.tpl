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
    {if $member_login == false}
      ようこそゲスト様<br />
      <a href="./member_login.html">ログイン</a><br />
      初めてご利用ですか?<a href="./member_add.php">新規登録</a>はこちら<br />
      <br />
    {else}
      ようこそ<br />
      {$member_name}様<br />
      <a href="./member_account.php">アカウント</a><br />
      <br />
    {/if}

    {if $db_error == false}
      <a href="shop_cartin.php?procode={$pro_code}">カートに入れる</a><br /><br />
    {else}
      ただいま障害により大変ご迷惑をおかけしております。<br />
    {/if}
    

    <form>
    商品情報参照<br />
    <br />
    商品コード<br />
    {$pro_code}
    <br />
    <br />
    商品名<br />
    {$pro_name}
    <br />
    <br />
    型番<br />
    {$pro_model_number}
    <br />
    <br />
    商品区分<br />
    {$pro_category}
    <br />
    <br />
    入り数<br />
    {$pro_carton}個
    <br />
    <br />
    標準価格<br />
    {$pro_price}円
    <br />
    <br />
    Web価格<br />
    {$pro_price_web}円
    <br />
    <br />
    在庫<br />
    {$pro_stock}個
    <br />    
    <br />    
    仕様<br />
    {$pro_specification}
    <br />    
    <br />    
    特徴<br />
    {$pro_feature}
    <br />
    <br />
    {$disp_gazou}
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
    {if $member_login == true }
      <button id="linkToCPQ" type="button" onclick="linkToCPQ()">CPQ連携</button>
    {else}
      CPQ連携には会員ログインが必要です<br>
      <button id="linkToCPQ" type="button" onclick="linkToCPQ()" disabled=true>CPQ連携</button>
    {/if}
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

    raw_data: {$raw_data}
    <br>
    json_string: {$json_string}
    <br>
    password: {$password}
    <br>
    encrypted: {$encrypted}
    <br>
    rawurlencode: {$rawurlencode}
    <br>
    decrypted: {$decrypted}
    <br>
    
  </body>
</html>
