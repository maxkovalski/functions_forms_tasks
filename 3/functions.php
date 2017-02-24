<?php

function checkNumber($number){
    $number = +$number;
    return is_integer($number) && $number > 0 ? $number : false;
}

function loadText(){
    $mime = mime_content_type($_FILES['uText']['tmp_name']);
    if($mime == "text/plain"){
        $uText = file_get_contents($_FILES['uText']['tmp_name']);
        return $uText;
    }
    return false;
}

function deleteWords($length, $uText){
    $allWords = preg_split("/[\s\.\?!:();,]+/", $uText);
    $wFilter = function ($str) use ($length) { return strlen($str) >= $length ? true : false; };
    $wordsToDelete = array_filter($allWords, $wFilter);
    $result = str_replace($wordsToDelete, "", $uText);
    $result = preg_filter("/[ ]{2,}/", " ", $result);
    return $result;
}
