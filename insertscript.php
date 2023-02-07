<?php
require_once "utils.php";
getUserID();
$connection = new mysqli($host,$user,$pass,$dbname);
$posttitle = $_POST['title'];
$postcontents = $_POST['contents'];
$posterid = $_SESSION['ID'];
$sql = "INSERT INTO `posts`(`PostTitle`, `PostContents`, `PosterID`) VALUES ('$posttitle','$postcontents','$posterid')";
$result = $connection->query($sql);
$sqlgetpostid = "SELECT PostID from posts ORDER BY PostID DESC LIMIT 1";
$raw_results = mysqli_query($connection, "SELECT PostID from posts ORDER BY PostID DESC LIMIT 1") or die(mysqli_error());
while($results = mysqli_fetch_array($raw_results)){
    $_SESSION['LastPostID'] = $results['PostID'];
}
header('Location: index.php');
?>
