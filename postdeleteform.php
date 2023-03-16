<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog Beta - Delete a post</title>
	<?php
    require_once "utils.php";
    if(isLoggedOn()==false){
        header("Location: index.php");
    }
    ?>
</head>
<body>
    <div id="container">
	<form action="postdeletescript.php" method="POST">
        <h1>Select a post ID you want to delete:</h1>
		<input type="number" name="query" />
		<input type="submit" value="Delete" />
	</form>
</div>
</body>
</html>