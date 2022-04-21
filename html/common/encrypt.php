<?php

	// 以下を参考に実装
	// https://qiita.com/kazuhidet/items/509bee2c3a109ff6ea61

	function encrypt($plain_text, $password) {
		// ランダムな8バイトのSaltを生成
		$random_salt = openssl_random_pseudo_bytes(8);

		// パスワードとSaltからKeyとIVを生成
		$key_data = $password.$random_salt;
		$raw_key = md5($key_data, true);

		$iv_data = $raw_key.$password.$random_salt;
		$iv = md5($iv_data, true);

		// 暗号化
		$encrypted = openssl_encrypt($plain_text, 'aes-128-cbc', $raw_key, OPENSSL_RAW_DATA, $iv);
		return ( base64_encode("Salted__".$random_salt.$encrypted) );
	}

	function decrypt($encrypted_text, $password) {
		// 復号
		$payload_text = base64_decode($encrypted_text);
		$header = substr($payload_text, 0, 7);
		$salt = substr($payload_text, 8, 8);
		$data = substr($payload_text, 16);
		// パスワードとSaltからKeyとIVを生成
		$key_data = $password.$salt;
		$raw_key = md5($key_data, true);
		$iv_data = $raw_key.$password.$salt;
		$iv = md5($iv_data, true);
		$decrypted_text = openssl_decrypt($data, 'aes-128-cbc', $raw_key, OPENSSL_RAW_DATA, $iv);
		return ( $decrypted_text );
	}

?>