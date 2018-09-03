<?php

include '../aes/aes.php';

$decript = new aes();

include '../aeslicence.php';

//echo '<br>'.$decript->desencriptar_AES($Licence, "1234");

 $myllave = constant("licence");
 
 $llaveDesencriptada = $decript->desencriptar_AES($myllave, '1234');
 echo $llaveDesencriptada;