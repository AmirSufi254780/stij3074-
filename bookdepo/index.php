<?php
include_once("dbconnect.php");
//get data first
$title = $_POST['title'];
$author = $_POST['author']; 
$price = $_POST['price'];
$descriptions = $_POST['descriptions'];
$publisher = $_POST['publisher']; 
$isbn = $_POST['isbn'];


try {
    $sql = "INSERT INTO book(title, author, price, descriptions, publisher, isbn)
    VALUES ('$title', '$author', '$price','$descriptions', '$publisher', '$isbn')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Book successfully add')</script>";
    echo "<script> window.location.replace('index.html') </script>;";

  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    echo "<script> alert('Error, try again')</script>";
    echo "<script> window.location.replace('index.html') </script>;";
  }
  
  $conn = null;
?>