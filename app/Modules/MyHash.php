<?php

namespace App\Modules;

class MyHash
{
    static public function encrypt($token, $key) {
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($token, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv,);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        return str_replace('/', '\\', base64_encode( $iv.$hmac.$ciphertext_raw ));
    }
    
    static public function decrypt($hash, $key)
    {
        $hash = str_replace('\\', '/', $hash);
        $c = base64_decode($hash);
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    
        // timing attack safe comparison
        if (hash_equals($hmac, $calcmac)) {
            return $original_plaintext;
        }
    
        return false;
    }
}