<?php
require "functions.php";

if(!empty($_FILES)) {
    saveImage();
    header("Location: /");
}
if(isset($_GET['delImage'])){
    deleteImage($_GET['delImage']);
    header("Location:/");
}
