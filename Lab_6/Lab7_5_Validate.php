<!DOCTYPE html>
<html>
	<head>
		<title>Validate rerult</title>
		<meta charset="utf-8">
		<style type="text/css" media="screen">
			a {
				margin-left: 100px;
			}
			b, i {
				margin: 5px 10px;
			}
			i {
				color: red;
			}
		</style>
	</head>
	<body>
		<h2>The result for validate Email address, URL address and Phone number.</h2>
		
		<?php  

			class MyValidate {

				public function __construct() {

				}

				public function IsValidEmail($email) {
					return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
				}
				public function IsValidURL($url) {
					return filter_var($url, FILTER_VALIDATE_URL) && preg_match('/\/{2,}\.+?*/', $url);
				}
				public function IsValidPhoneNumber($phone) {
					$pattern = '/[0-9]{6,14}/';
					return preg_match($pattern, $phone);
				}
			}


			$email = "";
			$url = "";
			$phone = "";
			if(isset($_POST['submit'])) {
				if(isset($_POST['email']))
					$email = trim($_POST['email']);
				if(isset($_POST['phone']))
					$phone = trim($_POST['phone']);
				if(isset($_POST['url']))
					$url = trim($_POST['url']);
			}
			$validate = new MyValidate();
			if($validate->IsValidEmail($email)) {
				echo "<b>Valid Email address = $email</b><br>";
			}
			else 
				echo "<i>Invalid Email address = $email</i><br>";
			if($validate->IsValidURL($url)) 
				echo "<b>Valid URL address = $url</b><br>";
			else 
				echo "<i>Invalid URL address = $url</i><br>";
			if($validate->IsValidPhoneNumber($phone)) 
				echo "<b>Valid phone number = $phone</b><br>";
			else 
				echo "<i>Invalid phone number = $phone</i><br>";

		?>
		<p>
			<a href="Lab7_Ex4.php" title="Quay lại trang trước."><button type="button">Return</button></a>
		</p>
		Press Return button to return Lab7_Ex4.php page
	</body>
</html>