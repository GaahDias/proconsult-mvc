<?php
class ListController
{
    public function index()
    {
        try {
            $prods = Product::select();

            $content = file_get_contents('./view/list.html');
            $content = str_replace('{{prod_name}}', $prods['prod_name'], $content);
            echo $content;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
