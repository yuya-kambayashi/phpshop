<?php
    try{

        require_once('../common/common.php');

        $post=sanitize($_POST);
            
        $member_email=$post['email'];
        $member_pass=$post['pass'];
        
        $member_pass=md5($member_pass);

        $ini = get_ini();
        $dsn = 'mysql:dbname='.$ini['db_dbname'].';host='.$ini['db_host'].';charset=utf8';
        $dbh = new PDO($dsn, $ini['db_username'], $ini['db_password']);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT id, member_name FROM dat_member where email = ? AND password = ?';
        $stmt = $dbh->prepare($sql);
        $data[]=$member_email;
        $data[]=$member_pass;
        $stmt->execute($data);

        $dbh = null;

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec==false){
            print '    <a href="../../index.php"><img src = "../../icon.png"></a><br /><br />';
            print 'メールアドレスかパスワードが間違っています。<br />';
            print '<a href="member_login.html">戻る</a>';
        }
        else{

            session_start();
            $_SESSION['member_login']=1;
            $_SESSION['member_id']=$rec['id'];
            $_SESSION['member_name']=$rec['member_name'];

            header('Location: shop_list.php');
            exit();   
        }
    }catch (Exception $e){
        print 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

?>