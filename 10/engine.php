<?php

function countUniqueWords($uText){
    $uText = mb_strtolower($uText);
    $uText = preg_split("/[ \.\?,:-]+/", $uText, null, PREG_SPLIT_NO_EMPTY);
    $uText = array_unique($uText);
    return count($uText);
}

$result = "Result";
if(isset($_POST['uText'])){
    $result = "This text has " . countUniqueWords($_POST['uText']) . " unique words.";
}