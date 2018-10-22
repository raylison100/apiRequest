<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 22/10/18
 * Time: 12:03
 */

use GuzzleHttp\Client;

class BuscaController
{

    private $client;


    function __construct()
    {
        $this->client = new Client();
    }

    private function rederect($url)
    {


        switch ($url["path"]) {
            case '/airports':

                $url2 = "https://gateway.buscaaereo.com.br/psv/";

                /*//Ultilizando biblioteca Curl

                //Inicializa cURL para uma URL.
                $ch = curl_init($url2);
                //Marca que vai receber string
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                //Inicia a conexão
                $result = curl_exec($ch);
                //Fecha a conexão
                curl_close($ch);
                echo $result;*/


                //Ultilizando cliente HTTP Guzzle

                try {
                    /*// Cria um cliente com uma base URI
                    $client = new  GuzzleHttp \ Client (['base_uri' => $url2]);
                    // Envie um pedido para "https://gateway.buscaaereo.com.br/psv/airports"
                    $response = $client->request('GET', 'airports');*/

                    // outra opção


                    $response  =  $this->client -> request ( 'GET' ,  'https://gateway.buscaaereo.com.br/psv/airports' );

                } catch (RequestException  $e) {
                    //(tempo limite de conexão, erros de DNS, etc.)
                    echo Psr7 \ str($e->getRequest());
                    if ($e->hasResponse()) {
                        echo Psr7 \ str($e->getResponse());
                    }

                } catch (ClientException  $e) {
                    //Lançado para erros de nível 400
                    echo Psr7 \ str($e->getRequest());
                    echo Psr7 \ str($e->getResponse());

                } catch (ServerException $e){
                    //Lançado para erros de nível 500
                    echo Psr7 \ str($e->getRequest());
                    echo Psr7 \ str($e->getResponse());
                }

                if ($response->getStatusCode() == '200') {
                    echo $response->getBody();
                } else
                    echo 'Sistema indisponivel';
                break;

            default:

                echo 'ROTA NÂO PERMITIDA' . "\n";

                break;
        }
    }

    private function descobreMetodo()
    {

        $requisicao = $_SERVER['REQUEST_METHOD'];
        return $requisicao;
    }

    private function descobreURL()
    {

        $dominio = $_SERVER['HTTP_HOST'];
        $url = $dominio . $_SERVER['REQUEST_URI'];
        return $url;
    }

    private function validaRequicao()
    {

        $metodo = $this->descobreMetodo();

        switch ($metodo) {

            case 'POST':
                return true;
                break;
            case 'GET':
                return true;
                break;
            default:
                return false;
        }

    }

    private function quebraURL()
    {
        //url de solicitação
        $simplesURL = (parse_url($this->descobreURL()));
        return $simplesURL;

    }

    public function selectVoos()
    {

        if ($this->validaRequicao()) {
            $this->rederect($this->quebraURL());
        } else
            echo "Requição não permitida";

    }
}