<?php
    require_once 'loginutils.php';
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
    <h1>You landed in the beta of a Generic Blog. Leave me alone.</h1>
    <?php
                    if(isLoggedOn())
                    {
                        echo '<a href="logout.php">Log out of ('.getUserName().')</a>';
                    }
                    else
                    {
                        echo '<a href="loginpage.php">Admin Panel Login</a> <a href="registration.php">Register (Not quite working yet)</a>';
                    }
                ?>
    <a href="genericblogbetadocumentationpl.html">Project documentation (Polish)</a>
    <a href="genericblogbetadocumentationen.html">Project documentation (English)</a><br>
    © Konrad Płotka of class 2PE of Technikum TEB Edukacja in Koszalin 2022.
</body>
</html>
