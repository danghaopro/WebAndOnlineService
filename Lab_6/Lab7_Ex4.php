<!DOCTYPE html>
<html>
	<head>
		<title>Validate the email, URL and phone number</title>
		<meta charset="utf-8">
		<style type="text/css" media="screen">
			input {
				padding: 5px;
				margin: 10px 100px;
			}
			.submit {
				margin-left: 150px;
			}
		</style>
	</head>
	<body>
		<h3>Validate the Email address, URL address and Phone number</h3>
		<p>
			<form action="Lab7_5_Validate.php" method="post" accept-charset="utf-8">
				<input type="text" name="email" value="" placeholder="Input email address" maxlength="60"><br>
				<input type="text" name="url" value="" placeholder="Input URL address" maxlength="100"><br>
				<input type="text" name="phone" value="" placeholder="Input phone number" maxlength="14"><br>
				<input class="submit" type="submit" name="submit" value="Validate">
			</form>
		</p>
		<p>Press validate button to get result in Lab7_5_Validate.php page</p>
	</body>
</html>