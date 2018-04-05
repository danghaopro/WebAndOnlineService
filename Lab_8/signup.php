<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="login_logo">
		<img class="image_logo" src="logo.png" alt="English Challenge">
	</div>
	<div class="login_form">
		<div class="login_title">
			Sign up
		</div>
		<form action="#" method="post" accept-charset="utf-8">
			<input type="email" name="" value="" placeholder="Email"><br>
			<input type="text" name="" value="" placeholder="Username"><br>
			<input type="password" name="" value="" placeholder="Password"><br>
			<input type="password" name="" value="" placeholder="Confirm password"><br>
			<input type="text" name="" value="" placeholder="Full name"><br>
			<div class="signup_birthday">
				Birthday<br>
			<SELECT>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>
				<option>30</option>
				<option>31</option>
			</SELECT>
			<select>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
			</select>
			<select>
				<?php 
					for($i = 1900; $i <= 2100; $i++) {
						echo "
							<option>$i</option>
						";
					}
				 ?>
			</select>
			<br>
			Gender<br>
			</div>
			<input type="radio" name="gender" value="" placeholder=""> Male <br>
			<input type="radio" name="gender" value="" placeholder=""> Female <br>
			<input type="radio" name="gender" value="" placeholder=""> Other <br>
			<input type="checkbox" name="iagreewith" value=""> I agree the terms of service <br>
			<input type="submit" name="" value="Create Account"><br>
			<a class="create_account" href="#" title="">Have an account? Sign in now ...</a>
		</form>
	</div>
</body>
</html>