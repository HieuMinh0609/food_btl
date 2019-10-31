<?php 
	require_once 'db.php';
	function getComment_IdProduct($conn, $id_product, $start,$limit){
		return db_query($conn, "SELECT content, namelogin  FROM comment,member where idproduct ='$id_product' and comment.idmember = member.idmember order by idcomment DESC LIMIT $start,$limit");
	}
	function TotalComment_Id($conn, $id_product){
		return db_query($conn, "SELECT count(idcomment) as 'total' FROM comment where idproduct ='$id_product' order by idcomment DESC ");
	}
 ?>