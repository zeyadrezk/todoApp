<?php
require_once "../core/function.php";
session_start();
if (isset($_GET['id'])){
    $conn = mysqli_connect("localhost","root","","todoapp");
    if(!$conn){
      echo mysqli_connect_error($conn);
    }
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tasks` WHERE `id` = '$id' ";
    $result = mysqli_query($conn , $sql);
    $row =mysqli_fetch_row($result);
    $erros = [];
    if (!$row){
        $errors="Data not exists";
            redirect("../index.php");
    die;

    }else{
            $sql = "DELETE FROM `tasks` WHERE `id` = '$id' ";
    $result = mysqli_query($conn , $sql);

    }

    

    if(mysqli_affected_rows($conn)){
    $_SESSION['success']= "data deleted successfully";
    redirect("../index.php");
    die;
}elseif(mysqli_affected_rows($conn)==0){
    $_SESSION['errors']= "Data not exists";
    redirect("../index.php");
    die;
}
}