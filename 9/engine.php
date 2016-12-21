<?php

function reverseString($uText){
    $uText = str_split($uText);
    $uText = array_reverse($uText);
    return implode("", $uText);
}

$result = "Result";
if(isset($_POST['uText'])){
    $result = reverseString($_POST['uText']);
}