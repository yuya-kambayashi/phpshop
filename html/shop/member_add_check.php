<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
      <a href="../../index.php"><img src = "../../icon.png"></a><br /><br />

      <?php

      try{

        require_once('../common/common.php');

        $post=sanitize($_POST);

        $member_name=$post['name'];
        $member_email=$post['email'];
        $member_company_name=$post['company_name'];
        $member_division_name=$post['division_name'];
        $member_pass=$post['pass'];
        $member_pass2=$post['pass2'];

        $okflg = true;

        if($member_name==''){
            print '名前を入力してください。<br />';
            $okflg = false;
        }
        else{
            print '名前<br />';
            print $member_name;
            print '<br />';
            print '<br />';
        }

        if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $member_email) == 0){
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
          $data[] = $member_email;
          $stmt->execute($data);

          $dbh = null;

          $rec = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($rec['member_name'] != ''){
            print 'メールアドレスが重複しています<br /><br />';
            $okflg = false;
          }
          else {
            print 'メールアドレス<br />';
            print $member_email;
            print '<br /><br />';
          }
        }

        if($member_company_name == ''){
          print '会社名が入力されていません。<br /><br />';
          $okflg = false;
        }
        else {
          print '会社名<br />';
          print $member_company_name;
          print '<br /><br />';
        }

        if($member_division_name == ''){
          print '部署名が入力されていません。<br /><br />';
          $okflg = false;
        }
        else {
          print '部署名<br />';
          print $member_division_name;
          print '<br /><br />';
        }


        if($member_pass==''){
          print 'パスワードが入力されていません。<br />';
        }

        if($member_pass!=$member_pass2){
          print 'パスワードが一致しません。<br />';
        }

        if($okflg==false){
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
        }
        else{
            $member_pass=md5($member_pass);
            print '<form method="post" action="member_add_done.php">';
            print '<input type="hidden" name="name" value="'.$member_name.'">';
            print '<input type="hidden" name="email" value="'.$member_email.'">';
            print '<input type="hidden" name="company_name" value="'.$member_company_name.'">';
            print '<input type="hidden" name="division_name" value="'.$member_division_name.'">';
            print '<input type="hidden" name="pass" value="'.$member_pass.'">';
            print '<br />';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="ＯＫ">';
            print '</form>';          
        }
      }catch (Exception $e){
        print $e.'<br/>';
        print 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
      }
      
      ?>  
  </body>
</html>
