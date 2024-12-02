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
        $db_host = 'localhost:3307';
        $db_user = 'root';
        $db_port = '3307';
        //$db_password = 'admin123';
        $db_password = '';
        $pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
        return $pdo;

        /*BD CASA
        $db_name = 'overcrud';
        $db_host = 'localhost';
        $db_user = 'root';
        $db_port = '3306';
        $db_password = '';        
        $pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
        return $pdo;
        ?>
*/
}
};