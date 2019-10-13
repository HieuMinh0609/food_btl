 <?php include 'includes/header.php'; ?>



<div class="container-fluid">
        <div class="row">
             
            <div class="link_header">
                <i class="glyphicon glyphicon-hand-right"></i>
                <a href="HomePage.php">Home</a>
                <span>/</span>
                <a href="productlist.php">Product</a>
                <span>/</span>
                <span>Add</span>
            </div>
        
        </div>
    </div>
    <br><br>
<div class="container">
<?php 
    require("../lib/controls.php");
    require_once("../lib/db.php");
    require("../lib/ProductService.php");



if(isset($_POST["saveProduct"])){
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

uploadFileimage($target_file,"fileToUpload");

 $conn = db_connect();
        createProduct($conn, 
            escapePostParam($conn, "nameProduct"), 
            escapePostParam($conn,"information"), 
            escapePostParam($conn,"cost"),
            escapePostParam($conn,"select_type"), 
            basename($_FILES["fileToUpload"]["name"]), 
            escapePostParam($conn,"status")
            );    

db_close($conn);


}

?>



</div>

<div class="container" e   >
    <div id="form_product" class="col-md-12 col-sm-12 col-12">
        <form  enctype='multipart/form-data' method="POST" class="form-sigin">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6">
                    <div class="loginname">
                    <input required  class="input_name " type="text"  name="nameProduct"  placeholder="Name Product" >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="glyphicon glyphicon-tags"></i>
                    </span>

                     </div>

                </div>
                  <div class="col-md-6 col-sm-6 col-6">
                    <div class="loginname">
                    <input required class="input_name " type="text"  name="cost"  placeholder="Cost" >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="glyphicon glyphicon-usd"></i>
                    </span>

                     </div>

                </div>
            </div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-6">
                     <div class="loginname">
                    <input required style="padding-top: 12px;" class="input_name" id="uploadImage" type="file"  name="fileToUpload"  placeholder="Name Login" >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="glyphicon glyphicon-picture"></i>
                    </span>

                    </div>
                </div>
                 <div class="col-md-6 col-sm-6 col-6">
                    <select required name="select_type" class="form-control input_name">
                    
                    
                    <?php 
                    $conn = db_connect();
                    $data_type = getAllType($conn);
                    db_close($conn);

                    printCombobox_two($data_type,"type","typeid","typename");
                     ?>   
                        
                  </select>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i style="margin-left: 15px;" class="glyphicon glyphicon-cutlery"></i>
                    </span>
 

                </div>
                   
            </div>
            <div class="row">
             
            <div class="col-md-6 col-sm-6 col-6">
            
                      <img src="images/picture.jpg" class="img-circle" id="viewImage" width="250px" height="250ox">
                    
            </div>
            <div class="col-md-6 col-sm-6 col-md-6">
                <div class="radio">
                     <label><input type="radio" value="0" name="status" checked>Final</label>
                     <label><input type="radio" value="1" name="status">Unfinal</label>
                
              
                                  
 </div>

            </div>
            </div>

<br><br>
            <textarea name="information"  rows="4" cols="100%" style="margin: 0px;width: 1119px;height: 176px;" placeholder="Describe product here..." spellcheck="false"></textarea>

            <input type="hidden" name="idUser">


            <button class="btn btn-warning" name="saveProduct">Save</button>
        </form>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
       
        $('#uploadImage').change(function () {
            readUrl(this,'viewImage');

      });
    });
     function readUrl(input,imageId) {
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload=(function (e) {
                $('#'+ imageId).attr('src',reader.result);
            });

            reader.readAsDataURL(input.files[0]);

        }
    }

</script>
<?php include 'includes/footer.php'; ?>