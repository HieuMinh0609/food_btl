<?php 
require 'conf.php';

function doLogin($conn,$username, $password) {
	if(isValid($conn,$username, $password)==1) {
		startSession();

		$isMember = isMember($conn,$username, $password);
		


		$_SESSION["username"] = $username;
	startSession();
		$_SESSION["idrole"] =$isMember['idrole'] ;

		
		return true;
	}	
	return false;
}

function checkLoggedInWeb() {
	startSession();
	if(!isset($_SESSION["username"])) {
		redirect("../login/login.php");
	}
}


function checkLoggedInAdmin() {
	startSession();
	if(!isset($_SESSION["username"]) && ($_SESSION["idrole"])!='2') {
		redirect("../login/login.php");
	}
}


function isValid($conn,$username, $password) {
		$sql = "SELECT * FROM member where namelogin='$username' and password='$password' ";
		$restult =  db_query($conn,$sql);

		return mysqli_num_rows($restult);
}


function isMember($conn,$username, $password) {
		$sql = "SELECT * FROM member where namelogin='$username' and password='$password' ";



		$result=  db_query($conn,$sql);

		$row = mysqli_fetch_assoc($result);

		 return $row;
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
	if(isset($_SESSION["username"]) ){
		return $_SESSION["username"];
	}
	return null;
	
}

function doLogout() {
	startSession();
	session_destroy();
	redirect("../login/login.php");
}

?>