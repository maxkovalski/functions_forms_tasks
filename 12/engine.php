<?php

function reverseText($str)
{
    $str = preg_split("/([\.\?!]+[ ]*)/", $str, null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    $res = [];
    for($index = count($str) - 2; $index >= 0; $index -= 2){
        $res[] = trim($str[$index] . $str[$index + 1]);
    }
    return implode(" ", $res);
}


$result = "";
if(isset($_POST['uText'])){
    $result = reverseText($_POST['uText']);
}