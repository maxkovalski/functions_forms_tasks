<?php

const COMMENTS = "comments.txt";

/**
 * @param string $username
 * @param string $comment
 */
function addComment($username, $comment){
    $comment = trim($comment);
    if(empty($comment)){
        addError("Нельзя добавлять пустой комментарий!");
    }
    if($username == ""){
        $username = "НЛО";
    }
    $data = [$username, $comment];
    $fi = fopen(COMMENTS, "a+");
    if (fi === false){
        addError("Не смог открыть файл");
    }
    $serialized = serialize($data) . PHP_EOL;
    fwrite($fi, $serialized);
    fclose($fi);
}

/**
 * @return string
 */
function showComments(){
    $fi = fopen(COMMENTS, "r");
    $str = '';
    if ($fi === false){
        addError("Не смог открыть файл");
    }
    $i = 0;
    while($line = fgets($fi)){
        $data = unserialize($line);
        list($userName, $userComment) = $data;
        $userComment = filterComments($userComment);
        $userComment = deleteTags($userComment);
        $str ="<div class=uComment>
                    <h3><mark>$userName</mark><a class='close' href='./engine.php?delete=$i'>X</a></h3>
                    <p>$userComment</p>
                </div>" . $str;
        $i++;
    }
    return $str;
}

/**
 * @param string $comment
 * @return string
 */
function filterComments($comment){
    $badWords = [
      'черт', 'черта', 'черту', 'чертом',
        'дрянь', 'дряни', 'дрянью',
        'блядь', 'бляди', 'блядью',
        'хуй', 'хуя', 'хую', 'хуюшки',
        'нихуя', 'нихера',
        'хер', 'хера', 'херу', 'хери',
        'хуйня', 'херня', 'ебать', 'уебище', 'еб', 'бля',
    ];
    foreach ($badWords as $badWord){
        if(mb_stripos($comment, $badWord) !== false){
            $comment = "<b>*Некорректный комментарий*</b>";
            break;
        }
    }
    return $comment;
}

/**
 * @param string $comment
 * @return string
 */
function deleteTags($comment){
    $comment = strip_tags($comment, "<b>");
    return $comment;
}

/**
 * @param integer $index
 */
function deleteComment($index){
    $contentArray = file(COMMENTS, FILE_IGNORE_NEW_LINES);
    unset($contentArray[$index]);
    $contentString = implode(PHP_EOL, $contentArray);
    file_put_contents(COMMENTS, $contentString);
}

/**
 * @param string $message
 */
function addError($message){
    echo $message;
    exit();
}