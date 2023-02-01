<?php
require_once "utils.php";
getUserID();
$connection = new mysqli($host,$user,$pass,$dbname);
$posttitle = $_POST['title'];
$postcontents = $_POST['contents'];
$posterid = $_SESSION['ID'];
$sql = "INSERT INTO `posts`(`PostTitle`, `PostContents`, `PosterID`) VALUES ('$posttitle','$postcontents','$posterid')";
$result = $connection->query($sql);
header('Location: index.php');
?>
