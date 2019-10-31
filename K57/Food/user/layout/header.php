<?php 
	include '../lib/auth.php';
	include '../lib/cart_service.php';
	include '../lib/member_service.php';
	if (isset($_GET['logout']))   {
        doLogout();
	}
	
 ?>
<div class="header container-fluid">
	<form action="" method="POST">
		<div class="header-top row">
		<div class="header-left col-md-3">
			<img src="../image/logo.png" alt="">
		</div>
		<div class="header-center col-md-4">
			<div class="form-timkiem row">
				<input type="text" class="form-control col-md-8 input_timkiem" name="input_timkiem">
				<div class="col-md-1"></div>
				<input type="submit" value="Tìm kiếm" class="btn btn-primary col-md-3" name="submit_timkiem">
			</div>	
		</div>
		<div class="header-right col-md-5 row">
			<div class="col-md-4 dangky-dangnhap">
				<a class="dangky" href="" name="signup">Signup |</a>
				<a class="dangnhap" href="login.php" name="login">Login</a>
			</div>
			<div class="col-md-5 name-dangxuat">
				<span> 
				<?php
					require_once '../lib/auth.php';
					require_once '../lib/db.php';
					$username = getLoggedInUser();
					echo $username;
				?>|</span>
				
				<a href="header.php?logout=logout" class="dangxuat" name="logout">Logout</a>
			</div>
			<?php 
				if($username!=""){

					$con = db_connect();
					
					$id_user = getIdUser($username);

					$count  = mysqli_num_rows(getCount_IdUser($con, $id_user));
				}
				
			 ?>
			<div class="col-md-3 giohang"><a href="cart.php">Giỏ hàng(<?php echo $count ?>)</a></div>
		</div>
	</div>
	</form>
	
	<div class="menu row">
		
		<nav class="navbar navbar-expand-sm bg-primary  menu-navbar">
		  <ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link " href="#">Trang chủ</a>
		    </li>
		    <li class="nav-item dropdown">
			   <a class="nav-link" href="#" id="navbarDropdown">Sản phẩm</a>
			   <div class="dropdown-content">
				   <a class="dropdown-item" href="full-douong.php">Đồ uống</a>
				   <a class="dropdown-item" href="full-fastfood">Đồ ăn nhanh</a>
				   <a class="dropdown-item" href="full-hotfood">Đồ ăn nóng</a>
			   </div>
			</li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">Giới thiệu</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">Liên hệ</a>
		    </li>
		   
		  </ul>
		</nav>
	</div>
</div>
<script type="text/javascript">
	var username = '<?php echo $username ?>'
	
	if(username ==''){
		$('.name-dangxuat').hide();
		$('.giohang').hide();
	}
   		
   	
</script>


