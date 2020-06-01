<?php

$clave  = 'carlchoksanc8686*@';
//Metodo de encriptación
$method = 'aes-256-cbc';
// Puedes generar una diferente usando la funcion $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");

$encriptar = function ($valor) use ($method, $clave, $iv) {
    return openssl_encrypt($valor, $method, $clave, false, $iv);
};



$desencriptar = function ($valor) use ($method, $clave, $iv) {
    $encrypted_data = base64_decode($valor);
    return openssl_decrypt($valor, $method, $clave, false, $iv);
};

$getIV = function () use ($method) {
    return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
};
