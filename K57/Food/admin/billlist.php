<?php include 'includes/header.php'; ?>
<div class="container-fluid">
		<div class="row">
			 
			<div class="link_header">
				<i class="glyphicon glyphicon-hand-right"></i>
				<a href="#">Home</a>
				<span>/</span>
				<span>Bill</span>
			</div>
		
		</div>
	</div>
<div class="container">
	<form>
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="input_search_area">
						<input  class="input_search" type="text"  placeholder="Code Invoice" >
						<span class="focus-input100"></span>
						<div class="symbol-input100">
						 
							<i class="glyphicon glyphicon-search"></i>
						 
						</div>
						
					</div>
					
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
						<button type="button" class="btn_sreach btn btn-success">Search</button>
					</div>
		</div>
	
</div>
<?php 
	require("../lib/controls.php");
	require_once("../lib/db.php");
	require("../lib/BillService.php");

	if (isset($_GET['page']))   {
    	$current_page = $_GET['page'];
	}else{
		$current_page =1;
	}

	if (isset($_GET['nameCus']))   {
    	  $arr = array("m.fullname"=>$_GET['nameCus'] );
	}else{
		 $arr = array();
	}
	$limit =5;
	$offer =($current_page - 1)*$limit;;
	
	

	$conn = db_connect();
	$result = findProperty($conn,$arr,$offer,$limit);

	printTable($result, 
		["idbill" => "ID", 
		"place" => "Địa Chỉ",
		"nameMember" => "Tên Khách Hàng",
		"createdate" => "Ngày Tháng",
		"status" => "Trạng Thái",
		"mount" => "Tổng Tiền"
	],
		"billedit.php","idbill");

	db_close($conn);
?>

 <div class="example">
        <div class="container">
            <div class="row">
                <ul class="pager">
		
                    <li><a id="Previous_page" href="javascript:prevPage()">Previous</a></li>
                    <li><span id="page_value"><?php echo $current_page ?></span></li>
                    <li><a id="Next_page" href="javascript:nextPage()">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
   	var current_page = <?php echo $current_page ?>

   
  function changePage(page)
{
    var btn_next = document.getElementById("Next_page");
    var btn_prev = document.getElementById("Previous_page");
   
 
    // Validate page
    if (page < 1) page = 1;
    

    if (page == 1) {
        btn_prev.style.visibility = "hidden";
    } else {
        btn_prev.style.visibility = "visible";
    }   
}

 function prevPage()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
        window.location="billlist.php?page="+current_page;
        
    }
    $('#page_value').text(current_page);
}

function nextPage()
{  
        current_page++;
        changePage(current_page); 
        window.location="billlist.php?page="+current_page; 
         $('#page_value').text(current_page);
    
}
</script>
<?php include 'includes/footer.php'; ?>