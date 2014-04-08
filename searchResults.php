<?
if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		
		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		
					if (!isset($_POST['searchCriteria'])){
						$_POST['searchCriteria']='';
					}
					if (!isset($_POST['program'])){
						$_POST['program']='';
					}
					
		$db_name="pmcnutt";
		$table_name="intake";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();	
	}
	$mysqli->select_db($db_name);
	
	if($_POST['searchCriteria']=='fNumber'){
		$sql = "SELECT * FROM $table_name WHERE fileNumber=".$_POST['search'];
	}else if($_POST['searchCriteria']=='Name'){
		$sql = "SELECT * FROM $table_name WHERE nameCode='".strtoupper($_POST['search'])."'";
	}else if($_POST['program']!==''){
		$sql = "SELECT * FROM $table_name WHERE ProgramName='".$_POST['program']."'";
	}else{
		$sql = "SELECT * FROM $table_name";
	}
	echo "<h1>Search Results</h1>";
	$result = $mysqli->query($sql);
	if ($result==false){
		echo "No results found for your query.";
		$tableData="";
	}else{
			$tableData="<table>";
		while ($row = mysqli_fetch_array($result)) {
			$fileNumber=stripslashes($row['fileNumber']);
			$nameCode=stripslashes($row['nameCode']);
			$program=stripslashes($row['ProgramName']);
			$tableData.= "<tr><td>File Number: ".$fileNumber."</td><td>Last Name: ".$nameCode."</td><td>Program: ".$program."</td><td><input type='button' value='Edit' onClick=\"window.location.href='display.php?fileNumber=".$fileNumber."'\"></tr>";
			}
		$tableData.="</table>";
	}

?>
<html>
	<head>
		<title>Search Results </title>
		<link rel='shortcut icon' href='favicon.ico'>
		<link rel="stylesheet" type="text/css" href="stats.css">
		<link rel="stylesheet" type="text/css" href="generalStyles.css">
	</head>
	<body>
		<a href='search.php'>Back to Search</a><br/>
		<a href='Menu.php'>Back to Main Menu</a>
		<div>
			<? echo $tableData ?>
		</div>
	</body>
</html>