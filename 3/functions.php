<?php
define("DS", DIRECTORY_SEPARATOR);

function saveImage(){
    if(!is_dir("gallery")){
        mkdir("gallery");
    }
    $mime = mime_content_type($_FILES['img']['tmp_name']);
    if(preg_match("/image\/*/", $mime)){
        $destination = __DIR__ . DS . "gallery" . DS . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $destination);
    } else {
        echo "Неверный тип файла!";
    }
}

function getGallery(){
    $html = "";
    if(is_dir('gallery')){
        $gallery = scandir('gallery');
        foreach ($gallery as $image){
            $pic = "gallery/$image";
            if(is_file($pic)){
                $html .=<<<GALLERY
<div class='uImage'><a href='gallery/$image'><img src='gallery/$image'/></a><a class='close' href="engine.php?delImage=$image">X</a></div>
GALLERY;
            }
        }
    }
    return $html;
}

function deleteImage($img){
    $img = "gallery" . DS . urldecode($img);
    unlink($img);
}