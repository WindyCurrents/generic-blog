<?php
require_once "utils.php";
getUserID();
$connection = new mysqli($host,$user,$pass,$dbname);
$request = $_POST['query'];
$sql = "DELETE FROM `posts` WHERE PostID=".$request." AND PosterID=".$_SESSION['ID'];
$result = $connection->query($sql);
$_SESSION['LastDeletedPost']=$request;
header('Location: index.php');
?>