<?
		if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
if (!isset($_POST['motherBirth'])){
	$_POST['motherBirth']="";
}
if (!isset($_POST['motherName'])){
	$_POST['motherName']="";
}
if (!isset($_POST['fileNumber'])){
	$_POST['motherGender']="";
}
if (!isset($_POST['fatherBirth'])){
	$_POST['fatherBirth']="";
}
if (!isset($_POST['fatherName'])){
	$_POST['marital']="";
}
if (!isset($_POST['address'])){
	$_POST['address']="";
}	
if (!isset($_POST['phoneNumber'])){
	$_POST['phoneNumber']="";
}						
if (!isset($_POST['cellNumber'])){
	$_POST['cellNumber']="";
}
if (!isset($_POST['email'])){
	$_POST['email']="";
}
if (!isset($_POST['apartmentNumber'])){
	$_POST['apartmentNumber']="";
}
if (!isset($_POST['postalCode'])){
	$_POST['postalCode']="";
}						
if (!isset($_POST['xGender'])){
	$_POST['xGender']="";
}							
if (!isset($_POST['age'])){
	$_POST['age']="";
}	
if (!isset($_POST['gender'])){
	$_POST['gender']="";
}
if (!isset($_POST['births'])){
	$_POST['births']="";
}
		$db_name="pmcnutt";
		$table_name="intake";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);
	/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

	$mysqli->select_db($db_name);
	
	$motherBirth=$_POST['motherBirth'];
	$motherBirth=$mysqli->real_escape_string($motherBirth);
	$motherName=$_POST['motherName'];
	$motherName=$mysqli->real_escape_string($motherName);
	$fileNumber=$_POST['fileNumber'];
	$fileNumber=$mysqli->real_escape_string($fileNumber);
	$fatherBirth=$_POST['fatherBirth'];
	$fatherBirth=$mysqli->real_escape_string($fatherBirth);
	$fatherName=$_POST['fatherName'];
	$fatherName=$mysqli->real_escape_string($fatherName);
	$address=$_POST['address'];
	$address=$mysqli->real_escape_string($address);
	$phoneNumber=$_POST['phoneNumber'];
	$phoneNumber=$mysqli->real_escape_string($phoneNumber);
	$cellNumber=$_POST['cellNumber'];
	$cellNumber=$mysqli->real_escape_string($cellNumber);
	$email=$_POST['email'];
	$email=$mysqli->real_escape_string($email);
	$apartmentNumber=$_POST['apartmentNumber'];
	$apartmentNumber=$mysqli->real_escape_string($apartmentNumber);
	$postalCode=$_POST['postalCode'];
	$postalCode=$mysqli->real_escape_string($postalCode);
	$name=$_POST['name'];
	$name=$mysqli->real_escape_string($name);
	$birth=$_POST['births'];
	$birth=$mysqli->real_escape_string($birth);
	$age=$_POST['xAge'];
	$gender=$_POST['xGender'];
	$resultArray=explode(" ", $motherName);
	$nameCode= ($resultArray[1]);
	$nameCode=strtoupper($nameCode);
	$editor=$_COOKIE['editor'];
	$sql = "INSERT INTO $table_name(fileNumber, ProgramName, referral, contact,
    zone, waitlist, motherName,motherBirthdate,motherAge,motherGender,fatherName,fatherBirthdate, fatherAge,
	fatherGender, maritalStatus, address,apartmentNumber,postalCode,phoneNumber,cellNumber,email,
	primaryConcern, supportRequested,outsideReferrals,ending,contactNature,familyPlan, familyLevel, nameCode, name, birth, age, gender,editor) 
	VALUES ('$fileNumber','$_POST[program]', '$_POST[referral]','$_POST[contact]', '$_POST[zone]','$_POST[waitlist]',
    '$motherName','$motherBirth', '$_POST[motherAge]', '$_POST[motherGender]',
	'$fatherName', '$fatherBirth','$_POST[fatherAge]', '$_POST[fatherGender]','$_POST[marital]', '$address',
    '$apartmentNumber','$postalCode','$phoneNumber', '$cellNumber', '$email', '$_POST[concern]'
	, '$_POST[support]', '$_POST[referralOutside]', '$_POST[ending]', '$_POST[contactNature]', '$_POST[familyPlan]'
	, '$_POST[level]','$nameCode','$name','$birth','$age','$gender','$editor')";
	 //echo $sql;
	$r=1;
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	$displayChildren="<table>";
	
	for ($r=1;$r<=10;$r++){
		$childName= "childName".$r;
		$childBirth= "childBirth".$r;
		$childAge= "childAge".$r;
		$childGender= "childGender".$r;
		if ($_POST[$childName] !=""){
			$sql="INSERT INTO children (name, birth, age, gender, fileNumber, childNumber,program) VALUES ('$_POST[$childName]','$_POST[$childBirth]','$_POST[$childAge]','$_POST[$childGender]','$fileNumber','$r','$_POST[program]')";
			$result = $mysqli->query($sql);
			$displayChildren.= "<tr><td>Child #$r </td><td> Name: $_POST[$childName]</td><td>Birthdate: $_POST[$childBirth]</td><td>Age: $_POST[$childAge]</td><td>Gender: $_POST[$childGender]</td></tr>";
		}else{
			$r=11;
		}
	}
	$displayChildren.= "</table>";
	echo "<html>
	<head>
		<link rel='stylesheet' type='text/css' href='generalStyles.css'>
		<link rel='shortcut icon' href='favicon.ico'>
	</head>
	<body><h1>Intake Form has been successfully added:</h1> <br/>
	<a href='Menu.php'>Back to Main Menu </a><br/>
	<a href='intakeForm.php'> Add another </a><br/>
	File Number: $fileNumber<br/> Program Name: $_POST[program]<br/> Referral: $_POST[referral]<br/> Contact: $_POST[contact]<br/>
	Zone: $_POST[zone]<br/> Waitlist: $_POST[waitlist]<br/><br/> 
	Address: $address <br/> Apartment Number: $apartmentNumber <br/> Postal Code: $postalCode <br/> Phone Number: $phoneNumber <br/> Cell Number: $cellNumber <br/> Email: $email <br/><br/><br/>Mother Name: $motherName<br/> Mother Birth Date: $motherBirth<br/>
	Mother Age: $_POST[motherAge]<br/> Mother Gender: $_POST[motherGender]<br/><br/><br/> Father Name: $fatherName<br/> Father Birth Date: $fatherBirth <br/> Father Age: $_POST[fatherAge] <br/> Father Gender: $_POST[fatherGender]<br/><br/><br/> Marital Status: $_POST[marital] <br/>";
	echo "$displayChildren";
	
	if ($_POST['program']=="Parenting Journey"){
		echo "<br/><br/><br/> Outside Referrals: $_POST[referralOutside] <br/> Ending: $_POST[ending] <br/> Nature of Contact: $_POST[contactNature] <br/> Family Plan: $_POST[familyPlan] <br/> Level of Family: $_POST[level] <br/><br/>";
		
	}else if($_POST['program']=="Native Social Counselling Agency"){
		echo "<br/><br/><br/> Primary Concern: $_POST[concern]<br/> Support Requested:$_POST[support] <br/>";
	}else if($_POST['program']=="Pre-natal"){
	}else if($_POST['program']=="CHIP"){
	}
	echo "</body></html>";
?>