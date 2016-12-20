<?php

// for Latin alphabet
function getCommonLWords($a, $b){
    $a = str_word_count($a, 1);
    $b = str_word_count($b, 1);
    return implode(', ', array_intersect($a, $b));
}

function getCommonWords($fText, $sText){
    $fText = mb_strtolower($fText);
    $sText = mb_strtolower($sText);
    $fText = preg_split("/[\h:,\.\?!-;]+/",$fText, null, PREG_SPLIT_NO_EMPTY);
    $sText = preg_split("/[\h:,\.\?!-;]+/", $sText, null, PREG_SPLIT_NO_EMPTY);
    return implode(', ', array_intersect($fText, $sText));
}

$result = "Result";
if(isset($_POST['fText']) && isset($_POST['sText'])){
    $result = getCommonWords($_POST['fText'], $_POST['sText']);
}