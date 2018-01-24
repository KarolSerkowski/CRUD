<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 11.01.2018
 * Time: 20:36
 */
ob_start();

class View
{
    public $header;
    private $body;
    public  $footer;

    public function __construct(){
    }

    public function displayFormAddData(){
        $body= file_get_contents('add.php');
        $this->viewPage($body);
    }

    public function displayAllDataFromDb($results){
        echo'
            <div class="col">
                <H4>Dodaj nowe urządzenie:</H4>
                <a href="Controller.php?id=0&controllerFunctionId=add"><button type="button" class="btn btn-primary">Dodaj urządzenie</button></a>
                </br></br>
                <H5> Wszystkie urządzenia:</H5>
                 <table class="table table-hover">
                 <thead>
                     <tr>
                        <th>Producent</th>
                        <th>Model</th>
                        <th>Numer Seryjny</th>
                        <th>Typ naprawy</th>
                        <th>Edytuj</th>
                        <th>Usuń</th>
                    </tr>
                </thead>';
        foreach ($results->fetchAll() as $value) {
            echo '<tbody>
                   <tr>';
            echo' <input type="hidden" name="idEdit" value="'.$value['id'].'"/>';
            echo '<td>' . $value['manufacturer'] . '</td>';
            echo '<td>' . $value['model'] . '</td>';
            echo '<td>' . $value['serial_number'] . '</td>';
            switch($value['id_typ']){
                case 1:
                    echo '<td>Pogw-na</td>';
                    break;
                case 2:
                    echo '<td>Gw-na</td>';
                    break;
            }
            echo '<td><a href="Controller.php?id=' . $value['id'] . '&controllerFunctionId=edit"><button type="button" class="btn btn-warning">Edytuj</button></a> </td>';
            echo '<td><a href="Controller.php?id=' . $value['id'] . '&controllerFunctionId=delete"><button type="button" class="btn btn-danger">Usuń</button></a> </td>';
            echo '</tr>';
            echo '</tbody>';
        }
        echo '</table>';
        echo '</div>';
    }

    public function displayDataFromDbById($result){
        echo'        
                    <div class="col">
                    <table class="table table-hover">
                    <thead>
                    <H4>Edytujesz urządzenie:</H4>
                    <tr>
                        <th>Producent</th>
                        <th>Model</th>
                        <th>Numer Seryjny</th>                       
                        <th>Typ naprawy</th>                       
                    </tr>
                    </thead>';
        foreach ($result->fetchAll() as $value) {
            echo '<tbody>
                  <tr>';
            echo '<tr>';
            echo '<td>' . $value['manufacturer'] . '</td>';
            echo '<td>' . $value['model'] . '</td>';
            echo '<td>' . $value['serial_number'] . '</td>';
            switch($value['id_typ']){
                case 1:
                    echo '<td>Pogwarancyjna</td>';
                    break;
                case 2:
                    echo '<td>Gwarancyjna</td>';
                    break;
            }
            echo '</tr>';
            echo '</tbody>';
        }
        echo '</table>';
        return $value;
    }

    public function dispalyDataFromDbToEdit($value){
            echo '                            
                    <article id="device">    
                        <form action="Controller.php" method="GET">
                            <span>
                                <H4>Wprowadź zmiany:</H4>
                                <input type="hidden" name="id" value="' . $value['id'] .'" />
                                 <input type="hidden" name="controllerFunctionId" value="update" />
                                <input type="hidden" name="idEdit" value="'. $value['id'] .'" />
                                <label class="title-form">Producent urządzenia:</label><br />
                                <input type="text" value="'. $value['manufacturer'] .'" name="manufacturerEdit"><br />
                                <label class="title-form">Model urządzenia:</label><br />
                                <input type="text" value="'. $value['model'] .'" name="modelEdit"><br />
                                <label class="title-form">Numer seryjny urządzenia:</label><br />
                                <input type="text" value="'. $value['serial_number'] .'"  name="serial_numberEdit"><br /> 
                                <p>Wybierz rodzaj naprawy:</p>';
        switch($value['id_typ']){
            case 1:
                echo '          <select name="id_typEdit" id="actionType">
                                        <option selected="selected" value="1">Pogwarancyjna</option>
                                        <option value="2">Gwarancyjna</option>
                                </select>';
                break;
            case 2:
                echo '           <select name="id_typEdit" id="actionType">
                                        <option  value="1">Pogwarancyjna</option>
                                        <option selected="selected" value="2">Gwarancyjna</option>
                                </select>';
                break;
        }

            echo '
                                                     
                            </span>
                            </br></br>        
                            <button type="submit" class="btn btn-success">Edytuj urządzenie</button>
                        </form>
                    </article>
                 </div>
            ';
    }


    public function viewPage($body){
        $this->body=$body;
        echo $this->body;
    }

}
