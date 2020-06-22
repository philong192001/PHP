<?php 
require_once ('database.php');
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	$sql = 'delete from book where id = '.$id;
	execute($sql);

	echo 'Xoá sách thành công';
}
