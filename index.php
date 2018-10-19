<?php

class BuscaController
{

    private function rederect($url)
    {


        switch ($url["path"]) {
            case '/voos':

                $url2 = "https://gateway.buscaaereo.com.br/psv/airports";
                //Inicializa cURL para uma URL.
                $ch = curl_init($url2);
                //Marca que vai receber string
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                //Inicia a conexão
                $result = curl_exec($ch);
                //Fecha a conexão
                curl_close($ch);

                echo $result;

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
        }else
            echo "Requição não permitida";

    }
}

// instancia o controlado para tratamento da requisição
$controller = new BuscaController();
$controller->selectVoos();

?>
