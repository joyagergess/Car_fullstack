<?php
include("../connection/connection.php");


$id = 1;
$name = "Toyota";
$color = "Red";
$year = 2023;
$price = 25000;

$sql = "INSERT INTO cars (id, name, color, year, price) VALUES (?, ?, ?, ?, ?)";
$query = $connection->prepare($sql);

if($query->execute([$id, $name, $color, $year, $price])){
    echo "Data inserted successfully!";
} else {
    echo "Failed to insert data.";
}
?>
