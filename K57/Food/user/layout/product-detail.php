<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../bootstrap/css/style.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
	<script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
	 <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
		include_once "header.php";
		include_once ('../lib/db.php');
		include_once ('../lib/controls.php');
		include_once ('../lib/cart_service.php');
		include_once ('../lib/comment_service.php');
		
		$con =db_connect();
		
	 ?>
	 <?php 
	 	if(isset($_GET['action']) && $_GET['action']=="detail"){
			$id_product=intval($_GET['id']);	
		}
		$result = GetProduct_Id($con,$id_product);
		
	  ?>
	  
	 <div class="center-left row">
	 	<div class="col-md-8 row">
	 		<div class="col-md-6 image">
				<img src="../image/0001.jpg" alt="">
	 		</div>
		 	<div class="col-md-6 product-info">
		 		<?php while($dong = mysqli_fetch_array($result)){ ?>
				<div class="product-name"><?php echo substr($dong['name'],0,80); ?></div>
				<hr>
				<span class="product-danhgia">4</span>
				<div class="product-price-promotion">
					<?php 
						 $promotion=$dong['sell']*(100-$dong['promotion'])/100;
						echo number_format($promotion) ;
					 ?> đ

				</div>
				<div class="product-price"><?php echo number_format($dong['sell'])?> đ</div>
				<div class="product-mota"><?php echo substr($dong['information'],0,270); ?></div>
				
				<button class="btn btn-primary themgiohang">Thêm vào giỏ hàng</button>
				<button class="btn btn-danger muatiep">Mua tiếp</button>
				<hr>
				<form action="" method="POST">
				<div class="danhgia row">
					<span class="col-md-4">Đánh giá</span>
					<input type="number" class="form-control col-md-2" value="5" max="5" min="1" ><button class="btn btn-primary col-md-3">Đánh giá</button>
					
				</div>
	
			</form>
		 	</div>

	 		<?php } ?>

	 	</div>

	 	<div class="col-md-4 comment">
			<div class="binhluan col-md-8">
 				<span >Bình luận</span>
 				<textarea class="form-control" name="" id="" cols="20" rows="3"></textarea>
 				<button class="btn btn-primary">Bình luận</button>
 			</div>
 			<hr>
	 		<div class="danhsachbinhluan">
	 			<?php 
					$result1 = TotalComment_Id($con, $id_product);
					$row = mysqli_fetch_assoc($result1);
					$total_records = $row['total'];
					echo $total_records;

					$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
					$limit = 2;

					$total_page = ceil($total_records / $limit);

					
					if ($current_page > $total_page){
					    $current_page = $total_page;
					}
					else if ($current_page < 1){
					    $current_page = 1;
					}

					$start = ($current_page - 1) * $limit;

					$result1 = getComment_IdProduct($con,$id_product,$start,$limit);
	 				while ($dong1 = mysqli_fetch_array($result1)) {
						?>	
			 			<span><?php echo $dong1['namelogin'] ?></span><br>
					 	<p><?php echo $dong1['content']; ?></p>
				 		<hr>
				 		
					   <?php }
					   ?>
			    	<div class="pagination-detail">
			    	<?php  
				    if ($current_page > 1 && $total_page > 1){
				        echo '<a href="product-detail.php?action=detail&id='.($id_product).'&page='.($current_page-1).'">Prev</a> ';
				    }

				    
				    for ($i = 1; $i <= $total_page; $i++){
				        
				       
				            echo '<a class="trang" href="product-detail.php?action=detail&id='.($id_product).'&page='.$i.'">'.$i.'</a> ';
				        
				    }

				    
				    if ($current_page < $total_page && $total_page > 1){
				        echo '<a href="product-detail.php?action=detail&id='.($id_product).'&page='.($current_page+1).'">Next</a> ';
				    }
				
					?>
				</div>
		 	</div>
	 	</div>
	 </div>
	
	 
	 
	 
</body>
</html>