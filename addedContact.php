<?
		if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
if (!isset($_POST['contact'])){
	$_POST['contact']="";
}
if (!isset($_POST['referral'])){
	$_POST['referral']="";
}
if (!isset($_POST['fileNumber'])){
	$_POST['fileNumber']="";
}
if (!isset($_POST['concern'])){
	$_POST['concern']="";
}
if (!isset($_POST['support'])){
	$_POST['support']="";
}
if (!isset($_POST['referralOutside'])){
	$_POST['referralOutside']="";
}	
if (!isset($_POST['ending'])){
	$_POST['ending']="";
}						
if (!isset($_POST['contactNature'])){
	$_POST['contactNature']="";
}
if (!isset($_POST['pjForms'])){
	$_POST['pjForms']="";
}
if (!isset($_POST['familyPlan'])){
	$_POST['familyPlan']="";
}
if (!isset($_POST['nscForms'])){
	$_POST['nscForms']="";
}
if (!isset($_POST['notes'])){
	$_POST['notes']="";
}
if (!isset($_POST['name'])){
	$_POST['name']="";
}
if (!isset($_POST['reReferral'])){
	$_POST['reReferral']="";
}
		$db_name="pmcnutt";
		$table_name="contact";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);
	/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

	$mysqli->select_db($db_name);
	
	$contact=$_POST['contact'];
	$referral=$_POST['referral'];
	$fileNumber=$_POST['fileNumber'];
	$fileNumber=$mysqli->real_escape_string($fileNumber);
	$name=$_POST['name'];
	$name=$mysqli->real_escape_string($name);
	$concern=$_POST['concern'];
	$support=$_POST['support'];
	$referralOutside=$_POST['referralOutside'];
	$ending=$_POST['ending'];
	$nscForms=$_POST['nscForms'];
	$pjForms=$_POST['pjForms'];
	$familyPlan= $_POST['familyPlan'];
	$contactNature= $_POST['contactNature'];
	$program= $_POST['program'];
	$notes= $_POST['notes'];
	$editor=$_COOKIE['editor'];
	$notes=$mysqli->real_escape_string($notes);
	$reReferral=$_POST['reReferral'];
	
	
	if($name!=""){
		$resultArray=explode(" ", $name);
		$nameCode= ($resultArray[1]);
		$nameCode=strtoupper($nameCode);
	}else{
		$nameCode="";
	}
	$sql = "INSERT INTO $table_name(program, contact, referral, outsideReferral,
    pjForm, ending, contactNature,familyPlan,supportRequested,nscForms,notes,fileNumber,primaryConcern,name,editor,nameCode,rereferral) 
	VALUES ('$program','$contact', '$referral','$referralOutside', '$pjForms','$ending',
    '$contactNature','$familyPlan', '$support', '$nscForms',
	'$notes', '$fileNumber','$concern','$name','$editor','$nameCode','$reReferral')";
	 //echo $sql;
	$r=1;
	$result = $mysqli->query($sql) or die ('Unable to execute query');
	
	echo"
	<b>File Number:</b> $fileNumber <br/>
	<b>Program:</b> $program <br/>
	<b>Name:</b> $name <br/>
	<b>Contact:</b> $contact <br/>
	<b>Referral:</b> $referral<br/>
	<b>Re-Referral:</b> $reReferral<br/>
	<b>Notes:</b> $notes
	";
if ($_POST['program']=="Parenting Journey"){
		echo "<br/><br/><br/> <b>PJ Form Completed:</b> $pjForms<br/><b>Outside Referrals:</b> $_POST[referralOutside] <br/> <b>Ending:</b> $_POST[ending] <br/> <b>Nature of Contact:</b> $_POST[contactNature] <br/> <b>Family Plan:</b> $_POST[familyPlan] <br/>";
		
	}else if($_POST['program']=="Native Social Counselling Agency"){
		echo "<br/><br/><br/> <b>Primary Concern:</b> $_POST[concern]<br/> <b>Support Requested:</b>$_POST[support] <br/>";
	}else if($_POST['program']=="Pre-natal"){
	}else if($_POST['program']=="CHIP"){
	}
	echo "<br/><a href='Menu.php'>Back to Main Menu </a>";
?>