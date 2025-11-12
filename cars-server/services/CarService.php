<?php

class CarService {
    static function findCarByID($id){
        global $connection;
        $car = Car::find($connection, $id);
        return $car ? $car->toArray() : [];
    }

    static function findAllCars(){
        global $connection;

        $car= Car::findAll($connection);
        $carsArray = [];
        foreach($car as $item){
        $carsArray[] = $item-> toArray();
    }

    return $carsArray;
    }



    function CreateCars($data){
     global $connection;

     if (!$id) {
        echo ResponseService::response(400, "Car ID is required");
        return;
      }
        $car= new Car($data);
       if( $car->create($data,$connection)){
        return $car;
       }else{
        return null;
       }
    }


   public static function updateCar($data, $id, mysqli $connection) {
    global $connection;
    return Car::update($data, "id", $id, $connection);
    }
}
