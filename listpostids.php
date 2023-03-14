<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Post List</title>
    <?php
    require_once "utils.php";
    if(isLoggedOn()==false){
        header("Location: index.php");
    }
    ?>
</head>
<body>
    Your posts have the IDs of: <?php
    require_once "utils.php";
    getUserID();
    //echo $_SESSION['ID'];
    $connection = new mysqli($host,$user,$pass,$dbname);
    $raw_results = mysqli_query($connection, "SELECT * from posts WHERE PosterID=".$_SESSION['ID']) or die(mysqli_error());
    while($results = mysqli_fetch_array($raw_results)){
    echo $results['PostID'].". ";
    }
    ?>
    <br><a href='index.php'>Go back to the main page</a>
</body>
</html>