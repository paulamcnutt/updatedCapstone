<?
	if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		
		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		
		$db_name="pmcnutt";
		$table_name="contact";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);
	/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	$fileNumber=$_POST['fileNumber'];
	$fileNumber=$mysqli->real_escape_string($fileNumber);
	$name=$_POST['name'];
	$name=$mysqli->real_escape_string($name);
	$program=$_POST['program'];
	$contact=$_POST['contact'];
	$referral=$_POST['referral'];
	$outsideReferral=$_POST['referralOutside'];
	$pjForm=$_POST['pjForms']; 
	$ending=$_POST['ending'];
	$contactNature=$_POST['contactNature'];
	$familyPlan=$_POST['familyPlan'];  
	$currentEditor=$_COOKIE['editor'];
	$queryData=$_SERVER['QUERY_STRING'];
	$supportRequested=$_POST['familyPlan']; 
	$nscForms=$_POST['nscForms'];  
	$notes=$_POST['notes'];
	$notes=$mysqli->real_escape_string($notes);
	$primaryConcern=$_POST['concern'];
	$rereferral = $_POST['reReferral'];
	
	if($name!=""){
		$resultArray=explode(" ", $name);
		$nameCode= ($resultArray[1]);
		$nameCode=strtoupper($nameCode);
	}else{
		$nameCode="";
	}
	
	
	$mysqli->select_db($db_name);
	$sql ="UPDATE $table_name SET program='$program', contact='$contact', referral='$referral',
    outsideReferral='$outsideReferral', pjForm='$pjForm', ending='$ending',contactNature='$contactNature',familyPlan='$familyPlan',supportRequested='$supportRequested',nscForms='$nscForms',notes='$notes', fileNumber='$fileNumber', primaryConcern='$primaryConcern', name='$name', editor='$currentEditor',nameCode='$nameCode',rereferral='$rereferral' WHERE $queryData;";
	//echo $sql;
	$result = $mysqli->query($sql)or die ('Unable to execute query');
echo"
<h1>Contact Form has been Successfully Updated!</h1><br/>
Name: $name<br/>
File Number: $fileNumber<br/>
Program: $program<br/>
Contact: $contact<br/>
Referral:$referral<br/>
Re-Referral: $rereferral<br/>";

if($program=="Parenting Journey"){
	echo
	"Outside Referral: $outsideReferral<br/>
	PJ Form Completed:$pjForm<br/>
	Ending:$ending<br/>
	Nature of Contact:$contactNature<br/>
	Family Plan:$familyPlan<br/>";
}elseif($program=="Native Social Counselling Agency"){
	echo "Primary Concern:$primaryConcern<br/>
	Support Requested:$supportRequested<br/>
	NSC Forms Completed:$nscForms<br/>";
}
echo "Notes: $notes";
echo "<br/><a href='Menu.php'>Back to Main Menu </a>";


?>