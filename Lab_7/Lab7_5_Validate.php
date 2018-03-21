<<<<<<< HEAD
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

            class MyValidate
            {
                public function __construct()
                {
                }

                public function IsValidEmail($email)
                {
                    /*
                    - ([a-zA-Z0-9_\.]{6,32}): Có từ 6-32 ký tự, các ký tự có thể là chữ cái thường, chữ cái hoa, chữ số, dấu chấm và dấu gạch dưới
                    - ([a-zA-Z0-9]{2,12}): Có từ 2-12 ký tự, các ký tự có thể là chữ cái thường, chữ cái hoa và chữ số
                    - (\.[a-zA-Z]{2,12})+: Có ít nhất một tên miền cấp cha, bắt đầu bằng dấu chấm, sau đó là 2-12 ký tự chữ cái, ví dụ .com, .com.vn, .hust.edu.vn
                    */
                    $pattern = '/^';
                    $pattern .= '([A-Za-z0-9_\.]{6,32})'; // before @
                    $pattern .= '@'; // @
                    $pattern .= '([a-zA-Z0-9]{2,12})'; // domain
                    $pattern .= '(\.[a-zA-Z]{2,12})+'; // parent domain
                    $pattern .= '$/';
                    return preg_match($pattern, $email);
                }
                public function IsValidURL($url)
                {
                    $pattern = '/^';
                    $pattern .= '[a-zA-Z]+:\/\/';// Protocol: Phải có ít nhất 1 chữ cái và sau đó là "://"
                    $pattern .= '([a-zA-Z0-9]{2,12})';// Domain: Có từ 2-12 ký tự chữ cái hoặc chữ số
                    $pattern .= '(\.[a-zA-Z]{2,12})+'; // Parent domain: Phải có ít nhất 1 tên miền cấp cha bắt đầu bằng dấu chấm, sau đó là 2-12 ký tự chữ cái, ví dụ .com, .com.vn, .hust.edu.vn
                    $pattern .= '$/';
                    return preg_match($pattern, $url);
                }
                public function IsValidPhoneNumber($phone)
                {
                    $pattern = '/[0-9]{6,14}/';// Có từ 6-14 chữ số
                    return preg_match($pattern, $phone);
                }
            }

            $email = "";
            $url = "";
            $phone = "";
            if (isset($_POST['submit'])) {
                if (isset($_POST['email'])) {
                    $email = trim($_POST['email']);
                }
                if (isset($_POST['phone'])) {
                    $phone = trim($_POST['phone']);
                }
                if (isset($_POST['url'])) {
                    $url = trim($_POST['url']);
                }
            }
            $validate = new MyValidate();
            if ($validate->IsValidEmail($email)) {
                echo "<b>Valid Email address = $email</b><br>";
            } else {
                echo "<i>Invalid Email address = $email</i><br>";
            }
            if ($validate->IsValidURL($url)) {
                echo "<b>Valid URL address = $url</b><br>";
            } else {
                echo "<i>Invalid URL address = $url</i><br>";
            }
            if ($validate->IsValidPhoneNumber($phone)) {
                echo "<b>Valid phone number = $phone</b><br>";
            } else {
                echo "<i>Invalid phone number = $phone</i><br>";
            }

        ?>
		<p>
			<a href="Lab7_Ex4.php" title="Quay lại trang trước."><button type="button">Return</button></a>
		</p>
		Press Return button to return Lab7_Ex4.php page
	</body>
</html>
=======
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
					return filter_var($url, FILTER_VALIDATE_URL);
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
>>>>>>> 661d7cb2e1bf5335b3acd231ebc4d2dbe386d6c2
