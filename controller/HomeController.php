<?php
class HomeController
{
    public function index()
    {
        //carregando a view home
        $content = file_get_contents('./view/home.html');
        echo $content;
    }
}
