<?php
class ProductController
{
    //Listar
    public function list()
    {
        try {
            //pegando produtos do db
            $prods = Product::select();

            $content = file_get_contents('./view/list.html');
            $displayProducts = "";

            //loopando os itens
            for ($x = 0; $x < count($prods); $x++) {
                $displayProducts .= "<img src='./img/prods/{$prods[$x]['prod_image']}'>
                <h3>{$prods[$x]['prod_name']}</h3>
                <p>R$ {$prods[$x]['prod_price']}</p>";
            }

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
            if (!empty($_POST['txtName']) && !empty($_POST['fileImage']) && !empty($_POST['nmbPrice'])) {
                Product::insert($_POST['txtName'], $_POST['fileImage'], $_POST['nmbPrice']);
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
        $prodName = Product::select();

        $content = file_get_contents('./view/update.html');
        $options = "";

        for ($x = 0; $x < count($prodName); $x++) {
            $options .= "<option value='{$prodName[$x]['id_prod']}'>{$prodName[$x]['prod_name']}</option>";
        }

        $content = str_replace('{{options}}', $options, $content);
        echo $content;

        if ($_POST != null) {
            if (!empty($_POST['optUpdate']) && !empty($_POST['txtName']) || !empty($_POST['fileImage']) || !empty($_POST['nmbPrice'])) {
                Product::update($_POST['optUpdate'], $_POST['txtName'], $_POST['fileImage'], $_POST['nmbPrice']);
                echo "<script>const messageFlag = true; let message = 'updateSuccess';</script>";
            } else {
                echo "<script>const messageFlag = true; let message = 'updateFail';</script>";
            }
        }
    }

    //Deletar
    public function delete()
    {
        if ($_POST != null) {
            if (!empty($_POST['optDelete'])) {
                Product::delete($_POST['optDelete']);
                echo "<script>const messageFlag = true; let message = 'deleteSuccess';</script>";
            } else {
                echo "<script>const messageFlag = true; let message = 'deleteFail';</script>";
            }
        }

        $prodName = Product::select();

        $content = file_get_contents('./view/delete.html');
        $options = "";

        for ($x = 0; $x < count($prodName); $x++) {
            $options .= "<option value='{$prodName[$x]['id_prod']}'>{$prodName[$x]['prod_name']}</option>";
        }

        $content = str_replace('{{options}}', $options, $content);
        echo $content;
    }
}
