<?php

function check_login($con)
{

	if(isset($_SESSION['id']))
	{

		$id = $_SESSION['id'];
		$query = "select * from admins where id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		} else {
			$query = "select * from users where id = '$id' limit 1";
			$result = mysqli_query($con,$query);
			
			if($result && mysqli_num_rows($result) > 0)
			{

				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
		}
	} else {
		header("Location: login.php");
	}
}

function check_admin($con, $user_data) {
	$type = $_SESSION['type'];

	if ($type == "user") {
		header("Location: store.php");
	}
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(6,$length - 1);

	for ($i=0; $i < $len; $i++) { 

		$text .= rand(0,9);
	}

	return $text;
}

function randomCode() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz123456789';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function randomNum() {
    $alphabet = '123456789';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function encrypt($string) {
	$ciphering = "ARIA-128-CFB";
  
	// Use OpenSSl Encryption method
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	
	// Non-NULL Initialization Vector for encryption
	$encryption_iv = '6057280297683440';
	
	// Store the encryption key
	$encryption_key = "monumentsStore13524";
	
	// Use openssl_encrypt() function to encrypt the data
	$encryption = openssl_encrypt($string, $ciphering,
				$encryption_key, $options, $encryption_iv);
	
	// Display the encrypted string
	return $encryption;
}

function decrypt($string) {
	$ciphering = "ARIA-128-CFB";

	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;

	// Non-NULL Initialization Vector for decryption
	$decryption_iv = '6057280297683440';
	
	// Store the decryption key
	$decryption_key = "monumentsStore13524";
	
	// Use openssl_decrypt() function to decrypt the data
	$decryption= openssl_decrypt($string, $ciphering, 
			$decryption_key, $options, $decryption_iv);
	
	// Display the decrypted string
	return $decryption;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
