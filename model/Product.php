<?php

class Product
{
    //SELECT
    public static function select()
    {
        try {
            $con = Connection::getCon();

            $select = "SELECT * FROM tb_product ORDER BY id_prod DESC";
            $select = $con->prepare($select);
            $select->execute();

            $res = [];
            //variavel para incrementar o index da array
            $index = 0;

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
        $con = Connection::getCon();

        $insert = "INSERT INTO tb_product VALUE (DEFAULT, '{$name}', '{$image}', {$price})";
        $insert = $con->prepare($insert);
        $insert->execute();
    }

    //UPDATE
    public static function update($id, $name, $image, $price)
    {
        $con = Connection::getCon();

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
        $con = Connection::getCon();

        if (!empty($id)) {
            $delete = "DELETE FROM tb_product WHERE id_prod = $id";
            $delete = $con->prepare($delete);
            $delete->execute();
        }
    }
}
