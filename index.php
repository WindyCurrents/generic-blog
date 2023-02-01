<?php
    require_once 'utils.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog Beta - Main Page</title>
</head>
<body>
    <h1>Welcome to Generic Blog Beta!</h1>
    <?php
                    if(isLoggedOn())
                    {
                        echo '<a href="logout.php">Log out of '.getUserName().'</a> <a href="insertform.php">Post something!</a>';
                    }
                    else
                    {
                        echo '<a href="login.php">Login</a> <a href="register.php">Register</a>';
                    }
                ?>
    <a href="searchform.php">Search for a post</a>
    <a href="genericblogbetadocumentationpl.html">Project documentation (Polish)</a>
    <a href="genericblogbetadocumentationen.html">Project documentation (English)</a>
</body>
</html>
