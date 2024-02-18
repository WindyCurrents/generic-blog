<?php
    require_once 'utils.php';
    if(isset($_SESSION['LastPostID'])==false){
        $_SESSION['LastPostID']=0;
    }
    if(isset($_SESSION['LastDeletedPost'])==false){
        $_SESSION['LastDeletedPost']=0;
    }
    if(isset($_SESSION['LastEditedPost'])==false){
        $_SESSION['LastEditedPost']=0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Main Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to Generic Blog!</h1>
    <?php
    if($_SESSION['LastPostID']!=0){
        echo "You have recently posted. Glad to have you aboard, post of the ID ".$_SESSION['LastPostID'].".<br>";
    }
    if($_SESSION['LastDeletedPost']!=0){
        echo "You have recently deleted a post. Goodbye, post of the ID ".$_SESSION['LastDeletedPost']."!<br>";
    }
    if($_SESSION['LastEditedPost']!=0){
        echo "You have recently edited a post. Welcome anew, post of the ID ".$_SESSION['LastEditedPost']."!<br>";
    }
    if(isLoggedOn())
    {
    echo '<a href="logout.php">Log out of '.getUserName().'</a><br><a href="postaddform.php">Post something!</a><br><a href="posteditform.php">Edit something!</a><br><a href="listpostids.php">See the IDs of all your posts</a><br><a href="postdeleteform.php">Delete a post</a><br>';
    }
    else
    {
    echo '<a href="login.php">Login</a><br><a href="register.php">Register</a><br>';
    }
    ?>
    <a href="searchform.php">Search for a post</a><br>
    <a href="documentation-english.html">Project documentation</a><br>
</body>
</html>
