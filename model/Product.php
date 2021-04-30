<?php

class Product
{
    public static function select()
    {
        $con = Connection::getCon();

        $query = "SELECT * FROM tb_product ORDER BY id_prod DESC";
        $query = $con->prepare($query);
        $query->execute();

        $res = [];

        while ($row = $query->fetchObject('Product')) {
            $res[] = $row;
        }

        return $res;
    }
}
