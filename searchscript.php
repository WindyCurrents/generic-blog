<?php
require_once "connect.php";
$connection = new mysqli($host,$user,$pass,$dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Generic Blog - Your post search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	$query = $_GET['query']; 
	if(strlen($query)){ 
		$query = htmlspecialchars($query); 
		$query = mysqli_real_escape_string($connection, $query);
		$raw_results = mysqli_query($connection, "SELECT posts.*,users.username FROM posts,users
			WHERE PostID = ".$query." AND users.ID = posts.PosterID") or die(mysqli_error());
		if(mysqli_num_rows($raw_results) > 0){ 
			while($results = mysqli_fetch_array($raw_results)){
				echo " "."</h3><h3>".$results['PostTitle']."</h3>Posted by:".$results['username']."<br>".$results['PostContents']."</p>";
			}
			
		}
		else{
			echo "No results";
		}
	}
?>
<br><a href='index.php'>Go back to the main page</a>
</body>
</html>
