<?php

class Core
{
    public function start($url)
    {
        $action = 'index';

        //se a pagina existir, transformar o url fornecido em uma string com o nome da classe Controller
        if (isset($url['pagina'])) {
            $controller = ucfirst($url['pagina'] . 'Controller');
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
