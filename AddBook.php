<?php
require_once('database.php');
$_BookName = $_Author = $_Price = $_Producer = $_id = ''; 
if (!empty($_POST)) {	
	if (isset($_POST['BookName'])) {
		$_BookName = $_POST['BookName'];
	}
	if (isset($_POST['Author'])) {
		$_Author = $_POST['Author'];
	}
	if (isset($_POST['Price'])) {
		$_Price = $_POST['Price'];
	}
	if (isset($_POST['Producer'])) {
		$_Producer = $_POST['Producer'];
	}
	if (isset($_POST['id'])) {
		$_id = $_POST['id'];
	}
	$_BookName = str_replace('\'', '\\\'', $_BookName);
	$_Author      = str_replace('\'', '\\\'', $_Author);
	$_Price  = str_replace('\'', '\\\'', $_Price);
	$_Producer       = str_replace('\'', '\\\'', $_Producer);
	$_id       = str_replace('\'', '\\\'', $s_id);

	if ($_id == '') {
		//insert
		$sql = "insert into book(BookName, Author, Price,Producer) value ('$_BookName', '$_Author', '$_Price','$_Producer')";
	} else {
		//update
		$sql = "update book set BookName = '$_BookName', Author = '$_Author', Price = '$_Price', Producer = '$_Producer' where id = " .$_id;
		
	}
	execute($sql);

	header('Location: BookManage.php');
	die();
}
$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from book where id = '.$id;
	$BookList = executeResult($sql);
	if ($BookList != null && count($BookList) > 0) {
		$book        = $BookList[0];
		$_BookName = $book['BookName'];
		$_Author      = $book['Author'];
		$_Price  = $book['Price'];
		$_Producer  = $book['Producer'];
	} else {
		$id = '';
	}
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Add - Edit Book</title>
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
				<h2 class="text-center">Add Book</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="usr">Tên Sách:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="BookName" name="BookName" value="<?=$_BookName?>">
					</div>
					<div class="form-group">
					  <label for="Author">Tác Giả:</label>
					  <input type="text" class="form-control" id="Author" name="Author" value="<?=$_Author?>">
					</div>
					<div class="form-group">
					  <label for="Price">Giá:</label>
					  <input type="text" class="form-control" id="Price" name="Price" value="<?=$_Price?>">
					</div>
					<div class="form-group">
					  <label for="Producer">Nhà Sản Xuất:</label>
					  <input type="text" class="form-control" id="Producer" name="Producer" value="<?=$_Producer?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>