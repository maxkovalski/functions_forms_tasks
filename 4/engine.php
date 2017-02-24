<?php

define('DS',DIRECTORY_SEPARATOR);
$result = "";


if(isset($_GET['uDir'])){
    $result = makeItLookGood(getFilesFromDir($_GET['uDir']));
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

function makeItLookGood(array $arr){
    $res = "";
    if(!empty($arr)){
        foreach ($arr as $item) {
            $res .= $item . PHP_EOL;
        }
    } else{
        $res = "No files in the folder...";
    }
    return $res;

}