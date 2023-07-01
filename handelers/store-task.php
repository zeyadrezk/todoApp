<?php
session_start();
require_once '../core/function.php';

$conn = mysqli_connect("localhost","root","","todoapp");
if(!$conn){
    echo mysqli_connect_error($conn);
    }



$errors= [];
if(checkMEthod("POST") && checkInput('title')){

    $title=santzieInput($_POST['title']);
    if(empty($title)){
        $errors[] = "Task is required";
    }
    elseif(strlen($title)<3 || strlen($title)>25){
        $errors[]="the task must be between 3 and 25 chars";
            }


if(empty($errors)){
$sql= "INSERT INTO `tasks`(`title`)VALUES ('$title')";
$result = mysqli_query($conn , $sql);
if(mysqli_affected_rows($conn)){
    $_SESSION['success']= "Task added successfully";
    redirect("../index.php");
    die;
}else{
    echo mysqli_error($conn);
}
}else {
    $_SESSION['errors']=$errors ;
    redirect("../index.php");
    die;
}



}

