<?php
require_once "utils.php";
getUserID();
$connection = new mysqli($host, $user, $pass, $dbname);
$request = $_POST['query'];
$sql = "DELETE FROM `posts` WHERE PostID = ? AND PosterID = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ii", $request, $_SESSION['ID']);
$stmt->execute();
$_SESSION['LastDeletedPost'] = $request;
header('Location: index.php');
?>