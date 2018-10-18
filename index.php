<?php

//url solicitada
//$url = "http://10.1.1.219:8080/psv/airports";
$url ="http://headers.jsontest.com/";
//$method  =  $SERVER['REQUEST_METHOD'];
//Inicializa cURL para uma URL.
$ch = curl_init($url);
//Marca que vai receber string
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//Inicia a conexão
$result = curl_exec($ch);
//Fecha a conexão
curl_close($ch);
echo $result;
echo $method;
?>
