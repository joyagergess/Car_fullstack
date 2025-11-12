<?php
include("Car.php");
include("../connection/connection.php");

$carData = [
    'name' => 'Toyota',
    'year' => 2023,
    'color' => 'Red'
];

$car = new Car($carData);
if($car->create('cars', $carData, $connection)) {
    echo "Car created successfully!";
} else {
    echo "Failed to create car.";
}
?>
