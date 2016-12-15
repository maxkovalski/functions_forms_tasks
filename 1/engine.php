<?php

function getCommonWords($a, $b){
    $a = str_word_count($a, 1);
    $b = str_word_count($b, 1);
    return implode(', ', array_intersect($a, $b));
}

$result = "Result";
if(isset($_POST['fText']) && isset($_POST['sText'])){
    $result = getCommonWords($_POST['fText'], $_POST['sText']);
}