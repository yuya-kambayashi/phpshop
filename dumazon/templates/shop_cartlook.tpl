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

  
    { if $no_products_in_cart == true }
      カートに商品が入っていません。<br />
      <a href = "shop_list.php">商品一覧に戻る</a>
    {/if}

    カートの中身<br />
    <br />
    <form method="post" action="kazu_change.php">
      <table border="1">
        <tr>
          <td style="width:50px">画像</td>
          <td style="width:200px">商品名</td>
          <td style="width:200px">型番</td>
          <td style="width:200px">商品区分</td>
          <td style="width:100px">入り数</td>
          <td style="width:100px">標準価格</td>
          <td style="width:100px">Web価格</td>
          <td style="width:100px">在庫</td>
          <td style="width:100px">数量</td>
          <td style="width:100px">小計</td>
          <td style="width:50px">削除</td>
        </tr> 
        {section name=i start=0 loop=$products_count}
        <tr>
          <td>
            {$pro_gazous[i]}
          </td>
          <td>
            {$pro_model_numbers[i]}
          </td>
          <td>
            {$pro_model_numbers[i]}
          </td>
          <td>
            {$pro_categories[i]}
          </td>
          <td>
            {$pro_cartons[i]}
          </td>
          <td>
            {$pro_prices[i]}
          </td>
          <td>
            <!-- Web価格 -->
            {$pro_price_webs[i]}
          </td>
          <td>
            <!-- 在庫 -->
            {assign var=pro_stock_name value='pro_stock'}
            {assign var=pro_stock_with_index value=$pro_stock_name|cat:$smarty.section.i.index}
            <input type="hidden" name={$pro_stock_with_index} value={$pro_stocks[i]}>
            {$pro_stocks[i]}
          </td>        
          <td>
            <!-- 数量 -->
            {assign var=pro_quantity_name value='pro_quantity'}
            {assign var=pro_quantity_with_index value=$pro_quantity_name|cat:$smarty.section.i.index}
            <input type="number" name={$pro_quantity_with_index} style="width:50px" min="1" max="10" value={$pro_quantities[i]}>個
          </td>
          <td>
            <!-- 小計 -->
            { math equation=a*b a=$pro_price_webs[i] b=$pro_quantities[i] assign=shoukei}
            {$shoukei}円
          </td>
          <td>
            <!-- 削除 -->
            {assign var=sakujo_name value='sakujo'}
            {assign var=sakujo_with_index value=$sakujo_name|cat:$smarty.section.i.index}
            <input type="checkbox" name={$sakujo_with_index}>
          </td>
        </tr>
      {/section}
      </table>
      <br />
      <input type="hidden" name="product_count" value={$products_count}>
      <input type="submit" value="数量変更"><br /><br />
    </form>
    
    {if $member_login == false}
      <a href="shop_form.html">レジに進む</a><br />   
    {else}
      <a href="shop_kantan_check.php">レジに進む</a><br />
    {/if}

    <br />
    <input type="button" onclick="history.back()" value="戻る">

  </body>
</html>
