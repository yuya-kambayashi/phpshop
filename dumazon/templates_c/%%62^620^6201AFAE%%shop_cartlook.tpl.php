<?php /* Smarty version 2.6.31, created on 2022-05-02 09:53:42
         compiled from shop_cartlook.tpl */ ?>
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

  
    <?php if ($this->_tpl_vars['no_products_in_cart'] == true): ?>
      カートに商品が入っていません。<br />
      <a href = "shop_list.php">商品一覧に戻る</a>
    <?php endif; ?>

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
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['products_length']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
        <tr>
          <td>
            <?php echo $this->_tpl_vars['pro_gazous'][$this->_sections['i']['index']]; ?>

          </td>
          <td>
            <?php echo $this->_tpl_vars['pro_model_numbers'][$this->_sections['i']['index']]; ?>

          </td>
          <td>
            <?php echo $this->_tpl_vars['pro_model_numbers'][$this->_sections['i']['index']]; ?>

          </td>
          <td>
            <?php echo $this->_tpl_vars['pro_categories'][$this->_sections['i']['index']]; ?>

          </td>
          <td>
            <?php echo $this->_tpl_vars['pro_cartons'][$this->_sections['i']['index']]; ?>

          </td>
          <td>
            <?php echo $this->_tpl_vars['pro_prices'][$this->_sections['i']['index']]; ?>

          </td>
          <td>
            <!-- Web価格 -->
            <?php echo $this->_tpl_vars['pro_price_webs'][$this->_sections['i']['index']]; ?>

          </td>
          <td>
            <!-- 在庫 -->
            <input type="hidden" name=<?php echo $this->_tpl_vars['pro_stocks'][$this->_sections['i']['index']]; ?>
 value=<?php echo $this->_tpl_vars['pro_stocks'][$this->_sections['i']['index']]; ?>
>
            <?php echo $this->_tpl_vars['pro_stocks'][$this->_sections['i']['index']]; ?>

          </td>        
          <td>
            <!-- 数量 -->
            <input type="number" name=<?php echo $this->_tpl_vars['pro_quantities'][$this->_sections['i']['index']]; ?>
 style="width:50px" min="1" max="10" value=<?php echo $this->_tpl_vars['pro_quantities'][$this->_sections['i']['index']]; ?>
>個
          </td>
          <td>
            <!-- 小計 -->
            <?php echo $this->_tpl_vars['pro_price_webs'][$this->_sections['i']['index']]; ?>
 * <?php echo $this->_tpl_vars['pro_quantities'][$this->_sections['i']['index']]; ?>
円
          </td>
          <td>
            <!-- 削除 -->
            <input type="checkbox" name=<?php echo $this->_tpl_vars['sakujo'][$this->_sections['i']['index']]; ?>
>
          </td>
        </tr>
      <?php endfor; endif; ?>
      </table>
      <br />
      <input type="hidden" name="product_count" value="<?php echo '<?php'; ?>
 print $product_count;<?php echo '?>'; ?>
">
      <input type="submit" value="数量変更"><br /><br />
    </form>

    <?php echo '<?php'; ?>

      if(isset($_SESSION['member_login'])==false)      else    <?php echo '?>'; ?>


    <br />
    <input type="button" onclick="history.back()" value="戻る">

  </body>
</html>