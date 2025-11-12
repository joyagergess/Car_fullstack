<?php

class CarService {
    static function findCarByID($id){
        global $connection;
        $car = Car::find($connection, $id);
        return $car ? $car->toArray() : [];
    }
}

//write business logic related to cars!!!
//BIAdmin.php