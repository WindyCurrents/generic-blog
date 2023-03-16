<?php
require_once "utils.php";
getUserID();
$connection = new mysqli($host,$user,$pass,$dbname);
$postid = $_POST['id'];
$posttitle = $_POST['title'];
$postcontents = $_POST['contents'];
$posterid = $_SESSION['ID'];
$sql = "UPDATE `posts` SET `PostTitle`='$posttitle',`PostContents`='$postcontents' WHERE PosterID=".$_SESSION['ID']." AND PostID=".$postid;
$result = $connection->query($sql);
$raw_results = mysqli_query($connection, "SELECT PostID from posts WHERE PostID=".$postid) or die(mysqli_error());
while($results = mysqli_fetch_array($raw_results)){
    $_SESSION['LastEditedPost'] = $results['PostID'];
}
header('Location: index.php');
?>
