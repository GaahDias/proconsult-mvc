<?php
class HomeController
{
    public function index()
    {
        $content = file_get_contents('./view/home.html');
        echo $content;
    }
}
