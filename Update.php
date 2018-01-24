<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 16.01.2018
 * Time: 19:50
 */
include_once "ConnectDb.php";
ob_start();
class Update
{
    public function __construct()
    {
    }

    public function updateDataDb($idEdit)
    {
        if (isset ($idEdit)) {
            $this->idEdit=$idEdit;
            $this->manufacturerEdit=$_GET['manufacturerEdit'];
            $this->modelEdit=$_GET['modelEdit'];
            $this->serial_numberEdit=$_GET['serial_numberEdit'];
            $this->id_typEdit = $_GET['id_typEdit'];
            $query= "UPDATE sprzet SET 					
                        manufacturer = :manufacturer,					
                        model = :model,					
                        serial_number = :serial_number,
                        id_typ = :id_typ 		 
                        where id = :id";
            $updateItem=ConnectDb::connect()->prepare($query);
            $updateItem->bindParam(':id', $this->idEdit,PDO::PARAM_INT);
            $updateItem->bindParam(':id_typ', $this->id_typEdit,PDO::PARAM_INT);
            $updateItem->bindParam(':manufacturer', $this->manufacturerEdit,PDO::PARAM_STR);
            $updateItem->bindParam(':model', $this->modelEdit,PDO::PARAM_STR);
            $updateItem->bindParam(':serial_number', $this->serial_numberEdit, PDO::PARAM_STR);
            $updateItem->execute();
            header('location: index.php');
        }
        else {
            echo 'cos nie tak z update';
        }
    }
}
?>