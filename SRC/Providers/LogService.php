<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 31/10/18
 * Time: 08:50
 */

namespace SRC\Providers;


class LogService
{
    public static $instance;

    private function __construct()
    {
        self::$instance = $this;
    }

    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function index()
    {
        $this->logMe("Email visto ");
    }

    function logMe($msg)
    {

        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');

        // Abre ou cria o arquivo bloco1.txt
        // "a" representa que o arquivo é aberto para ser escrito
        $fp = fopen("log.txt", "a");
        fwrite($fp, $msg . " --- " . $date . "\n");// Escreve a mensagem passada através da variável $msg
        fclose($fp);// Fecha o arquivo
    }
}