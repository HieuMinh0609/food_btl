<?php
require_once 'db.php';

function getAllMember($conn) {
	return db_query($conn, "SELECT * FROM bill");
}

function findPropertyMember($conn,$mapArray,$offset="",$limit="") {
    $sql = "select * from member where 1=1 ";
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


function createMember($conn, $namelogin, $fullname,$password,$createdate,$idrole,$sex,$address,$phone) {
	db_query_Member($conn, "INSERT INTO `member`(`namelogin`, `fullname`,`password`, `createdate`,`idrole`, `sex`,`address`, `phone`) VALUES ('$namelogin','$fullname','$password','$createdate','$idrole','$sex','$address','$phone')");


}



function db_query_Member($conn, $query) {
	$result1 = mysqli_query($conn, $query);
	if(!$result1) {
		  echo ("<br><div class=\"alert alert-danger alert-dismissible fade in\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</button>
        <strong>Wrong!</strong> Check phone number or namelogin have been used.
        </div>");
        
	}else{
		 echo ("<br><div class=\"alert alert-success alert-dismissible fade in\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</button>
        <strong>Success!</strong>  You have successfully implemented.
        </div>");
	}
	return $result1;
}


function updateMember($conn,$id, $namelogin, $fullname,$password,$idrole,$sex,$address,$phone) {
	 
	 
	 db_query_Member($conn, "UPDATE `member` SET `namelogin`='$namelogin',`fullname`='$fullname',`password`='$password',`idrole`='$idrole',`sex`='$sex',`address`='$address',`phone`='$phone'  WHERE idmember = $id");

	
}

function deleteMember($conn, $id) { 
	 	$result = mysqli_query($conn, "DELETE FROM member WHERE idmember = $id");
	 	return $result;
}

 

function getSingleMember($conn, $id) {
	return db_single($conn, "SELECT * FROM `member` WHERE idmember = $id");
}

function newsCountOfMember($conn, $id) {
	$result = db_query($conn, "SELECT id  FROM `news` WHERE cat_id=$id
LIMIT 0,1");
	return mysqli_num_rows($result);
}


 ?>