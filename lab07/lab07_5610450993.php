<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab07-ข้อ11</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<script>
	$('#example').tableExport();
	$(document).ready(function() {
		$('#example').tableExport();
    	$('#example').DataTable();
	} );
</script>
<body>

<p style="font-size:200%">ข้อ11</p>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dreamhome";

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e){
	echo $e->getMessage()."<br>";	
	die();
}
$sql = "SELECT type,avg(rent) as avgRent FROM propertyforrent GROUP BY type";
?>

<div class="container">
	<div class="row">
		<div class="btn-group pull-right" style=" padding: 10px;">
			<div class="dropdown">
  				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
     				<span class="glyphicon glyphicon-th-list"></span> Dropdown
  				</button>
  				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    				<li><a href="#" onclick="$('#example').tableExport({type:'json',escape:'false'});"> <img src="images/json.jpg" width="24px"> JSON</a></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="images/json.jpg" width="24px">JSON (ignoreColumn)</a></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'json',escape:'true'});"> <img src="images/json.jpg" width="24px"> JSON (with Escape)</a></li>
					<li class="divider"></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'xml',escape:'false'});"> <img src="images/xml.png" width="24px"> XML</a></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'sql'});"> <img src="images/sql.png" width="24px"> SQL</a></li>
					<li class="divider"></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'csv',escape:'false'});"> <img src="images/csv.png" width="24px"> CSV</a></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'txt',escape:'false'});"> <img src="images/txt.png" width="24px"> TXT</a></li>
					<li class="divider"></li>				
								
					<li><a href="#" onclick="$('#example').tableExport({type:'excel',escape:'false'});"> <img src="images/xls.png" width="24px"> XLS</a></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'doc',escape:'false'});"> <img src="images/word.png" width="24px"> Word</a></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'powerpoint',escape:'false'});"> <img src="images/ppt.png" width="24px"> PowerPoint</a></li>
					<li class="divider"></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'png',escape:'false'});"> <img src="images/png.png" width="24px"> PNG</a></li>
					<li><a href="#" onclick="$('#example').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="images/pdf.png" width="24px"> PDF</a></li>		
  				</ul>
			</div>
		</div>
	</div>
    
    <div class="row" style="height:300px !important;overflow:scroll;">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Rent(AVG)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Type</th>
                    <th>Rent(AVG)</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($conn->query($sql) as $row): ?>
                <tr>
                    <td><?php echo $row['type'] ?></td>
                    <td><?php echo $row['avgRent'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    	</table>
	</div>
</div>



</body>
</html>