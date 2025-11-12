<?php
require_once(__DIR__ . "/../models/Car.php");
require_once(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/../services/CarService.php");

class CarController {
   
    function getCarByID(){
        global $connection;
     try{
          if(isset($_GET["id"])){
              $id = $_GET["id"];
          }else{
              echo ResponseService::response(500, "ID is missing");
              return;
          }
          
          $car = CarService::findCarByID($id);
          echo ResponseService::response(200, $car);
          return;
  
          }catch (Exception $e) {
              echo ResponseService::response(500, "Server Error: " . $e->getMessage());
        }
    }



    function getCars(){
        global $connection;
     try{
        $car=CarService::findAllCars();
        echo ResponseService::response(200,$car);
        return;

     }catch (Exception $e) {
        echo ResponseService::response(500, "Server Error: " . $e->getMessage());
    }

   }
}

function createCars(){
    global $connection;

     $data = [
            'name' => $_POST['name'],
            'year' => $_POST['year'],
            'color' => $_POST['color']
        ];

    $car=CarService::createCars();

    if ($car){
        echo ResponseService::response(200,$car);
    }
    else{
     echo ResponseService::response(500, "Failed to create car");
    } 

   }
?>