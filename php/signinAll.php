<?php

session_start();

include("includes/templates/nav.php");

$host = "localhost";
$user = "root";
$password = "";
$db = "bookweb1";



$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
	die("connection error");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["pass"];


	$sql = "SELECT * FROM users WHERE username='" . $username . "' AND pass='" . $password . "' ";

	$result = mysqli_query($data, $sql);

	$row = mysqli_fetch_array($result);

	if ($row["role"] == "user") {

		$_SESSION["username"] = $username;
		header("refresh:2;url=home.php");
		exit();
		

		
	} elseif ($row["role"] == "admin") {

		$_SESSION["username"] = $username;
		header("refresh:2;url=admin/signin.php");
		exit();


	} elseif($row["username"] == false) {
		header("location:register.php");



	}elseif($row["pass"] == false) {
		header("location:register.php");


	}
}




?>









<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="includes/css/signin.css">
</head>

<body>






	<div class="container py-5">
		<div class="row justify-content-center text-center py-5">
			<div class="col-12 col-md-8 col-lg-8 col-xl-6">


				<div class="row">
					<div class="col text-center title">
						<h2>sign in</h2>
					</div>
				</div>


				<form method="POST">
					<div class="row align-items-center">
						<div class="col mt-4 d-flex">
							<label for="exampleInputEmail1" class="icon mx-3"><i class="fas fa-user py-2"></i></label>
							<input name="username" required type="text" class="form-control" placeholder="UserName">
						</div>
					</div>


					<div class="row align-items-center mt-4">
						<div class="col d-flex">
							<label for="exampleInputEmail1" class="icon mx-3"><i class="fas fa-unlock-alt py-2"></i></label>
							<input name="pass" required type="password" class="form-control" placeholder="Password">
						</div>
					</div>


					<div class="row justify-content-start mt-4 my-5">
						<div class="col">
							<button name="btn-save" type="submit" class="btn btn-primary mt-4">Sign in</button>
						</div>
					</div>
				</form>


			</div>
		</div>
	</div>
	<!-- /////////////////////////////////////////////////////////////////////// -->









	<!-- footer -->
	<!-- /////////////////////////////////////////////////////////////////////// -->
	<?php
	include("includes/templates/footer.php");
	?>
	<!-- end footer -->
	<!-- /////////////////////////////////////////////////////////////////////// -->



</body>

</html>