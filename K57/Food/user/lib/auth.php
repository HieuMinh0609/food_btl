<?php 
require_once 'db.php';
function doLogin($username, $password) {
	if(isValid($username, $password)!=0) {
		startSession();
		$_SESSION["username"] = $username;
		redirect("layout.php");	
	}	
	else{
		echo "sai tài khoản hoặc mật khẩu";
	}
}
function getIdUser($username){
	$con =db_connect();
	$check = db_query($con,"SELECT * FROM member where namelogin='$username'") ;
	while ($dong = mysqli_fetch_array($check)) { 
		$result = $dong['idmember'];
	}
	return $result;
}
function checkLoggedIn() {
	startSession();
	if(!isset($_SESSION["username"])) {
		redirect("login.php");
	}
}

function isValid($username, $password) {
	$con =db_connect();
	$check = db_query($con, "SELECT * FROM member where namelogin='$username' and password='$password'");
	$num_rows = mysqli_num_rows($check);
	return $num_rows;
}

function startSession() {
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
}

function redirect($page) {
	header("location:$page");
}

function getLoggedInUser(){ 
	startSession();
	if(isset($_SESSION["username"])){
		$username = $_SESSION["username"];
	}
	else{
		$username ="";
	}
	return $username;
}

function doLogout() {
	startSession();
	session_destroy();
	echo "string";
	redirect("login.php");
}

?>