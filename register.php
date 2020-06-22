<?php 
require_once('database.php');
$_username = $_email = $_fullname = $_phone = $_password =  '';
$isPwdMapping = true;
 // var_dump($_username);
if (!empty($_POST)) {
	if (isset($_POST)) {
		$_username = $_POST['username'];
	}
	if (isset($_POST)) {
		$_email = $_POST['email'];
	}
	if (isset($_POST)) {
		$_fullname = $_POST['fullname'];
	}
	if (isset($_POST)) {
		$_phone = $_POST['phone'];
	}
	if (isset($_POST)) {
		$_password = $_POST['password'];
	}
	if (isset($_POST)) {
		$_confirmation_pwd = $_POST['confirmation_pwd'];
	}
	if ($_username != '' && $_password != '' && $_password == $_confirmation_pwd) {
		$sql = "insert into user(username,email,fullname,phonenumber,password) values ('$_username','$_email','$_fullname','$_phone','$_password')";
		execute($sql);
		header('Location:login.php');
		die();		
	}else{
		$isPwdMapping = false;
	}
	
		
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Registation Form - Input User's Detail Information</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					<div class="form-group">
						<label for="usr">User Name:</label>
						<input required="true" type="text" class="form-control" id="usr" name="username">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input required="true" type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="fullname">Full Name:</label>
						<input type="text" class="form-control" id="fullname" name="fullname">
					</div>
					<div class="form-group">
						<label for="phone"> Phone Number:</label>
						<input required="true" type="text" class="form-control" id="phone" name="phone">
					</div>
					<div class="form-group">
						<label for="pwd">Password:<?=$isPwdMapping?'':'<font color=red>Mật khẩu không khớp rồi bạn eei :D</font>'?></label>
						<input required="true" type="password" class="form-control" id="pwd" name="password">
					</div>
					<div class="form-group">
					  <label for="confirmation_pwd">Confirmation Password:</label>
					  <input required="true" type="password" class="form-control" id="confirmation_pwd" name="confirmation_pwd">
					</div>				
					<button class="btn btn-success">Register</button>
					<a class="btn btn-danger" href='javascript: history.go(-1)'>Quay lại</a>
				</form>		
			</div>
		</div>
	</div>
</body>
</html>