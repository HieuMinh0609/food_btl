<?php 
function printTable($data, $columns, $editLink = "",$id="", $deleteLink = "",$editdetailLink = "", $deleteCondition = null, $btn = "")
{
	
	echo("<div class=\"container\">");
	echo("<div class=\"row\">");
	echo("<table id=\"tableID\" class=\"table table_backcolor table-bordered\">");
	echo("<tr>");
	foreach ($columns as $column) {
		echo ("<th scope=\"col\">$column</th>");
	}
	if($editLink != "") {
		echo("<td ></td>");
	}
	if($btn != "") {
		echo("<td ></td>");
	}
	if($deleteLink != "") {
		echo("<td></td>");
	}
	if($editdetailLink != "") {
		echo("<td></td>");
	}
	echo("</tr>");

	while($row = mysqli_fetch_assoc($data)) {
		echo("<tr>");
		foreach ($columns as $field => $title) {
			if($field=="status"){

				if($row[$field]==1){
					echo ("<td><a title=\"unfinished\"  class=\"btn btn-danger glyphicon glyphicon-remove\"></a> </td>");
					 
				}
				if($row[$field]==0){
					echo ("<td><a title=\"finished\"  class=\"btn btn-success glyphicon glyphicon-ok\"></a> </td>");

				}
				 
			}else{
				echo ("<td>$row[$field]</td>");
			}
			
		}
		if($editdetailLink != "") {
				echo("<td style=\" width: 30px;\" ><a  class=\"btn btn-primary\" href=\"$editdetailLink?id={$row["$id"]}\">Detail</a></td>");	
		}
		if($editLink != "") {
				echo("<td style=\" width: 30px;\" ><a  class=\"btn btn-warning\" href=\"$editLink?id={$row["$id"]}\">Edit</a></td>");	
		}
		if($deleteLink != "") {
				$result = 0;
				if($deleteCondition)  {
					$result = $deleteCondition($row["$id"]);
				}

				if($result == 0) {
					echo("<td style=\" width: 30px;\"><a class=\"btn btn-danger\" href=\"$deleteLink?id={$row["$id"]}\" onclick=\"return confirm('Are you sure?')\">Delete</a></td>");	
				}
				else {
					echo("<td>Cannot delete category contains news</td>");
				}
		}
		if($btn != "") {
				echo("<td style=\" width: 30px;\" ><button  class=\"btn btn-primary\">Show</button></td>");	
		}
		echo ("</tr>");
	}
	
	echo ("</table>");
	echo("</div >");
	echo("</div >");
}

function printCombobox($data, $selectedValue, $name, $emptyText = "select item") {
	echo("<select name=\"$name\">
	<option value=\"\">$emptyText</option>");
	while ($record = mysqli_fetch_assoc($data)) {
		$selected = $selectedValue == $record["id"] ? "selected" : "";
		echo("<option value=\"{$record["id"]}\" $selected>{$record["title"]}</option>");
	}
	echo("</select>");
}
?>

