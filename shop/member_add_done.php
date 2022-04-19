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

        $ini = get_ini();
        $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
        $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO dat_member(member_name, company_name, division_name, email, password) VALUES (?,?,?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data = array();
        $data[] = $member_name;
        $data[] = $member_company_name;
        $data[] = $member_division_name;
        $data[] = $member_email;
        $data[] = $member_pass;
        $stmt->execute($data);

        $sql = 'SELECT LAST_INSERT_ID()';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastmemberid = $rec['LAST_INSERT_ID()'];

        $web_id = sprintf( '%08d', $lastmemberid);

        $sql = 'UPDATE dat_member SET web_id=? WHERE id=?';
        $stmt= $dbh->prepare($sql);
        $data = array();
        $data[] = $web_id;
        $data[] = $lastmemberid;
        $stmt->execute($data);
        
        print $member_name. 'さんを追加しました。<br>';

      }catch (Exception $e){
        print 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
      }

    ?>

    <a href="staff_list.php">戻る</a>

  </body>
</html>
