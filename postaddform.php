<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Post!</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require_once "utils.php";
    if(isLoggedOn()==false){
        header("Location: index.php");
    }
    ?>
</head>
<body>
    <h1>Generic Blog - Adding a post</h1>
    <div id="container">
        <form action="postaddscript.php" method="post">
            <label>Title: <input type="text" name="title"></label><br>
            <label>Contents:<br><input type="text" name="contents"></label><br>
            <input type="submit" value="Post this"><br>
            <input type='button' value='Back' onclick="window.location.href='index.php'" />
        </form>
    </div>
</body>
</html>