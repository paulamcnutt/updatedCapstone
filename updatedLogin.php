<?
		if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		$editedBy=$_COOKIE['editor'];
			$db_name="pmcnutt";
			$table_name="tbllogin";
			$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);

			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
				$mysqli->select_db($db_name);
$user=$_SERVER['QUERY_STRING'];


$sql = "UPDATE $table_name SET username='$_POST[username]', password='$_POST[password]', program='$_POST[program]',
    editor='$_POST[editorName]',editedBy='$editedBy' WHERE username='$user'";
	//echo $sql;
	$result = $mysqli->query($sql) or die("unable to execute query");
	

?>
<html>
<head>
<meta http-equiv="refresh" content="0;url=admin.php">
</head>
<body>
</body>

</html>

