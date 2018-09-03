<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aes
 *
 * @author Admin
 */
class aes {

    public function encriptar_AES($string, $key) {
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_URANDOM);
        mcrypt_generic_init($td, $key, $iv);
        $encrypted_data_bin = mcrypt_generic($td, $string);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $encrypted_data_hex = bin2hex($iv) . bin2hex($encrypted_data_bin);
        return $encrypted_data_hex;
    }

    function desencriptar_AES($encrypted_data_hex, $key) {
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
        $iv_size_hex = mcrypt_enc_get_iv_size($td) * 2;
        $iv = pack("H*", substr($encrypted_data_hex, 0, $iv_size_hex));
        $encrypted_data_bin = pack("H*", substr($encrypted_data_hex, $iv_size_hex));
        mcrypt_generic_init($td, $key, $iv);
        $decrypted = mdecrypt_generic($td, $encrypted_data_bin);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $decrypted;
    }

    public function svlic($data) {
        $head = 
'<?php
/**
 * @copyright (c) 2017, RockJS Framework by Focus On Serivices
 * @version 1.0
 * @requires OpenEdge 102b or 91d
 * @author RockJS Framework by Focus On Serivices
 * @license http://focusonservices.com/rockjs FOCUS ON SERVICES
 */
';
        
$lic = 'define("licence","'.$data.'",false);';
        //Si no existe Crea un archivo nuevo
        $sd = fopen(dirname(__FILE__) . 'licence.php', "w") or die("Unable to open file!");
        //Escribimos el contenido
        fwrite($sd, $head);
        fwrite($sd, $lic);
        fclose($sd);
        echo 'Data ' . $lic;
    }

    public function directoryes() {
        echo dirname(__FILE__);
    }

}
