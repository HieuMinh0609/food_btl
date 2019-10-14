<?php include 'includes/header.php'?>
 
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<div class="container-fluid">
		<div class="row">
			 
			<div class="link_header">
				<i class="glyphicon glyphicon-hand-right"></i>
				<a href="#">Home</a>
				 
			</div>
		
		</div>
	 
		
	 
		<br>
		<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
<br><br>
	</div>
<?php 
	require("../lib/controls.php");
	require_once("../lib/db.php");
	require("../lib/BillService.php");
	$timenow = date('Y-m-d H:i:s');
	$month = date("m",strtotime($timenow));
	$year = date("Y",strtotime($timenow));


	$conn = db_connect();
	$hotfood =  CountTypeChart($conn,1,$month,$year);
	$fastfood =  CountTypeChart($conn,2,$month,$year);
	$drink =  CountTypeChart($conn,3,$month,$year);

	db_close($conn);


?>
<script type="text/javascript">
	google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Food Hot", <?=$hotfood?>, "#b87333"],
        ["Food Fast", <?=$fastfood ?>, "silver"],
        ["Drinks",<?=$drink ?>, "gold"]
        
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Statistics in <?= $month ?> month in  <?= $year ?> year",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }


</script>
<?php include 'includes/footer.php'?>