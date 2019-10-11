<a href="billlist.php">Back to list</a>
<?php 
	require_once("../lib/db.php");
	require("../lib/BillService.php");

	$conn = db_connect();

	$id = escapeGetParam($conn, "id");

	deleteCat($conn, $id);
	
	header("location:cat.php");
	
	db_close($conn);
?>