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
    $company_name = $post['company_name'];
    $division_name = $post['division_name'];
    $postal1 = $post['postal1'];
    $postal2 = $post['postal2'];
    $address = $post['address'];
    $tel = $post['tel'];
    $chumon = $post['chumon'];
    $pass = $post['pass'];
    $pass2 = $post['pass2'];

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

      $ini = get_ini();
      $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
      $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $sql = 'SELECT member_name FROM dat_member where email=? LIMIT 1';
      $stmt = $dbh->prepare($sql);
      $data[] = $email;
      $stmt->execute($data);

      $dbh = null;


      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($rec['member_name'] != ''){
        print 'メールアドレスが重複しています<br /><br />';
        $okflg = false;
      }
      else {
        print 'メールアドレス<br />';
        print $email;
        print '<br /><br />';
      }
    }

    if($company_name == ''){
      print '会社名が入力されていません。<br /><br />';
      $okflg = false;
    }
    else {
      print '会社名<br />';
      print $company_name;
      print '<br /><br />';
    }

    if($division_name == ''){
      print '部署名が入力されていません。<br /><br />';
      $okflg = false;
    }
    else {
      print '部署名<br />';
      print $division_name;
      print '<br /><br />';
    }

    
    // if(preg_match('/\A[0-9]+\z/', $postal1) == 0){
    //   print '郵便番号は半角数字で入力してください<br /><br />';
    //   $okflg = false;
    // }
    // else {
    //   print '郵便番号<br />';
    //   print $postal1."-".$postal2;
    //   print '<br /><br />';
    // }
    if($postal1 != '' && $postal2 != ''){
      print '郵便番号<br />';
      print $postal1."-".$postal2;
      print '<br /><br />';
    }
    
    // if(preg_match('/\A[0-9]+\z/', $postal2) == 0){
    //   print '郵便番号は半角数字で入力してください<br /><br />';
    //   $okflg = false;
    // }

    // if($address == ''){
    //   print '住所が入力されていません。<br /><br />';
    //   $okflg = false;
    // }
    // else {
    //   print '住所<br />';
    //   print $address;
    //   print '<br /><br />';
    // }
    if($address != ''){
      print '住所<br />';
      print $address;
      print '<br /><br />';
    }

    // if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/', $tel) == 0){
    //   print '電話番号を正確に入力してください<br /><br />';
    //   $okflg = false;
    // }
    // else {
    //   print '電話番号<br />';
    //   print $tel;
    //   print '<br /><br />';
    // }
    if($tel != ''){
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

      print '<br /><br />';
    }


    if ($okflg==true){

      print '<form method="post" action="shop_form_done.php">';
      print '<input type="hidden" name="onamae" value="'.$onamae.'">';
      print '<input type="hidden" name="email" value="'.$email.'">';
      print '<input type="hidden" name="company_name" value="'.$company_name.'">';
      print '<input type="hidden" name="division_name" value="'.$division_name.'">';
      print '<input type="hidden" name="postal1" value="'.$postal1.'">';
      print '<input type="hidden" name="postal2" value="'.$postal2.'">';
      print '<input type="hidden" name="address" value="'.$address.'">';
      print '<input type="hidden" name="tel" value="'.$tel.'">';
      print '<input type="hidden" name="chumon" value="'.$chumon.'">';
      print '<input type="hidden" name="pass" value="'.$pass.'">';
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
