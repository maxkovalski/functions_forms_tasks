<?php
require "functions.php";

$result= "";

if(isset($_POST['uNumb']) && !empty($_FILES)){
    if((($uText = loadText()) !== false) && ($uNumber = checkNumber($_POST['uNumb']))){
       $result = deleteWords($uNumber, $uText);

    } else {
       $result = "Please, check the input data";
    }
}


