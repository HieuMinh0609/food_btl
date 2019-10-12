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
<?php 
    require("../lib/controls.php");
    require_once("../lib/db.php");
    require("../lib/BillService.php");
    require("../lib/Bill_Detail_Service.php");
 
if(isset($_POST['updateDetail'])){
    $conn = db_connect();
        updateDeatailBill($conn, 
            escapePostParam($conn, "id_detailbill"), 
            escapePostParam($conn,"mountProduct"));    
        echo ("<br><div class=\"alert alert-success alert-dismissible fade in\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</button>
        <strong>Success!</strong> update success.
        </div>");
    
        db_close($conn);
}

if(isset($_POST['deleteDetail'])){
    $conn = db_connect();
        deleteBillDeail($conn, 
            escapePostParam($conn, "id_detailbill"));    
        echo ("<br><div class=\"alert alert-success alert-dismissible fade in\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</button>
        <strong>Delete!</strong> delete success.
        </div>");
    
        db_close($conn);
}
?>

 <div id="form_register" class="col-md-8 col-sm-8 col-8">



<br><br>
  <form id="formUrl"   method="POST" class="form-sigin">

    
            <div class="loginname">
                <input required readonly  style="padding-left: 158px;" class="input_name "  id="id_detailbill" type="text"  name="id_detailbill"  placeholder="ID Bill" value= ""   >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-tag"></i>
                         <span style="  margin-left: 5px;">ID Bill</span>
						</span>

            </div>
            <div class="loginname">
                <input required readonly style="padding-left: 158px;" class="input_name " id="id_bill" type="text"  name="id_bill"  placeholder="ID Detail" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                        <i class="glyphicon glyphicon-tag"></i>
                         <span style="  margin-left: 5px;">ID Detail</span>
                        </span>

            </div>
            <div class="loginname">
                <input required style="padding-left: 158px;"  class="input_name" id="mountProduct" type="text" name="mountProduct"  placeholder="Count" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-tag"></i>
                        <span style="  margin-left: 5px;">Count</span>
						</span>


            </div>
              
            <div class="loginname">
                <input required readonly style="padding-left: 158px;" id="nameProduct" class="input_name" type="text" name="nameProduct" placeholder="Name Product" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-shopping-cart"></i>
                        <span style="  margin-left: 5px;">Name</span>
						</span>
            </div>

<div class="row">
 <div class="col-md-3 "  style="float: right ;">
    <button name="deleteDetail" type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</button>
  
    <button name="updateDetail" type="submit" onclick="return confirm('Are you sure you want to update?')" class="btn btn-warning">Update</button>
</div>
</div>


</form>
</div>
<br><br>
  <div class="col-md-4 col-sm-4 col-4">
      <img id="imageProduct" src="images/Tasty-Chinese-Food-HD-picture-01.jpg" class="img-circle" id="viewImage" width="250px" height="250ox">
                    
</div>
</div>
</div>
<br><br>

 
<?php 
     $conn = db_connect();
     $id = escapeGetParam($conn, "id"); 
 $idDetailBill="";
     $result=getAllDeatailBill($conn,$id);

    printTable($result, 
        ["idbill_detail" => "ID Detail", 
        "idbill" => "iD Bill",
        "SoLuong" => "Số Lượng",
        "name" => "Name",
        "image" => "Anh",],"","idbill_detail","","",null,"btn");

    db_close($conn);
?>

<script type="text/javascript">
 

   

 $("tr.table_show").click(function() {
    var tableData = $(this).children("td").map(function() {
        return $(this).text();
    }).get();

     reloadForm(tableData);
});

 function reloadForm(data){
    $('#id_detailbill').val(data[0]);
     $('#id_bill').val($.trim(data[1]));
      $('#mountProduct').val($.trim(data[2]));
       $('#nameProduct').val($.trim(data[3]));
       $('#imageProduct').attr('src',"images/"+$.trim(data[4]));

 }

  
</script>
<?php include 'includes/footer.php'; ?>