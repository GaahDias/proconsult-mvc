<?php

class Product
{
    //SELECT
    public static function select()
    {
        try {
            //fazendo conexao com o db
            $con = Connection::getCon();

            //comando de select
            $select = "SELECT * FROM tb_product ORDER BY id_prod DESC";
            $select = $con->prepare($select);
            $select->execute();

            //variavel para incrementar o index da array
            $index = 0;

            //variavel que armazenará o resultado
            $res = [];

            //enquanto existir itens no meu select, adicione eles ao meu resultado
            while ($s = $select->fetch(PDO::FETCH_ASSOC)) {
                $res[$index] = $s;

                $index++;
            }

            return $res;
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    //INSERT
    public static function insert($name, $image, $price)
    {
        //fazendo conexao
        $con = Connection::getCon();

        //comando de insert
        $insert = "INSERT INTO tb_product VALUE (DEFAULT, '{$name}', '{$image}', {$price})";
        $insert = $con->prepare($insert);
        $insert->execute();
    }

    //UPDATE
    public static function update($id, $name, $image, $price)
    {
        //fazendo conexao
        $con = Connection::getCon();

        //update dos campos fornecidos
        if (!empty($id)) {
            if ($name != '') {
                $update = "UPDATE tb_product SET prod_name = '$name' WHERE id_prod = $id";
                $update = $con->prepare($update);
                $update->execute();
            } else if ($image != '') {
                $update = "UPDATE tb_product SET prod_image = '$image' WHERE id_prod = $id";
                $update = $con->prepare($update);
                $update->execute();
            } else if ($price != '') {
                $update = "UPDATE tb_product SET prod_price = $price WHERE id_prod = $id";
                $update = $con->prepare($update);
                $update->execute();
            }
        }
    }

    //DELETE
    public static function delete($id)
    {
        //fazendo conexao
        $con = Connection::getCon();

        //comando delete
        if (!empty($id)) {
            $delete = "DELETE FROM tb_product WHERE id_prod = $id";
            $delete = $con->prepare($delete);
            $delete->execute();
        }
    }

    //SELECT WHERE - USADO NA CLASSE IMAGE.PHP
    public static function selectWhere($id)
    {
        //fazendo conexao
        $con = Connection::getCon();

        //comando select
        $select = "SELECT * FROM tb_product WHERE id_prod = $id";
        $select = $con->prepare($select);
        $select->execute();

        //resultado do select
        $res = $select->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
}
