<?php
//get data
$name = $_POST['name'];
$name = $_POST['price'];
$name = $_POST['quantity'];
$name = $_POST['calorie'];

//connect to db
$conn = new mysqli('localhost', 'root', '', 'myrestaurant');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO form(name,price,quantity,calorie)
        values(?, ?, ?, ?) ");
    $stmt->bind_param("ssss", $name, $price, $quantity, $calorie);
    $stmt->execute();
    echo "Successful...";
    $stmt->close();
    $conn->close();
}




?>