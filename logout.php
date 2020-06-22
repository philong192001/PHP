<?php 
	session_start(); 
 
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
}
setcookie('status', 'success', time()-3000, '/');

header('Location: login.php');
die();
 ?>