<?php

include '../aes/aes.php';

$dir = new aes();

$myLlave = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJSb2NrSlMiLCJsaWNlbmNlLXR5cGUiOiJDT1JFIiwiZGV0YWlsIjoiMzYgQ09ScyIsIm5hbWUiOiJCZXJuYWJlIEd1dGllcnJleiIsImNvbXBhbnkiOiJGb2N1cyBPbiBTZXJ2aWNlcyIsImRlcHRvIjoiVEkiLCJleHBpcmUiOiIxMi0xMi0yMDE4IiwiaWF0IjoxNTE2MjM5MDIyfQ.tyPv1yXb8GzJOum7T_rDE7OeEVQb6Vd52Cr_m-Bs6ZI';
$myLLaveEnciptada = $dir->encriptar_AES($myLlave, '1234');

$dir->svlic($myLLaveEnciptada);
