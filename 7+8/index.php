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
    <h1>Testing functions</h1>
</header>
<main>
    <div class="contentBlock leftBlock">
        <form  method="post" action="engine.php">
            <h2>Comment form</h2>
            <br/>
            <label for="uName">Your name: </label>
            <input type="text"
                   name="uName"
                   id="uName"
                   class="uNameInput"
                   placeholder="Type your name..."></input>
            <br/>
            <br/>
            <label for="uComment">Your comment: </label>
            <br/>
            <textarea name="uComment"
                      id="uComment"
                      class="uCommentInput"
                      rows="10"
                      placeholder="Type your comment..."></textarea>
            <input type="submit" value="Add comment">
        </form>
    </div>
    <div class="contentBlock rightBlock">
        <?= showComments() ?>
    </div>
</main>
<footer>
    22.12.2016
</footer>
</body>
</html>
