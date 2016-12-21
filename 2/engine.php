<?php

function cmp($a, $b){
    $a = strlen($a);
    $b = strlen($b);
    if($a == $b){
        return 0;
    }
    return $a > $b ? -1 : 1;
}

function findLongestWords($uText, $count){
    $uText = mb_strtolower($uText);
    $uText = preg_split("/[\h:,\.\?!-;]+/",$uText, null, PREG_SPLIT_NO_EMPTY);
    $res = [];
    for($index = 0; $index < $count; $count++){
        $res[$index] = $uText[$index];
    }
    usort($res, "cmp");
    foreach ($uText as $word){
        if (strlen($word) <= strlen($res[$count-1])){
            continue;
        } else {
            $res[count - 1] = $word;
            usort($res, "cmp");
        }
    }
    return implode(', ', $res);

    // этот вариант покороче, но будет медленно работать с большими текстами
    // usort($uText, "cmp");
    // $uText = array_slice($uText, 0, $count);
    // return implode(', ', $uText);
}

$result = "Result";
if(isset($_POST['uText'])){
    $result = findLongestWords($_POST['uText'], 3);
}