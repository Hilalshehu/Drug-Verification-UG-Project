<?php
	include_once 'config.php';
	if(isset($_POST['submit'])){
		if($_FILES['csv_data']['name']){
			
			$arrFileName = explode('.',$_FILES['csv_data']['name']);
			if($arrFileName[1] == 'csv'){
				$handle = fopen($_FILES['csv_data']['tmp_name'], "r");
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$drugName = mysqli_real_escape_string($conn,$data[0]);
					
					$drugNumber = mysqli_real_escape_string($conn,$data[3]);
					
					$manufacturerName = mysqli_real_escape_string($conn,$data[6]);
					$date = date("Y/m/d");
					$import="INSERT into drugs(drug_name,drug_number,manufacturer,created_at) values('$drugName','$drugNumber','$manufacturerName','$date')";
					mysqli_query($conn,$import);
				}
				fclose($handle);
				print "Import done";
			}
		}
	}
?>
<html>
	<head>
		<title> CSV </title>
	<head>
	<body>
		<form method='POST' enctype='multipart/form-data'>
			Upload CSV: <input type='file' name='csv_data' /> <input type='submit' name='submit' value='Upload CSV' />
		</form>
	</body>
</html>