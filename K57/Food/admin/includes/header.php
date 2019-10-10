<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="content/jquery-3.4.1.min.js"></script>
	 <link rel="stylesheet"  type="text/css" href="content/bootstrap-3.1.1-dist/css/bootstrap.min.css">
	 <script type="text/javascript" src="content/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="content/style.css">
</head>
<body>
<div class="container-fluid">
		<div id="header_admin" class="row">
			<div id="set_size_img" class="col-md-3 col-sm-6 col-xs-6">
			   <img   src="images/logo.png" alt="foot_fast">
			</div>
			<div   class="col-md-9 col-sm-6 col-xs-6">
				<a data-toggle="dropdown" href="">
					<div class="infor_user" title="Information">
					<img class="img_user"  src="images/man.png" alt="admin">
					<button class="name_user">Admin</button> 
					<ul  class="dropdown-menu">
				    <li><a href="#">Product</a></li>
				    <li><a href="#"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
			    
			  	</ul>
				</div>
				</a>
			
				<div class="email_icon" title="Email">
					
					<a href="">

					<span class="messenge_icon">
						<i class="glyphicon glyphicon-envelope"></i>
					
					</span>
					</a>
				</div>
				<div class="count_messenge">
							<span>20</span>
				</div>	
				
			</div>
		</div>

		<div class="card_hr row">
			<hr>
		</div>

		<div id="maneger_row" class="row">
			<div class="col-md-1 col-sm-4 col-xs-4">
				<div class="dropdown">
			  <button id="button_product" class="btn btn_primary_button dropdown-toggle" type="button" data-toggle="dropdown">Product
			  <span class="caret"></span></button>
			  <ul class="dropdown-menu">
			    <li><a href="#">Product</a></li>
			    <li><a href="#">Sale</a></li>
			    
			  </ul>
			</div>
		
			</div>

			<div class="col-md-1  col-sm-4 col-xs-4">
				<a href="#"> <button class="btn btn_primary_button" type="button">Member</button></a>
			</div>
			<div class="col-md-1  col-sm-4 col-xs-4">
				<a href="#"><button class="btn btn_primary_button" type="button">Invoice</button></a>
			</div>

		</div>
	</div>
	<div class="card_hr row">
		<hr>
	</div>
