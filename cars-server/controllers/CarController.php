<?php
require_once(__DIR__ . "/../models/Car.php");
require_once(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/../services/CarService.php");

class CarController {
   
    function getCarByID(){
        global $connection;

        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }else{
            echo ResponseService::response(500, "ID is missing");
            return;
        }
       
        
        $car = CarService::findCarByID($id);
        echo ResponseService::response(200, $car);
        return;
    }

    function getCars(){
        global $connection;

        $car=CarService::findAllCars();
        echo ResponseService::response(200,$car);
        return;
    }

    //try catch 
}

?>