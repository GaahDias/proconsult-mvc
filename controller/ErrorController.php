<?php

class ErrorController
{
    public function index()
    {
        $content = file_get_contents('./view/error.html');
        echo $content;
    }
}
