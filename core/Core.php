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

                //alterando entre as list, register, update, e delete
                switch ($url['action']) {
                    case 'list':
                        $action = 'list';
                        break;
                    case 'register':
                        $action = 'register';
                        break;
                    case 'update':
                        $action = 'update';
                        break;
                    case 'delete':
                        $action = 'delete';
                        break;
                    default:
                        $controller = 'ErrorController';
                }
            }
        } else {
            $controller = 'HomeController';
        }

        //caso o controller fornecido nao exista, direcionar o usuario para a pagina de erro
        if (!class_exists($controller)) {
            $controller = 'ErrorController';
        }

        //pegando a funcao do controller
        call_user_func_array(array(new $controller, $action), array());
    }
}
