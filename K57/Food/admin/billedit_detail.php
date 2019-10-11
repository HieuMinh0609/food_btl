 <?php include 'includes/header.php'; ?>
 <div class="container" style="width:700px">
 <div id="form_register" class="col-md-12 col-sm-12 col-12">
  <form class="form-sigin">
            <div class="loginname">
                <input  class="input_name " type="text"  name="nameLogin"  placeholder="ID Bill" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-tag"></i>
						</span>

            </div>
            <div class="loginname">
                <input   class="input_name" type="text" name=""  placeholder="Count" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-tag"></i>
						</span>


            </div>
            <div class="loginname">
                <input   class="input_name" type="text" name="passWord" placeholder="Name Product" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
						<i class="glyphicon glyphicon-shopping-cart"></i>
						</span>


            </div>
            <input type="hidden" name="idUser">

</form>

<div class="row">
 <div class="col-md-2 "  style="float: right">
    <button class="btn btn-danger">Delete</button>
</div>
<div class="col-md-2 " style="float: right">
    <button class="btn btn-primary">Update</button>
</div>

</div>

</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>