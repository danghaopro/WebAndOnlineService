<!DOCTYPE html>
<html>
<head>
	<title>Lab 6 Excercise 5</title>
	<style type="text/css">
	table
	{
		border: 2px solid black;
	}
	#titleRow
	{
		text-align: center;
		background-color: #ACB5FF;
	}
	#col1
	{
		width: 150px;
	}
	#col2
	{
		width: 300px;
	}
	#col3
	{
		width: 300px;
	}
</style>
</head>
<body>
	<h1>Category Administration</h1>
	<form method="post">
		<table>
			<tr id="titleRow">
				<td id="col1">Cat ID</td>
				<td id="col2">Title</td>
				<td id="col3">Description</td>
			</tr>

			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "Lab6";

			if(isset($_POST['submit']))
			{
				//Create connection
				$connect = mysqli_connect($servername, $username, $password, $dbname);
				if (!$connect) {
					die('Can\'t connect to database'.mysqli_connect_error());
				}
				else
				{
					$insert = "INSERT INTO Ex5 (ID, Title, Description) 
					VALUES ('".$_POST['catid']."','".$_POST['title']."','".$_POST['description']."')";
					if (mysqli_query($connect, $insert)) {
						echo "Category added successfully";
						$sql = "SELECT * FROM Ex5";
						//Query SQLite
						$result = mysqli_query($connect, $sql);
						if(mysqli_num_rows($result)>0)
						{
						//echo each data row
							while($row = mysqli_fetch_assoc($result))
							{
								echo "<tr><td>".$row['ID']."</td><td>".$row['Title']."</td><td>".$row['Description']."</td></tr>";
							}
						}
					} else {
						echo "Error: ".mysqli_error($connect);
					}
				}
			}
			else
			{	//Show the data when loading the page
				//Create connection
				$connect = mysqli_connect($servername, $username, $password, $dbname);
				if (!$connect) {
					die('Can\'t connect to database'.mysqli_connect_error());
				}
				else
				{
				//Check if table exists
					$showTable = mysqli_query($connect, "SHOW TABLES LIKE Ex5");
					if ($showTable<0) {//Table doesn't exist
					$sql = "CREATE TABLE Ex5 (
					ID VARCHAR(100) PRIMARY KEY,
					Title VARCHAR(100) NOT NULL,
					Description VARCHAR(100) NOT NULL)";
					//Create Table
					if (mysqli_query($connect, $sql)) {
					    //Create successfully
					} else {
						die('Can\'t create table'.mysqli_error($connect));
					}
				}
				else
				{
					//Table exists
					$sql = "SELECT * FROM Ex5";
					$result = mysqli_query($connect, $sql);
					if(mysqli_num_rows($result)>0)
					{
						//echo each data row
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr><td>".$row['ID']."</td><td>".$row['Title']."</td><td>".$row['Description']."</td></tr>";
						}
					}
				}
			}
			mysqli_close($connect);
		}
		?>
		<tr>
			<td><input type="text" name="catid" id="col1"></td>
			<td><input type="text" name="title" id="col2"></td>
			<td><input type="text" name="description" id="col3"></td>
		</tr>
	</table>
	<input type="submit" name="submit" value="Add Category">
</form>
</body>
</html>