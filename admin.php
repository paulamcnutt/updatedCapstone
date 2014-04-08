<?
		if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		
		$db_name="pmcnutt";
		$table_name="tbllogin";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();	
	}
	$sql= "SELECT * FROM $table_name";
	$mysqli->select_db($db_name);
	
	echo "<h1>Admin Information</h1>";
	$result = $mysqli->query($sql);
	$tableData="<table>";
		while ($row = mysqli_fetch_array($result)) {
			$username=stripslashes($row['username']);
			$password=stripslashes($row['password']);
			$program=stripslashes($row['program']);
			$editor=$row['editor'];
			$tableData.= "<tr><td>Username: ".$username."</td><td>Password: ".$password."</td><td>Program: ".$program."</td><td> Editor: " .$editor."</td><td><a href='loginUpdates.php?$username'><input type='button' value='Update'/></a></td></tr>";
		}
		$tableData.="</table>";
	 // echo "<a Update password?"

?>
<html>
	<head>
		<title>Search Results </title>
		<link rel="stylesheet" type="text/css" href="stats.css">
		<link rel="stylesheet" type="text/css" href="generalStyles.css">
		<link rel='shortcut icon' href='favicon.ico'>
	</head>
	<body>
		<a href='Menu.php'>Back to Main Menu</a><br/>
		<div>
			<? echo $tableData ?>
		</div>
	</body>
</html>