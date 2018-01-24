<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 11.01.2018
 * Time: 21:18
 */
include_once 'config.php';
class ConnectDb extends Config
{
    public function __construct()
    {}
    public static function connect(){
        try
        {
            $pdo = new PDO("mysql:host=".parent::HOST.";dbname=".parent::DATABASE, parent::MYSQL_USER, parent::MYSQL_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(PDOException $e)
        {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
        return $pdo;
    }
}