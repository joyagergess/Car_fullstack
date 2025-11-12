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
}
