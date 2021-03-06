<div class="registerValidation">
<?php
include_once('../php/init.php');

if(isset($_REQUEST['check'])){

$firstName= $_POST['firstName'];
$lastName= $_POST['lastName'];
$salt = "forcaporto258";
$password = $_POST['password'].$salt;
$password= sha1($password);
$email = $_POST['email'];
$name = $firstName . $lastName;
$confirmPassword= $_POST['confirmPassword'];

	try{
//insert statements
$sqlToInsert='INSERT INTO user (name,password,email) VALUES(:name, :password,:email)';
$stmt=$dbh->prepare($sqlToInsert);
//bbinding variables

$stmt->bindParam(':name',$name);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':email',$email);
// execute statement
$stmt->execute();
} catch (PDOException $e){
	$result=  $e->getCode();
	if($result == 23000){
		echo "Email already taken! Please try again!";
	}
	}

}


?>
</div>
	<head>
		<title>Taskify</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css"></link>

	</head>
	<body>
		<div class="mainpage_text">
			<center>
				<div class="titleAndLogo">
					<a href="#"><img src="https://image.ibb.co/c4d3aG/logo.png" class="logo"></a>
					<h1>Taskify</h1>
				</div>
			<center>

			<center>
				<h2>The anti procrastination tool of the internet</h2>
			</center>
		</div>
		<div class="container_register">
			<form action="register.php?check" method="post" onsubmit="return handler();">
				<script  src="../js/register_validation.js"> </script>
				<div class="form_input">
					<input type="text" placeholder="FirstName" name="firstName" required>
				</div>

				<div class="form_input">
					<input type="text" placeholder="LastName"
					name="lastName" required>
				</div>

				<div class="form_input">
					<input type="email" placeholder="Email"
					name="email" required>
				</div>

				<div class="form_input">
					<input type="password" placeholder="Password"
					name="password" required>
				</div>

				<div class="form_input">
					<input type="password" placeholder="Confirm Password"
					name="confirmPassword" required>
					<div id="pass_int"> </div>
				</div>
				<div class="submit_button">
					<input type="submit" name="submit" value="Submit">
				</div>
			</form>

		</div>
		<center>
			<div class="account_button">
					<a href="login.php">I already have an account</a>
			</div>
		</center>
	</body>
