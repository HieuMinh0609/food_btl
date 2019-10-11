<?php
require_once 'db.php';

function getAllCat($conn) {
	return db_query($conn, "SELECT * FROM bill");
}

function findProperty($conn,$mapArray,$offset="",$limit="") {
    $sql = "Select  b.idbill,b.place , m.fullname as nameMember,b.createdate,b.status,b.mount from bill b".   "  INNER JOIN member m  ON b.idmember = m.idmember where 1=1 ";
    if(count($mapArray)>0){
    	foreach ($mapArray as $key => $value){

    		$sql .=	 " AND " . $key  ." LIKE '%" .  $value ."%' " ;
    	}
          
     } 
 	if($offset!=="" ){
 		$sql .= " limit  " .$offset .",". $limit;
 	}

 	 
	return db_query($conn,$sql);
}


function createBill($conn, $title, $description) {
	db_query($conn, "INSERT INTO `bill`(`title`, `description`) VALUES ('$title', '$description')");
}

function updateCat($conn, $id, $title, $description) {
	db_query($conn, "UPDATE `cat` SET `title`='$title',`description`='$description' WHERE id = $id");
}

function deleteCat($conn, $id) {
	return db_query($conn, "DELETE FROM cat WHERE id = $id");
}


function getCat($conn, $id) {
	return db_single($conn, "SELECT * FROM cat WHERE id = $id");
}

function newsCountOfCat($conn, $id) {
	$result = db_query($conn, "SELECT id  FROM `news` WHERE cat_id=$id
LIMIT 0,1");
	return mysqli_num_rows($result);
}


 ?>