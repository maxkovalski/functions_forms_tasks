<?php
require "functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Functions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Gallery</h1>
</header>
<main>
    <div class="contentBlock leftBlock">
        <form  method="post" enctype="multipart/form-data" action="engine.php">
            <h2>Add Your photo:</h2>
            <input type="file" name="img" accept="image/*">
            <input type="submit" value="Save">
        </form>
    </div>
    <div class="contentBlock rightBlock">
        <?= getGallery() ?>
    </div>
</main>
<footer>
    22.12.2016
</footer>
</body>
</html>
