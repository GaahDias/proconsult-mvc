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
        $content = file_get_contents('./view/register.html');
        echo $content;
    }

    //Atualizar
    public function update()
    {
        $content = file_get_contents('./view/update.html');
        echo $content;
    }

    //Deletar
    public function delete()
    {
        $content = file_get_contents('./view/delete.html');
        echo $content;
    }
}
