<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 11.01.2018
 * Time: 21:02
 */

require_once "ConnectDb.php";
require_once "Read.php";
require_once "Create.php";
require_once "Delete.php";
require_once "Update.php";
require_once "View.php";


class Model {
    public $connectionDb;
    public $readDataFromDatabase;
    public $editDataPdo;
    public $deleteFromDb;
    public $results;
    public $query;

    public function __construct($query)
    {
        $this->connectionDb= ConnectDb::connect();
        $this->query= $query;
        $this->readAllDataFromDb();
    }

    public function readAllDataFromDb(){
        $this->readDataFromDatabase= new Read($this->connectionDb, $this->query); //nowu obiek Read z przesłaniem pdo i zapytania
        $this->results=$this->readDataFromDatabase->getDataFromDB();//w resultaty przypisane cala tabela
        $view= new View();
        $body=$view->displayAllDataFromDb($this->results);
        $view->viewPage($body);
    }

    public function deleteDataFromDb($idDelete){
        $this->deleteFromDb= new Delete($idDelete);//id przesłane z widoku przekazane w parametrze do delete
    }

    public function displayFormToAddData(){
        $view= new View();
        $view->displayFormAddData();
    }

    public function addDataToDb(){
        $this->addData= new Create();
    }

    public function displayEditDataFromDb($idEdit){
        $this->editDataPdo= Read::getDataById($idEdit);//pobiera pdo z zapytaniem "select where id"
        $viewEdit= new View();
        $valueEdit=$viewEdit->displayDataFromDbById($this->editDataPdo);// pobiera tabele wyników z id i ją zwraca jako  tablice value
        $body=$viewEdit->dispalyDataFromDbToEdit($valueEdit); //przekazuje tablice value i wyswietla pola edycyjne
        $viewEdit->viewPage($body);
    }

    public function updateDataFromDb($idUpdate){
        $this->updateFromDb= new Update();
        $this->updateFromDb->updateDataDb($idUpdate);
    }
}
?>