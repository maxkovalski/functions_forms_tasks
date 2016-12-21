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
        <textarea name="uText" rows="10" placeholder="Type your text..."></textarea>
        <input type="submit" value="Count unique words">
        <textarea class="result" rows="3" disabled><?= $result; ?></textarea>
    </form>
</main>
<footer>
    21.12.2016
</footer>
</body>
</html>
