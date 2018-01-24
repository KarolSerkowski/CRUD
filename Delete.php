<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 16.01.2018
 * Time: 20:20
 */
require_once "ConnectDb.php";
ob_start();
class Delete
{
    private $id;
    public function __construct($idDelete)
    {
        $this->id= $idDelete;

        $this->deleteDataFromDb();
    }

    public function deleteDataFromDb()
    {
        if ($this->id > 0) {
            $del = ConnectDb::connect()->prepare('DELETE FROM `sprzet` WHERE id = :id ');
            $del->bindParam(':id', $this->id);
            $del->execute();
            unset ($_GET['controllerFunctionId']);
            header('location: Controller.php');
            exit;
        } else {
            unset ($_GET['controllerFunctionId']);
            header('location: index.php');
        }
    }

}
?>