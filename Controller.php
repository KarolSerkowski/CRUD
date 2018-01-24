<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 11.01.2018
 * Time: 21:49
 */

include_once "Model.php";
include_once "template/header.php";
class Controller extends Model
{
    private $Model;
    private $queryAll="SELECT * FROM `sprzet`";
    public function  __construct()
    {
       $this->runModel();

       if (isset($_GET['controllerFunctionId']) && isset($_GET['id'])) {

           switch ($_GET['controllerFunctionId']) {
               case "add":
                   $this->Model->displayFormToAddData();
                   break;
               case "create":
                   $this->Model->addDataToDb();
                   break;
               case "delete":
                   $this->Model->deleteDataFromDb($_GET['id']);
                   break;
               case "edit":
                   $this->Model->displayEditDataFromDb($_GET['id']);
                   break;
               case "update":
                   $this->Model->updateDataFromDb($_GET['id']);
                   break;
               default:
                   unset($_GET['controllerFunctionId']);
           }
       }
    }

    public function runModel(){
        $this->Model= new Model($this->queryAll);
    }


}
$odpalamy= new Controller();

include_once "template/footer.php";
?>