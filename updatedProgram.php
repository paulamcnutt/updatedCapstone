<?
if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		
		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		$editor=$_COOKIE['editor'];
		
if (!isset($_POST['Name'])){
	$_POST['Name']="";
}
if (!isset($_POST['Address'])){
	$_POST['Address']="";
}
if (!isset($_POST['Location'])){
	$_POST['Location']="";
}
if (!isset($_POST['TelephoneNumber'])){
	$_POST['TelephoneNumber']="";
}
if (!isset($_POST['Cell'])){
	$_POST['Cell']="";
}
if (!isset($_POST['Email'])){
	$_POST['Email']="";
}

		$db_name="pmcnutt";
		$table_name="tblemployeeinformation";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);
	/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if ($_POST['programSelector']=="Pre-natal"){
	$mysqli->select_db($db_name);
	$program=$_POST['programSelector'];
	$name=$_POST['Name1'];
	$name=$mysqli->real_escape_string($name);
	$address=$_POST['Address1'];
	$address=$mysqli->real_escape_string($address);
	$location=$_POST['Location1'];
	$location=$mysqli->real_escape_string($location);
	$telephoneNumber=$_POST['TelephoneNumber1'];
	$telephoneNumber=$mysqli->real_escape_string($telephoneNumber);
	$cell=$_POST['Cell1'];
	$cell=$mysqli->real_escape_string($cell);
	$email=$_POST['Email1'];
	$email=$mysqli->real_escape_string($email);
 }elseif ($_POST['programSelector']=="CHIP"){
	$mysqli->select_db($db_name);
	$program=$_POST['programSelector'];
	$name=$_POST['Name2'];
	$name=$mysqli->real_escape_string($name);
	$address=$_POST['Address2'];
	$address=$mysqli->real_escape_string($address);
	$location=$_POST['Location2'];
	$location=$mysqli->real_escape_string($location);
	$telephoneNumber=$_POST['TelephoneNumber2'];
	$telephoneNumber=$mysqli->real_escape_string($telephoneNumber);
	$cell=$_POST['Cell2'];
	$cell=$mysqli->real_escape_string($cell);
	$email=$_POST['Email2'];
	$email=$mysqli->real_escape_string($email);
 }elseif ($_POST['programSelector']=="Native Social Counselling Agency"){
	$mysqli->select_db($db_name);
	$program=$_POST['programSelector'];
	$name=$_POST['Name3'];
	$name=$mysqli->real_escape_string($name);
	$address=$_POST['Address3'];
	$address=$mysqli->real_escape_string($address);
	$location=$_POST['Location3'];
	$location=$mysqli->real_escape_string($location);
	$telephoneNumber=$_POST['TelephoneNumber3'];
	$telephoneNumber=$mysqli->real_escape_string($telephoneNumber);
	$cell=$_POST['Cell3'];
	$cell=$mysqli->real_escape_string($cell);
	$email=$_POST['Email3'];
	$email=$mysqli->real_escape_string($email);
 }elseif ($_POST['programSelector']=="Parenting Journey"){
	$mysqli->select_db($db_name);
	$program=$_POST['programSelector'];
	$name=$_POST['Name4'];
	$name=$mysqli->real_escape_string($name);
	$address=$_POST['Address4'];
	$address=$mysqli->real_escape_string($address);
	$location=$_POST['Location4'];
	$location=$mysqli->real_escape_string($location);
	$telephoneNumber=$_POST['TelephoneNumber4'];
	$telephoneNumber=$mysqli->real_escape_string($telephoneNumber);
	$cell=$_POST['Cell4'];
	$cell=$mysqli->real_escape_string($cell);
	$email=$_POST['Email4'];
	$email=$mysqli->real_escape_string($email);
 }elseif ($_POST['programSelector']=="Youth Outreach"){
	$mysqli->select_db($db_name);
	$program=$_POST['programSelector'];
	$name=$_POST['Name5'];
	$name=$mysqli->real_escape_string($name);
	$address=$_POST['Address5'];
	$address=$mysqli->real_escape_string($address);
	$location=$_POST['Location5'];
	$location=$mysqli->real_escape_string($location);
	$telephoneNumber=$_POST['TelephoneNumber5'];
	$telephoneNumber=$mysqli->real_escape_string($telephoneNumber);
	$cell=$_POST['Cell5'];
	$cell=$mysqli->real_escape_string($cell);
	$email=$_POST['Email5'];
	$email=$mysqli->real_escape_string($email);
 }
	$sql ="UPDATE $table_name SET Name='$name', Address='$address', Location='$location', TelephoneNumber='$telephoneNumber', Cell='$cell', Email='$email', Editor='$editor' WHERE Program='$program';";
	//echo $sql;
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	
	echo "<html><head>
	<link rel='stylesheet' type='text/css' href='generalStyles.css'>
	</head><body><h2>Information has been updated!</h2>
	<a href='Menu.php'>Back to Main Menu</a><br/>
	<a href='employeeProgram.php'>Back to Employee & Program Information</a><br/>
	<b>Program:</b> $program <br/>
	<b>Name:</b> $name <br/>
	<b>Address:</b> $address <br/>
	<b>Location:</b> $location <br/>
	<b>Telephone Number:</b> $telephoneNumber <br/>
	<b>Cell #:</b> $cell <br/>
	<b>Email:</b> $email <br/></body></html>";
?>