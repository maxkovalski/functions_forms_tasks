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
    <form method="post">
        <textarea name="fText" rows="10" placeholder="Type first text..."></textarea>
        <textarea name="sText"rows="10" placeholder="Type first text..."></textarea>
        <input type="submit" value="Find common words">
        <textarea class="result" rows="3" disabled><?= $result; ?></textarea>
    </form>
</main>
<footer>
    15.12.2016
</footer>
</body>
</html>
