<?php
require "engine.php";
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
    <h1>Testing functions</h1>
</header>
<main>
    <div class="contentBlock">

        <form method="post" enctype="multipart/form-data">
            <label for="uText">Choose the text to work with: </label>
            <input type="file" accept="text/plain" name="uText" id="uText">
            <br/>
            <label for="uNumb">Enter the length of the word:</label>
            <input type="text" id="uNumb" name="uNumb" placeholder="It must be a natural number...">
            <input type="submit" value="See the result">
        </form>
        <textarea class="result" rows="10" disabled><?= $result; ?></textarea>
    </div>
</main>
<footer>
    23.12.2016
</footer>
</body>
</html>
