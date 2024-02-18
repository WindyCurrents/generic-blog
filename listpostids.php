<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Post List</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require_once "utils.php";
    if(isLoggedOn()==false){
        header("Location: index.php");
    }
    ?>
</head>
<body>
    <?php
    $connection = new mysqli($host, $user, $pass, $dbname);
    $query = "SELECT PostID FROM posts WHERE PosterID = " . $_SESSION['ID'];
    $result = $connection->query($query);
    if ($result) {
        $postIDs = [];
        while ($row = $result->fetch_assoc()) {
            $postIDs[] = $row['PostID'];
        }
        if (count($postIDs) > 0) {
            echo "Your posts have the IDs of: " . implode(", ", $postIDs) . ".";
        } else {
            echo "You have not made any posts yet.";
        }
    }
    $connection->close();
    ?>
<br>
<button onclick="window.location.href='index.php'">Go back to the main page</button>
</body>
</html>