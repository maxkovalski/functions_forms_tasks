<?php

if(!empty($_POST)){
    addComment($_POST['uName'], $_POST['uComment']);
    header("Location: /");
}

if(isset($_GET['delete'])){
    deleteComment($_GET['delete']);
    header("Location: /");
}
