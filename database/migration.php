<?php 
$dsn= "localhost";
$user = "root";
$password = "";
$dbn="todoapp";
$conn = mysqli_connect($dsn,$user,$password);
if(!$conn){
    echo mysqli_connect_error($conn);
    }


    $sql = "CREATE DATABASE IF NOT EXISTS $dbn";
    $result = mysqli_query($conn ,$sql);
mysqli_close($conn);


$conn = mysqli_connect($dsn,$user,$password,$dbn);
if(!$conn){
    echo mysqli_connect_error($conn);
    }
    $sql = "CREATE TABLE IF NOT EXISTS `tasks`(
        id INT PRIMARY KEY AUTO_INCREMENT ,
        `title` VARCHAR(200) NOT NULL
    )";
    $result = mysqli_query($conn ,$sql);
mysqli_close($conn);

