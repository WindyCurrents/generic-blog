<?php
require_once "utils.php";
$connection = new mysqli($host,$user,$pass,$dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Search Results</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
	$query = $_GET['query']; 
	if(strlen($query)){ 
		$query = htmlspecialchars($query); 
		$query = mysqli_real_escape_string($connection, $query);
		$sql = "SELECT posts.*, users.username FROM posts, users
				WHERE PostID = ".$query." AND users.ID = posts.PosterID";
		$raw_results = mysqli_query($connection, $sql) or die(mysqli_error());
		if(mysqli_num_rows($raw_results) > 0){ 
			while($results = mysqli_fetch_array($raw_results)){
				echo "<h3>".$results['PostTitle']."</h3>Posted by: ".$results['username']."<br>".$results['PostContents']."<br>";
			}
		}
		else{
			echo "No results";
		}
	}
?>
<br><button onclick="window.location.href='index.php'">Go back to the main page</button>
</body>
</html>