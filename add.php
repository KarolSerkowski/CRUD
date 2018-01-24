<?php
?>
        <div class="col">
              <form action="Controller.php" method="GET">
                    <H4>Dodaj sprzęt:</H4>
                    <span>
                    <input type="hidden" name="controllerFunctionId" value="create" />
                    <input type="hidden" name="id" value="0" />
                    <label class="title-form">Producent urządzenia:</label><br />
                    <input type="text" name="manufacturer"><br />
                    <label class="title-form">Model urządzenia:</label><br />
                    <input type="text" name="model"><br />
                    <label class="title-form">Numer seryjny urządzenia:</label><br />
                    <input type="text" name="serial_number"><br />
                    <p>Wybierz rodzaj naprawy:</p>
                    <select name="id_typ" id="actionType">
                            <option selected="selected" value="1">Pogwarancyjna</option>
                            <option value="2">Gwarancyjna</option>
                    </select>
                    </span>
              </br></br>
                    <input class="btn btn-success" type="submit" value="Dodaj urządzenie" />
              </form>               
        </div>
