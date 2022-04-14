<?php  
  session_start();
  session_regenerate_id(true);

  print '<a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';

  if(isset($_SESSION['member_login']) == false){
    print 'ログインされていません。<br />';
    print '<a href = "shop_list.php>商品一覧へ</a>';
    exit();
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

      $member_id= $_SESSION['member_id'];

      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT member_name, email, postal1, postal2, address, tel FROM dat_member WHERE id = ?';
      $stmt = $dbh->prepare($sql);
      $data[0] = $member_id;
      $stmt->execute($data);
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      $dbh = null;

      $onamae = $rec['member_name'];
      $email = $rec['email'];
      $postal1 = $rec['postal1'];
      $postal2 = $rec['postal2'];
      $address = $rec['address'];
      $tel = $rec['tel'];

      print '会員情報参照<br />';
      print '<br />';  

      print 'お名前<br />';
      print $onamae;
      print '<br /><br />';

      print 'メールアドレス<br />';
      print $email;
      print '<br /><br />';

      print '郵便番号<br />';
      print $postal1;
      print '-';
      print $postal2;
      print '<br /><br />';

      print '住所<br />';
      print $address;
      print '<br /><br />';

      print '電話番号<br />';
      print $tel;
      print '<br /><br />';

    }catch (Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }
    
    ?>

    <a href="member_logout.php">ログアウト</a>
    <br />

    <input type="button" onclick="history.back()" value="戻る">

  </body>
</html>
