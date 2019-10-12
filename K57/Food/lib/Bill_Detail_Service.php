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

function updateDeatailBill($conn, $id, $count) {
	 

	 db_query($conn, "UPDATE `bill_detail` SET SoLuong=$count  WHERE idbill_detail = $id");
	 
		 
}

function deleteBillDeail($conn, $id) { 
	 	db_query($conn, "DELETE FROM `bill_detail` WHERE idbill_detail = $id");
	 	 
}

function db_query_detailbill($conn, $query) {
	if(!$result) {
		die("Error execute query: " . mysqli_error($conn));
	}
	return $result;
}

function getDetailBill($conn, $id) {
	return db_single($conn, "Select  b.idbill_detail,b.idbill ,b.SoLuong,p.name,p.image from bill_detail  b   INNER JOIN product p  ON b.idproduct = p.idproduct  
 INNER JOIN bill bi  ON b.idbill = bi.idbill  
where b.idbill_detail ='".$id."'");
}

 

 ?>