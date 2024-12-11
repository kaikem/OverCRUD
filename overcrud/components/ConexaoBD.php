<?php
class ConexaoBD
{
    //-----------------------------------------------------------------------------
    //CONSTRUTOR
    public function __construct() {}


    //-----------------------------------------------------------------------------
    //FUNÇÕES
    //conexão com bd
    public static function conectarBD()
    {
        $db_name = 'overcrud';
        $db_host = 'localhost';
        $db_user = 'root';
        $db_port = '3306';
        $db_password = '';
        $pdo = new PDO("mysql:dbname=$db_name;host=$db_host:$db_port", $db_user, $db_password);
        return $pdo;
    }
};