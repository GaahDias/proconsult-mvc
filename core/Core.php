<?php

class Core
{
    public function start($url)
    {
        $action = 'index';
        $controller = '';

        //se a url fornecida for valida, alterar o nome das variaveis $controller e $action
        if (isset($url['page'])) {

            if ($url['page'] == 'prod') {

                $controller = 'ProductController';

                switch ($url['action']) {
                    case 'list':
                        $action = 'list';
                        break;
                    case 'register':
                        break;
                    case 'update':
                        break;
                    case 'delete':
                        break;
                    default:
                        $controller = 'ErrorController';
                }
            }
        } else {
            $controller = 'HomeController';
        }

        //caso o controller fornecido nao existe, direcionar o usuario para a pagina de erro
        if (!class_exists($controller)) {
            $controller = 'ErrorController';
        }

        //pegando a funcao do controller
        call_user_func_array(array(new $controller, $action), array());
    }
}
