<?php

class Product
{
    public static function select()
    {
        $con = Connection::getCon();

        $query = "SELECT * FROM tb_product ORDER BY id_prod DESC";
        $query = $con->prepare($query);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);

        if(!$res) {
            throw new Exception('Nenhum registro no banco encontrado.');
        }

        return $res;
    }
}
