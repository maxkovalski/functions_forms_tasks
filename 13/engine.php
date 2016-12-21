<?php

function countWords($str)
{
    $words = array_unique(preg_split("/[\.\?! ]+/", $str, null, PREG_SPLIT_NO_EMPTY));
    $numbs = [];
    foreach ($words as $key => $word){
        $numbs[] = mb_substr_count($str, $word);
    }
    $res = array_combine($words, $numbs);
    arsort($res);
    return $res;
}

function showResult(array $arr){
    $res = "";
    foreach ($arr as $key => $item){
        $res .= $key . " - " . $item . "\n";
    }
    return $res;
}

$result = "";
if(isset($_POST['uText'])){
    $result = showResult(countWords($_POST['uText']));
}