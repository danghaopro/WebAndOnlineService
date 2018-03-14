<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 Excercise 1</title>
	<style type="text/css">
	table
	{
		border: 1px solid black;

	}
	td
	{
		text-align: center;
	}
	#name
	{
		width: 300px;
	}
	#time
	{
		width: 200px;
	}
	#size
	{
		width: 200px;
	}
</style>
</head>
<body>
	<form method=post action="sort.php">
		<input type="submit" name="sort" value="Sort by name">
		<input type="submit" name="sort" value="Sort by date">
	</form>
	<br>

	<?php
	$directory = 'upload/';
	$filelist = scandir($directory);
	if (!isset($_POST['submit'])) {
		$list0 = array_diff(scandir('upload/'), array('..', '.'));
		echo "<table><tr><td id=\"name\">Name</td><td id=\"time\">Uploaded Time</td><td id=\"size\">Size (bytes)</td></tr>";
		foreach ($list0 as $key => $value) {
			$path = 'upload/'.$value;
			echo "<tr><td>".$value."</td><td>".date("Y-m-d H:i:s", filemtime($path))."</td><td>".filesize($path)."</td></tr>";
		}
		echo "</table>";
	}
	?>
	
</body>
</html>