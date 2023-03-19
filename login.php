<?php

session_start();

function decrypt($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $c = base64_decode($ciphertext);
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
    if (hash_equals($hmac, $calcmac)) {
        return $original_plaintext;
    }
    return null;
}

function encrypt($plaintext, $key) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
    return base64_encode($iv . $hmac . $ciphertext_raw);
}

// Cek apakah cookie login ada
if (isset($_COOKIE['login'])) {
    // Jika ada, lakukan dekripsi
    $encrypted_value = $_COOKIE['login'];
    $cookie_key = 'temorubun'; // Use the same key used for encryption
    $cookie_value = decrypt($encrypted_value, $cookie_key);

    // Cek apakah cookie value valid
    if ($cookie_value === 'agung') {
        // Jika valid, redirect ke halaman home.php
        header("Location: https://temorubun.site/index/php4/");
        exit();
    }
}

$koneksi = mysqli_connect("localhost", "n1577759_admin", "6UEWK2T1ZWGJ", "n1577759_register");

if(isset($_POST['login'])){
    $email = strtolower(trim(mysqli_real_escape_string($koneksi, $_POST['email'])));
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $error_msgs = array();
    
    $cek_email = mysqli_query($koneksi, "SELECT * FROM `register` WHERE email = '$email'");

    if(mysqli_num_rows($cek_email) === 1){
        $data = mysqli_fetch_assoc($cek_email);
        if(password_verify($password, $data['password'])){
            
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["user"] = $email; 
            $_SESSION["pass"] = $password; 
            
            $cookie_value = "agung";
            $cookie_key = 'temorubun';
            $encrypted_value = encrypt($cookie_value, $cookie_key);
            setcookie("login", $encrypted_value, time()+120);
            header("Location: https://temorubun.site/index/php4/"); 
            exit();
        }
        else{
            $error_msgs[] = "Password yang Anda masukkan salah";
        }
    }
    else{
        $error_msgs[] = "Email yang Anda masukkan tidak terdaftar";
    }

    // Jika terdapat pesan kesalahan
    if(!empty($error_msgs)){
        $error_msg = implode("<br>", $error_msgs);
        // Tampilkan pesan kesalahan
        // echo $error_msg;
    }
}

?>
