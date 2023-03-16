<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Edit!</title>
    <?php
    require_once "utils.php";
    if(isLoggedOn()==false){
        header("Location: index.php");
    }
    ?>
</head>
<body>
    <div id="container">
        <form action="editscript.php" method="post">
            ID of the post you're editing:<input type="number" name="id"><br>
            Title:<input type="text" name="title"><br>
            Contents:<input type="text" name="contents"><br>
            <input type="submit" value="Time to edit"><br>
        </form>
    </div>
</body>
</html>