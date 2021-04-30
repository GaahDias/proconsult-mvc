<?php

class Core
{
    public function start($url)
    {
        $action = 'index';

        //se a pagina existir, transformar o url fornecido em uma string com o nome da classe Controller
        if (isset($url['page'])) {
            $controller = ucfirst($url['page'] . 'Controller');
        } else {
            $controller = 'HomeController';
        }

        if (!class_exists($controller)) {
            $controller = 'ErrorController';
        }

        //pegando o resultado do controller
        call_user_func_array(array(new $controller, $action), array());
    }
}
