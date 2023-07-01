<?php 
function checkMEthod($method){
if($_SERVER['REQUEST_METHOD']==$method){
    return true ;
}return false ;
}


function checkInput($input){
    if(isset($_POST[$input])){
        return true ;
    }return false ;
}



function santzieInput($input){
    return trim(htmlentities(htmlspecialchars(stripslashes($input))));
}


function redirect($path){

    header("location:$path");
}

