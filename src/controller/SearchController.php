<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 22/10/18
 * Time: 12:03
 */

use GuzzleHttp\Client;

class SearchController
{

    private $client;


    function __construct()
    {
        $this->client = new Client();
    }

    public function redirection($url)
    {


        switch ($url["path"]) {
            case '/airports':

                //$url2 = "https://gateway.buscaaereo.com.br/psv/";

                /*//Using Curl library

                //Initializes cURL for a URL.
                $ch = curl_init($url2);
                //Brand that will receive string
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                //Starts the connection
                $result = curl_exec($ch);
                //Close the connection
                curl_close($ch);
                echo $result;*/


                //Using HTTP Guzzle Client

                try {
                    /*//Create a client with a base URI
                    $client = new  GuzzleHttp \ Client (['base_uri' => $url2]);
                    //Send a request to "https://gateway.buscaaereo.com.br/psv/airports"
                    $response = $client->request('GET', 'airports');*/

                    // another option


                    $response  =  $this->client -> request ( 'GET' ,  'https://gateway.buscaaereo.com.br/psv/airports' );
                    header('Content-Type: application/json');

                } catch (RequestException  $e) {
                    //(connection timeout, DNS errors, etc.)
                    echo Psr7 \ str($e->getRequest());
                    if ($e->hasResponse()) {
                        echo Psr7 \ str($e->getResponse());
                    }

                } catch (ClientException  $e) {
                    //Launched for level 400 errors
                    echo Psr7 \ str($e->getRequest());
                    echo Psr7 \ str($e->getResponse());

                } catch (ServerException $e){
                    //Launched for level 500 errors
                    echo Psr7 \ str($e->getRequest());
                    echo Psr7 \ str($e->getResponse());
                }

                if ($response->getStatusCode() == '200') {
                    echo $response->getBody();
                } else
                    echo 'System Unavailable';
                break;

            default:

                echo 'ROUTE NOT ALLOWED' . "\n";

                break;
        }
    }

    public function discoversMethod()
    {

        $request = $_SERVER['REQUEST_METHOD'];
        return $request;
    }

    public function discoversURL()
    {

        //$domain = $_SERVER['HTTP_HOST'];
        $url = $_SERVER['REQUEST_URI'];

        return $url;
    }

    public function validRequest()
    {

        $method = $this->discoversMethod();

        switch ($method) {

            case 'GET':
                return true;
                break;
            default:
                return false;
        }

    }

    public function smashURL()
    {
        //Request URl
        $simpleURL = (parse_url($this->discoversURL()));
        return $simpleURL;

    }

    public function selectFlight()
    {

        if ($this->validRequest()) {
            $this->redirection($this->smashURL());
        } else
            echo "Required not allowed";

    }
}