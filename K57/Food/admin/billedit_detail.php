 <?php include 'includes/header.php'; ?>
 <div class="container-fluid">
        <div class="row">
             
            <div class="link_header">
                <i class="glyphicon glyphicon-hand-right"></i>
                <a href="#">Home</a>
                <span>/</span>
                <a href="billlist.php">Bill</a>
                <span>/</span>
                <span>Bill detail</span>
            </div>
        
        </div>
    </div>
 <div class="container" >
 <div id="form_register" class="col-md-8 col-sm-8 col-8">



<br><br>
  <form class="form-sigin">

    
            <div class="loginname">
                <input readonly  style="padding-left: 158px;" class="input_name " type="text"  name="nameLogin"  placeholder="ID Bill" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-tag"></i>
                         <span style="  margin-left: 5px;">ID Bill</span>
						</span>

            </div>
            <div class="loginname">
                <input readonly style="padding-left: 158px;" class="input_name " type="text"  name="nameLogin"  placeholder="ID Detail" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                        <i class="glyphicon glyphicon-tag"></i>
                         <span style="  margin-left: 5px;">ID Detail</span>
                        </span>

            </div>
            <div class="loginname">
                <input  style="padding-left: 158px;"  class="input_name" type="text" name=""  placeholder="Count" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-tag"></i>
                        <span style="  margin-left: 5px;">Count</span>
						</span>


            </div>
              
            <div class="loginname">
                <input readonly style="padding-left: 158px;"  class="input_name" type="text" name="passWord" placeholder="Name Product" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-shopping-cart"></i>
                        <span style="  margin-left: 5px;">Name</span>
						</span>
            </div>
              
       


<div class="row">
 <div class="col-md-3 "  style="float: right ;">
    <button class="btn btn-danger">Delete</button>
  
    <button class="btn btn-warning">Update</button>
</div>
</div>


</form>
</div>
<br><br>
  <div class="col-md-4 col-sm-4 col-4">
      <img src="images/Tasty-Chinese-Food-HD-picture-01.jpg" class="img-circle" id="viewImage" width="250px" height="250ox">
                    
</div>
</div>
</div>
<br><br>

<?php 
    require("../lib/controls.php");
    require_once("../lib/db.php");
    require("../lib/BillService.php");
    require("../lib/Bill_Detail_Service.php");
     $conn = db_connect();
     $id = escapeGetParam($conn, "id"); 

    

     $result=getAllDeatailBill($conn,$id);

    printTable($result, 
        ["idbill_detail" => "ID Detail", 
        "idbill" => "iD Bill",
        "SoLuong" => "Số Lượng",
        "name" => "Name",
        "image" => "Anh",],"","","","",null,"btn");

    db_close($conn);
?>

<script type="text/javascript">
    var table = document.getElementById("tableID");
if (table != null) {
    for (var i = 0; i < table.rows.length; i++) {
        
     for (var j = 0; j < table.rows[i].cells.length; j++)
        table.rows[i].cells[5].onclick = function () {
                 tableText(this.cells[0]);
                console.log(table.rows[i]);
        };

           
        
     
}
}

function tableText(tableCell) {
    alert(tableCell.innerHTML);
}
</script>
<?php include 'includes/footer.php'; ?>