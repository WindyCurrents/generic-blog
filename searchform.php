<!DOCTYPE html>
<html>
<head>
	<title>Generic Blog - Find a post</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="container">
	<form action="searchresults.php" method="GET">
        <h1>Generic Blog - Searching for a post</h1>
		<label>Input the ID of the post you're looking for: <input type="number" name="query" /></label><br>
		<input type="submit" value="Search" />
		<input type='button' value='Back' onclick="window.location.href='index.php'" />
	</form>
</div>
</body>
</html>