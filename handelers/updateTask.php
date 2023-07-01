<?php
session_start();
require_once '../core/function.php';

$conn = mysqli_connect("localhost","root","","todoapp");
if(!$conn){
    echo mysqli_connect_error($conn);
    }

$errors= [];
if(checkMEthod("POST") && checkInput('update')){
  $id=$_GET['id'];
    $title=santzieInput($_POST['update']);
    echo $title ;    echo $id ;

    if(empty($title)){
        $errors[] = "update is required";
    }
    elseif(strlen($title)<3 || strlen($title)>25){
        $errors[]="the update must be between 3 and 25 chars";
            }


if(empty($errors)){
$sql= "UPDATE `tasks`SET `title` ='$title' where `id` = '$id'";
$result = mysqli_query($conn , $sql);
if(mysqli_affected_rows($conn)){
    $_SESSION['success']= "Task updated successfully";
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





















































// require_once "../core/function.php";
// session_start();
// if (isset($_GET['id'])){
//     $conn = mysqli_connect("localhost","root","","todoapp");
//     if(!$conn){
//       echo mysqli_connect_error($conn);
//     }
//     $id = $_GET['id'];
//     $sql = "SELECT `title` FROM `tasks` WHERE `id` = '$id'";
//     $result = mysqli_query($conn , $sql);
//     $row =mysqli_fetch_array($result);
//     $titleDb= $row['title'];
//     echo $titleDb ;

    
//     echo $id ;
//     // $sql = "SELECT * FROM `tasks` WHERE `id` = '$id' ";
//     // $result = mysqli_query($conn , $sql);
//     // $row =mysqli_fetch_row($result);
//     // $errors = [];
//     // if (!$row){
//     //     $_SESSION['errors']="Data not exists";
//     // }else{
//     //      $sql = "UPDATE `tasks` SET `title`='$title' where `id` = '$id' ";
//     // $result = mysqli_query($conn , $sql);
//     // }
//     if(mysqli_affected_rows($conn)==1){
//     $_SESSION['success']= "data updated successfully";
//     die;
// }elseif(mysqli_affected_rows($conn)==0){
//     $_SESSION['errors']= "data not exists";

// }
// }
?>
