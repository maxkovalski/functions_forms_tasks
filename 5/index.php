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
    <div class="left contentBlock">
             <form method="get">
                <label for="uDir">Enter the path to the directory: </label>
                <input type="text" id="uDir" name="uDir">
               <label for="uWord">Enter the word to find: </label>
                <input type="text" id="uWord" name="uWord">
                <input type="submit" value="See the result">
            </form>
    </div>
    <div class="right contentBlock">
            <textarea class="result" rows="10" disabled><?= $result; ?></textarea>
    </div>
</main>
<footer>
    27.02.2017
</footer>
</body>
</html>
