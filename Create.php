<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 16.01.2018
 * Time: 19:49
 */
include_once "ConnectDb.php";


class Create
{
    private $manufacturer;
    private $model;
    private $serial_number;
    private $id_typ;

    public function __construct(){

        if ( $_GET['manufacturer'] or $_GET['model'] or $_GET['serial_number']) {
            $this->manufacturer = $_GET['manufacturer'];
            $this->model = $_GET['model'];
            $this->serial_number = $_GET['serial_number'];
            $this->id_typ = $_GET['id_typ'];
            $this->addData();
        }
    }

    public function addData()
    {
            try {
                $add = ConnectDb::connect()->prepare('INSERT INTO `sprzet`
                    (
                    `id_typ`,					
					`model`,
					`manufacturer`,					
					`serial_number`)		 
					VALUES ( 	
					:id_typ,				
					:model,
					:manufacturer,
					:serial_number									
					)');
                $add->bindParam(':id_typ', $this->id_typ,PDO::PARAM_INT);
                $add->bindParam(':model', $this->model,PDO::PARAM_STR);
                $add->bindParam(':manufacturer', $this->manufacturer,PDO::PARAM_STR);
                $add->bindParam(':serial_number', $this->serial_number, PDO::PARAM_STR);
                $add->execute();
                unset ($_GET['controllerFunctionId']);
                header('location: index.php');
            }
            catch (PDOException $e) {
                echo 'Wystąpił blad biblioteki PDO: ' . $e->getMessage();
            }

    }

}