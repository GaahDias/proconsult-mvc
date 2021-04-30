<?php
class HomeController
{
    public function index()
    {
        //pegando conteudo home da view
        $content = file_get_contents('./view/home.html');
        echo $content;
    }
}
