<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 12.01.2018
 * Time: 18:53
 */

include_once "ConnectDb.php";
ob_start();

class Read
{
    public $connectionDb;
    public $results;
    public $query;
    public function __construct($connectionDb, $query)
    {
        $this->connectionDb= $connectionDb; //przekazywanie z parametru- obiektu PDO z klasy ConnectDb
        $this->query= $query;
    }

    public function getDataFromDB(){
        $this->results = $this->connectionDb->query($this->query);
        return $this->results;
    }

    public static function getDataById($id){
        if (isset ($id)) {
                $results = ConnectDb::connect()->query('SELECT * FROM `sprzet` where id='. $id);
                return $results;
            }
        else {
            echo 'jakis problem z getem';
            header('location: index.php');
            }
    }
}
