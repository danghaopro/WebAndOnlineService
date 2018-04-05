<!DOCTYPE html>
<html>
<head>
	<title>Example 6.5</title>
	<meta charset="utf-8">
	<style type="text/css" media="screen">
		table, td, th, tr {
			border: 1px solid black;
			border-collapse: collapse;
		}
		td {
			padding: 5px;
		}
		.catid {
			width: 10%;
		}
		.title {
			width: 20%;
		}
		.description {
			width: 70%;
		}
	</style>
</head>
<body>
	<h1>Category Administration</h1>

	<?php  

		$host = 'localhost';
		$username = 'root';
		$password = '123456';
		$dbname = 'business_service';

		$conn = new mysqli($host, $username, $password, $dbname) or die("Connected error: " . $conn->connect_error);

		if(isset($_POST['AddCategory'])) {
			$cat_id = "";
			$title = "";
			$desc = "";
			if(isset($_POST['cat_id']))
				$cat_id = trim($_POST['cat_id']);
			if(isset($_POST['title']))
				$title = trim($_POST['title']);
			if(isset($_POST['description']))
				$desc = trim($_POST['description']);
			if($cat_id != "" && $title != "" && $desc != "") {
				$sql = "INSERT INTO categories(CategoryID, Title, Description)
						VALUES ('$cat_id', '$title', '$desc')";
				$conn->query($sql);
			}
		}

		$sql = "SELECT * FROM categories";
		$categories = $conn->query($sql);
		echo "
				<form  method=\"post\" accept-charset=\"utf-8\">
					<table>
					<tr>
						<th class='catid'>Cat ID</th>
						<th class= 'title'>Title</th>
						<th class='description'>Description</th>
					</tr>
				";
		if($categories->num_rows > 0) {
			while ($row = $categories->fetch_assoc()) {
				$CatID = $row['CategoryID'];
				$Title = $row['Title'];
				$Desc = $row['Description'];
				echo "
					<tr>
						<td class='catid'>$CatID</td>
						<td class= 'title'>$Title</td>
						<td class='description'>$Desc</td>
					</tr>
				";
			}
			echo "
				<tr>
					<td><input  style='width: 100%;' type=\"text\" name=\"cat_id\"></td>
					<td><input  style='width: 100%;' type=\"text\" name=\"title\"></td>
					<td><input  style='width: 100%;' type=\"text\" name=\"description\"></td>
				</tr></table>
				<input type=\"submit\" name=\"AddCategory\" value=\"Add Category\">
				</form>
			";
		} else {
			echo "
					<tr>
						<td>------------------</td>
						<td>------------------</td>
						<td>------------------</td>
					</tr></table>
					<input type=\"submit\" name=\"AddCategory\" value=\"Add Category\">
					</form>
				";
		}
		$conn->close();

	?>
</body>
</html>