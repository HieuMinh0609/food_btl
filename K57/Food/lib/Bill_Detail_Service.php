<?php
require_once 'db.php';

function getAllDeatailBill($conn,$id) {

 
	return db_query($conn, "Select  b.idbill_detail,b.idbill ,b.SoLuong,p.name,p.image from bill_detail  b   INNER JOIN product p  ON b.idproduct = p.idproduct  
 INNER JOIN bill bi  ON b.idbill = bi.idbill  
where b.idbill ='".$id."'");

	
}

function createDetailBill($conn, $title, $description) {
	db_query($conn, "INSERT INTO `bill`(`title`, `description`) VALUES ('$title', '$description')");
}

function updateDeatailBill($conn, $id, $status) {
	 

	 db_query($conn, "UPDATE `bill` SET `status`='$status'  WHERE idbill = $id");
	 
	
}

function deleteBillDeail($conn, $id) { 
	 	$result = mysqli_query($conn, "DELETE FROM bill WHERE idbill = $id");
	 	return $result;
}

function db_query_detailbill($conn, $query) {
	if(!$result) {
		die("Error execute query: " . mysqli_error($conn));
	}
	return $result;
}

function getDetailBill($conn, $id) {
	return db_single($conn, "SELECT * FROM bill WHERE idbill = $id");
}

 

 ?>