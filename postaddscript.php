<?php
require_once "utils.php";
getUserID();
$connection = new mysqli($host, $user, $pass, $dbname);
$posttitle = $_POST['title'];
$postcontents = $_POST['contents'];
$posterid = $_SESSION['ID'];

$sql = "INSERT INTO `posts`(`PostTitle`, `PostContents`, `PosterID`) VALUES ('$posttitle', '$postcontents', '$posterid')";
$result = $connection->query($sql);

$sqlgetpostid = "SELECT PostID FROM posts ORDER BY PostID DESC LIMIT 1";
$raw_results = $connection->query($sqlgetpostid);
while ($results = $raw_results->fetch_assoc()) {
    $_SESSION['LastPostID'] = $results['PostID'];
}

header('Location: index.php');
exit;
?>