<?php

define('DS',DIRECTORY_SEPARATOR);
$result = "";


if(isset($_GET['uDir']) && isset($_GET['uWord'])){
    $result = makeItLookGood(findFilesWithWord(getFilesFromDir($_GET['uDir']), $_GET['uDir'], $_GET['uWord']));
}

function getFilesFromDir($uDir){
    $arrFiles = [];
    if(is_dir($uDir)){
       $arrFiles = scandir($uDir);
       $arrFiles = array_filter($arrFiles, function($file) use ($uDir){
          return is_file($uDir . DS . $file);
        });
    } else {
        $arrFiles[] = "No such folder!";
    }
    return $arrFiles;
}

function findFilesWithWord(array $arrFiles, $uDir, $uWord){
    $resFiles = [];
    foreach ($arrFiles as $file){
        $textFromFile = file_get_contents($uDir . DS . $file);
        if($textFromFile && mb_stristr($textFromFile, $uWord)) {
            $resFiles[] = $file;
        }
    }
    return $resFiles;
}

function makeItLookGood(array $arr){
    $res = "";
    if(!empty($arr)){
        foreach ($arr as $item) {
            $res .= $item . PHP_EOL;
        }
    } else{
        $res = "No such files...";
    }
    return $res;

}