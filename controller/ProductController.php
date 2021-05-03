<?php
class ProductController
{
    //Listar
    public function list()
    {
        try {
            //pegando produtos do db
            $prods = Product::select();

            $displayProducts = "";

            //loopando os itens e adicionando eles em formato HTML
            for ($x = 0; $x < count($prods); $x++) {
                $displayProducts .= "<img src='./img/prods/{$prods[$x]['prod_image']}'>
                <h3>{$prods[$x]['prod_name']}</h3>
                <p>R$ {$prods[$x]['prod_price']}</p>";
            }

            //adicionando os itens na minha view
            $content = file_get_contents('./view/list.html');
            $content = str_replace('{{content}}', $displayProducts, $content);
            echo $content;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //Cdastrar
    public function register()
    {
        if ($_POST != null) {
            if (!empty($_POST['txtName']) && !empty($_FILES['fileImage']) && !empty($_POST['nmbPrice'])) {
                //inserindo produto no db
                Product::insert($_POST['txtName'], $_FILES['fileImage']['name'], $_POST['nmbPrice']);
                //salvando imagem na pasta 'img/prods/'
                Image::save($_FILES['fileImage']);

                //retornando se a operação foi bem sucedida ou não, para a mensagem em js
                echo "<script>const messageFlag = true; let message = 'registerSuccess';</script>";
            } else {
                echo "<script>const messageFlag = true; let message = 'registerFail';</script>";
            }
        }

        $content = file_get_contents('./view/register.html');
        echo $content;
    }

    //Atualizar
    public function update()
    {
        //fazendo select no banco
        $prodName = Product::select();

        $options = "";

        //adicionando opções de update na pagina
        for ($x = 0; $x < count($prodName); $x++) {
            $options .= "<option value='{$prodName[$x]['id_prod']}'>{$prodName[$x]['prod_name']}</option>";
        }

        $content = file_get_contents('./view/update.html');
        $content = str_replace('{{options}}', $options, $content);
        echo $content;

        if ($_POST != null) {
            if (!empty($_POST['optUpdate']) && !empty($_POST['txtName']) || !empty($_FILES['fileImage']) || !empty($_POST['nmbPrice'])) {

                //caso uma imagem tenha sido selecionada para a atualização, armazenando ela em 'img/prods/'
                if ($_FILES['fileImage']['size'] > 0) {
                    Image::update($_POST['optUpdate'], $_FILES['fileImage']);
                }

                //fazendo update
                Product::update($_POST['optUpdate'], $_POST['txtName'], $_FILES['fileImage']['name'], $_POST['nmbPrice']);

                //retornando se a operação foi bem sucedida ou não, para a mensagem em js
                echo "<script>const messageFlag = true; let message = 'updateSuccess';</script>";
            } else {
                echo "<script>const messageFlag = true; let message = 'updateFail';</script>";
            }
        }
    }

    //Deletar
    public function delete()
    {
        //fazendo select
        $prodName = Product::select();

        $options = "";

        //Loopando opcoes para exclusão
        for ($x = 0; $x < count($prodName); $x++) {
            $options .= "<option value='{$prodName[$x]['id_prod']}'>{$prodName[$x]['prod_name']}</option>";
        }

        if ($_POST != null) {
            if (!empty($_POST['optDelete'])) {

                //deletando imagem
                Image::delete($_POST['optDelete']);

                //deletando no db
                Product::delete($_POST['optDelete']);

                //retornando se a operação foi bem sucedida ou não, para a mensagem em js
                echo "<script>const messageFlag = true; let message = 'deleteSuccess';</script>";
            } else {
                echo "<script>const messageFlag = true; let message = 'deleteFail';</script>";
            }
        }

        $content = file_get_contents('./view/delete.html');
        $content = str_replace('{{options}}', $options, $content);
        echo $content;
    }
}
