<?php

function makeStringCorrect($str)
{
    $phrases = preg_split("/([\.\?!]+[ ]*)/", trim($str), null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    $res = "";
    for($index = 0, $max = count($phrases)- 1; $index < $max; $index += 2){
        $phrases[$index] = mb_strtoupper(mb_substr($phrases[$index], 0, 1)) . mb_substr($phrases[$index], 1);
        $res .= trim($phrases[$index] . $phrases[$index + 1]) . " ";
    }
    return $res;
}


$result = "Result";
if(isset($_POST['uText'])){
    $result = makeStringCorrect($_POST['uText']);
}