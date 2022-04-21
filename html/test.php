<?php

	// 下記サイトを参考に実装
	// https://qiita.com/watataku8911/items/c6da15457c84e2d2db4b


	//////////////////////// 暗号化 ////////////////////////////
	
	// function encrypt($plain_text, $password) {
	// 	// ランダムな8バイトのSaltを生成
	// 	$random_salt = openssl_random_pseudo_bytes(8);

	// 	// パスワードとSaltからKeyとIVを生成
	// 	$key_data = $password.$random_salt;
	// 	$raw_key = md5($key_data, true);

	// 	$iv_data = $raw_key.$password.$random_salt;
	// 	$iv = md5($iv_data, true);

	// 	// 暗号化
	// 	$encrypted = openssl_encrypt($plain_text, 'aes-128-cbc', $raw_key, OPENSSL_RAW_DATA, $iv);
	// 	return ( base64_encode("Salted__".$random_salt.$encrypted) );
	// }

	// function decrypt($encrypted_text, $password) {
	// 	// 復号
	// 	$payload_text = base64_decode($encrypted_text);
	// 	$header = substr($payload_text, 0, 7);
	// 	$salt = substr($payload_text, 8, 8);
	// 	$data = substr($payload_text, 16);
	// 	// パスワードとSaltからKeyとIVを生成
	// 	$key_data = $password.$salt;
	// 	$raw_key = md5($key_data, true);
	// 	$iv_data = $raw_key.$password.$salt;
	// 	$iv = md5($iv_data, true);
	// 	$decrypted_text = openssl_decrypt($data, 'aes-128-cbc', $raw_key, OPENSSL_RAW_DATA, $iv);
	// 	return ( $decrypted_text );
	// }
    require_once('common/encrypt.php');

	// Usage:
	$data = array(
		'web_id' 		=> '01234569',
		'company_name' 	=> '構造計画研究所',
		'division_name'	=> '知識デザイン部',
		'member_name' 	=> '構研太郎'
	);

	// jsonに変換
	$json_data = json_encode( $data );
	print "json_data: " . $json_data . "<br>";

	$str = $json_data;
	print "Plain text: " . $str . "<br>";

	// 暗号化用事前共有鍵（8桁のランダム文字列）
	// !!!!!10桁ではなく、8桁!!!!!!!!!!!!!!!
	$password = "Tu31J7F1";
	print "Password: " . $password . "<br>";

	// 暗号化処理
	$encrypted = encrypt($str, $password);
	print "encrypted：" . $encrypted . "<br>";

	$rawurlencode = rawurlencode($encrypted);
	print "rawurlencode:" . $rawurlencode . "<br>";

	// 復号処理
	$decrypted = decrypt($encrypted, $password);
	print "decrypted：" . $decrypted . "<br>";

	// 連携用認証コード（10桁のランダム文字列）
	$auth = "AXEL_cjT5K";
	//$auth = "CORP_12345";
	//$url = "https://cpq.agi.co.jp/#/index-from-AXEL.html" ."?s=" .$auth. "&m=" . $rawurlencode;
	// $url = "http://localhost:3000/#/index-from-AXEL.html" ."?s=" .$auth. "&m=" . $rawurlencode;
	$url = "http://localhost:3000/#/index.html" ."?s=" .$auth. "&m=" . $rawurlencode;
	print "url:" . $url . "<br>";

?>


<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta charset="utf-8"/>
	<script language="JavaScript">
    	window.onload = function(){
		var url = '<?php echo $url; ?>';
		var sbtn=document.getElementById('sbtn');
		sbtn.addEventListener('click',function(){
			pop = window.open(url) ; 
		},false);
	};
	</script>
</head>
<body>
	<input id="sbtn" type="submit" value="open" />

</body>
</html>