<?php

class Product
{
    public static function select()
    {
        $con = Connection::getCon();

        $query = "SELECT * FROM tb_product ORDER BY id_prod DESC";
        $query = $con->prepare($query);
        $query->execute();

        $id = 0;

        while ($x = $query->fetch(PDO::FETCH_ASSOC)) {
            $res[$id] = $x;

            $id++;
        }

        if (!$res) {
            throw new Exception('Nenhum registro no banco encontrado.');
        }

        return $res;
    }
}
