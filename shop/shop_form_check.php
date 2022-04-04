<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php
    
    print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';

    require_once('../common/common.php');

    $post = sanitize($_POST);

    $onamae = $post['onamae'];
    $email = $post['email'];
    $postal1 = $post['postal1'];
    $postal2 = $post['postal2'];
    $address = $post['address'];
    $tel = $post['tel'];
    $chumon = $post['chumon'];
    $pass = $post['pass'];
    $pass2 = $post['pass2'];
    $danjo = $post['danjo'];
    $birth = $post['birth'];

    $okflg = true;

    if($onamae == ''){
      print 'お名前が入力されていません。<br /><br />';
      $okflg = false;
    }
    else {
      print 'お名前<br />';
      print $onamae;
      print '<br /><br />';
    }

    if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $email) == 0){
      print 'メールアドレスを正確に入力してください<br /><br />';
      $okflg = false;
    }
    else {
      print 'メールアドレス<br />';
      print $email;
      print '<br /><br />';
    }
    
    if(preg_match('/\A[0-9]+\z/', $postal1) == 0){
      print '郵便番号は半角数字で入力してください<br /><br />';
      $okflg = false;
    }
    else {
      print '郵便番号<br />';
      print $postal1."-".$postal2;
      print '<br /><br />';
    }
    
    if(preg_match('/\A[0-9]+\z/', $postal2) == 0){
      print '郵便番号は半角数字で入力してください<br /><br />';
      $okflg = false;
    }

    if($address == ''){
      print '住所が入力されていません。<br /><br />';
      $okflg = false;
    }
    else {
      print '住所<br />';
      print $address;
      print '<br /><br />';
    }

    if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/', $tel) == 0){
      print '電話番号を正確に入力してください<br /><br />';
      $okflg = false;
    }
    else {
      print '電話番号<br />';
      print $tel;
      print '<br /><br />';
    }

    if($chumon == 'chumontouroku'){

      if($pass==""){
        print 'パスワードが入力されていません。<br /><br />';
        $okflg = false;
      }

      if($pass2==""){
        print '確認用パスワードが入力されていません。<br /><br />';
        $okflg = false;
      }

      if($pass!=$pass2){
        print 'パスワードが一致しません。<br /><br />';
        $okflg = false;
      }

      print '性別<br />';
      if($danjo=='dan'){
        print '男性';
      }
      elseif ($danjo=='jo'){
        print '女性';
      }
      elseif ($danjo=='sonota'){
        print 'その他';
      }
      elseif ($danjo=='noanswer'){
        print '答えない';
      }

      print '<br /><br />';

      print '生まれ年<br />';
      print $birth.'年代';

      print '<br /><br />';
    }


    if ($okflg==true){

      print '<form method="post" action="shop_form_done.php">';
      print '<input type="hidden" name="onamae" value="'.$onamae.'">';
      print '<input type="hidden" name="email" value="'.$email.'">';
      print '<input type="hidden" name="postal1" value="'.$postal1.'">';
      print '<input type="hidden" name="postal2" value="'.$postal2.'">';
      print '<input type="hidden" name="address" value="'.$address.'">';
      print '<input type="hidden" name="tel" value="'.$tel.'">';
      print '<input type="hidden" name="chumon" value="'.$chumon.'">';
      print '<input type="hidden" name="pass" value="'.$pass.'">';
      print '<input type="hidden" name="danjo" value="'.$danjo.'">';
      print '<input type="hidden" name="birth" value="'.$birth.'">';
      print '<input type="button" onclick="history.back()" value="戻る" />';
      print '<input type="submit" value="OK" /><br />';
      print '</form>';
    }
    else{
      print '<form>';
      print '<input type="button" onclick="history.back()" value="戻る" />';
      print '</form>';
    }



    ?>
  </body>
</html>
