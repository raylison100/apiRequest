<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 17/10/18
 * Time: 11:01
 */

class BuscaController
{
    function enviaConteudoParaAPI($conteudoAEnviar, $url, $conteudoEJson){
        //Inicializa cURL para uma URL.
        $ch = curl_init($url);
        //Marca que vai enviar por POST(1=SIM).
        curl_setopt($ch, CURLOPT_POST, 1);
        //Passa um json para o campo de envio POST.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $conteudoAEnviar);
        //Marca como tipo de arquivo enviado json
        if ($conteudoEJson !== False)
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'X-AUTH-TOKEN: ' . $_SESSION['tokenEnviar']));
        else
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain', 'X-AUTH-TOKEN: ' . $_SESSION['tokenEnviar']));

        //Marca que vai receber string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //Inicia a conexão
        $result = curl_exec($ch);
        //Fecha a conexão
        curl_close($ch);
        return $result;
    }

    function teste(){
        return "ilusgdfouysgdfouygsodufyg";
    }


}