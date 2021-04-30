<?php

class HomeController
{
    public function index()
    {
        $prods = Product::select();

        var_dump($prods);
    }
}
