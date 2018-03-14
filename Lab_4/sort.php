<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 Excercise 1</title>
	<style type="text/css">
		table {
			border: 1px solid black;
		}

		td {
			text-align: center;
		}

		#name {
			width: 300px;
		}

		#time {
			width: 200px;
		}

		#size {
			width: 200px;
		}
	</style>
</head>
<body>
	<a href="Lab-4-Ex2.php"><button type="button">Return</button></a><br><br>
	<?php
		$file_size = array();
		$file_time = array();
		$directory = 'upload/';
		$filelist = scandir($directory);

		$list0 = array_diff(scandir($directory), array('..', '.'));
		echo '<table><tr><td id="name">Name</td><td id="time">Uploaded Time</td><td id="size">Size (bytes)</td></tr>';
		foreach ($list0 as $key => $value) {
			$path = $directory . $value;
			$file_size[$value] = filesize($path);
			$file_time[$value] = date("Y-m-d H:i:s", filemtime($path));
		}
		// echo "<table><tr><td id=\"name\">Name</td><td id=\"time\">Uploaded Time</td><td id=\"size\">Size (bytes)</td></tr>";
		switch ($_POST['sort']) {
			case "Sort by name":
				{
					asort($list0);
					foreach ($list0 as $key => $value) {
						echo "<tr><td>" . $value . "</td><td>" . $file_time[$value] . "</td><td>" . $file_size[$value] . "</td></tr>";
					}
				}
				break;

			case "Sort by date":
				{
					arsort($file_time);
					foreach ($file_time as $key => $value) {
						echo "<tr><td>" . $key . "</td><td>" . $value . "</td><td>" . $file_size[$key] . "</td></tr>";
					}
				}
				break;
		}
			// echo "</table>";
	?>
</body>
</html>
