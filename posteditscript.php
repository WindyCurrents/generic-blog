<?php
require_once "utils.php";
getUserID();
$connection = new mysqli($host, $user, $pass, $dbname);
$postid = $_POST['id'];
$posttitle = $_POST['title'];
$postcontents = $_POST['contents'];
$posterid = $_SESSION['ID'];

$sql = "UPDATE `posts` SET `PostTitle`=?, `PostContents`=? WHERE `PosterID`=? AND `PostID`=?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ssii", $posttitle, $postcontents, $posterid, $postid);
$stmt->execute();

$_SESSION['LastEditedPost'] = $postid;

header('Location: index.php');
exit;
?>