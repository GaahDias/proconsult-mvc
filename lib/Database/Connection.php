<?php

abstract class Connection
{
    const HOST = 'localhost';
    const NAME = 'db_proconsult';
    const USER = 'root';
    const PASSWORD = 'root';

    private static $con;

    public static function getCon()
    {
        try {
            //se ainda não tiver sido feita a conexao, crie o objeto pdo com a conexao
            if (self::$con == null) {
                self::$con = new PDO('mysql: host=' . self::HOST . '; dbname=' . self::NAME . ';', self::USER, self::PASSWORD);
            }

            return self::$con;
        } catch (Exception $e) { //mensagem de erro caso a conexao falhe
            echo '<h2>Erro ao se conectar com o banco de dados.</h2> <br>';
            echo 'ERROR MESSAGE: ' . $e;
        }
    }
}
