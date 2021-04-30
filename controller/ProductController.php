<?php
class ProductController
{
    //Listar
    public function list()
    {
        try {
            //pegando produtos do db
            $prods = Product::select();

            //loopando os itens
            for ($x = 0; $x < count($prods); $x++) {
                $content = file_get_contents('./view/list.html');
                $content = str_replace('{{prod_name}}', $prods[$x]['prod_name'], $content);
                echo $content;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //Cdastrar
    public function register()
    {
    }

    //Atualizar
    public function update()
    {
    }

    //Deletar
    public function delete()
    {
    }
}
