<?php

define('DS',DIRECTORY_SEPARATOR);
$result = "";


if(isset($_GET['uDir']) && isset($_GET['uWord'])){
    $result = makeItLookGood(findFilesWithWord(getFilesFromDir($_GET['uDir']), $_GET['uDir'], $_GET['uWord']));
}

function getFilesFromDir($uDir){
    $arrFiles = [];
    if(is_dir($uDir)){
       $arrFiles = scanDirs($uDir);
    } else {
        $arrFiles[] = "No such folder!";
    }
    return $arrFiles;
}

function scanDirs($uDir, $subDir = "") {
    $arrFiles = scandir($uDir);
    $arrSubFiles = [];
    foreach ($arrFiles as $key => &$file){
        if(is_file($uDir . DS . $file)) {
            $file = DS . $subDir . DS . $file;
        } else {
            if(is_dir($uDir . DS . $file) && $file != "." && $file != ".."){
                $arrSubFiles = scanDirs($uDir . DS . $file, $file);
            }
            unset($arrFiles[$key]);
        }
    }
    unset($file);
    $arrFiles += $arrSubFiles;
    return $arrFiles;
}


function findFilesWithWord(array $arrFiles, $uDir, $uWord){
    $resFiles = [];
    foreach ($arrFiles as $file){
        $textFromFile = file_get_contents($uDir . $file);
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