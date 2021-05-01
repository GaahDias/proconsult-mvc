<?php

class Product
{
    //SELECT
    public static function select()
    {
        $con = Connection::getCon();

        $query = "SELECT * FROM tb_product ORDER BY id_prod DESC";
        $query = $con->prepare($query);
        $query->execute();

        //variavel para incrementar o index da array
        $index = 0;

        while ($x = $query->fetch(PDO::FETCH_ASSOC)) {
            $res[$index] = $x;

            $index++;
        }

        if (!$res) {
            throw new Exception('Nenhum registro no banco encontrado.');
        }

        return $res;
    }

    //INSERT
    public static function insert($name, $image, $price)
    {
        $con = Connection::getCon();

        $query = "INSERT INTO tb_product VALUE (DEFAULT, '{$name}', '{$image}', {$price})";
        $query = $con->prepare($query);
        $query->execute();
    }

    //UPDATE
    public static function update()
    {
        $con = Connection::getCon();
    }

    //DELETE
    public static function delete()
    {
        $con = Connection::getCon();
    }
}
