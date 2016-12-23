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
    $allWords = str_word_count($uText, 1);
    $wordsToDelete = [];
    foreach ($allWords as $word){
        if(strlen($word) >= $length){
            $wordsToDelete[] = $word;
        }
    }
    $result = str_replace($wordsToDelete, "", $uText);
    $result = preg_filter("/[ ]{2,}/", " ", $result);
    return $result;
}
