<?php
/**
 * Estas 2 funciones permiten encriptar y desencriptar fácilmente con el potente 
 * algoritmo AES, desde PHP.
 * Una ventaja importante de estas 2 funciones es que generan una salida basada 
 * en números y letras gracias a bin2hex, es decir, no es binario, 
 * y por lo tanto no es necesario hacer base64_encode ni nada similar. 
 * Tampoco hay problemas con el tema de los acentos del español, las eñes, etc. 
 * El algoritmo AES es extremadamente seguro.

 */

$frase = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c';
$clave = "vacaiberica";

echo $encriptado = encriptar_AES($frase, $clave);

echo '<br>'.$desencriptado = desencriptar_AES($encriptado, $clave);


function encriptar_AES($string, $key)
{
     $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
     $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_URANDOM );
     mcrypt_generic_init($td, $key, $iv);
     $encrypted_data_bin = mcrypt_generic($td, $string);
     mcrypt_generic_deinit($td);
     mcrypt_module_close($td);
     $encrypted_data_hex = bin2hex($iv).bin2hex($encrypted_data_bin);
     return $encrypted_data_hex;
 }

 function desencriptar_AES($encrypted_data_hex, $key)
 {
     $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
     $iv_size_hex = mcrypt_enc_get_iv_size($td)*2;
     $iv = pack("H*", substr($encrypted_data_hex, 0, $iv_size_hex));
     $encrypted_data_bin = pack("H*", substr($encrypted_data_hex, $iv_size_hex));
     mcrypt_generic_init($td, $key, $iv);
     $decrypted = mdecrypt_generic($td, $encrypted_data_bin);
     mcrypt_generic_deinit($td);
     mcrypt_module_close($td);
     return $decrypted;
 }