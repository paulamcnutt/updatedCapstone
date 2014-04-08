<?
      	if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		
					if (!isset($childName)){
						$childName="";
						}
					if (!isset($gender)){
						$gender="";
						}
					if (!isset($age)){
						$age="";
						}
					if (!isset($waitlistOptions)){
						$waitlistOptions="";
						}
						
					//}
$queryData =$_SERVER['QUERY_STRING'];					
$itemXML=new DOMDocument;
$itemXML->load('data.xml');
$xpath = new DOMXPath($itemXML);

$genderItems = $xpath->query('/dataFields/items[@id="gender"]/item');
$ageItems = $xpath->query('/dataFields/items[@id="age"]/item');
$programItems = $xpath->query('/dataFields/items[@id="program"]/item');
$referralItems = $xpath->query('/dataFields/items[@id="referral"]/item');
$contactItems = $xpath->query('/dataFields/items[@id="contact"]/item');
$zoneItems = $xpath->query('/dataFields/items[@id="zone"]/item');
$waitlistItems = $xpath->query('/dataFields/items[@id="waitlist"]/item');
$concernItems = $xpath->query('/dataFields/items[@id="concern"]/item');
$supportItems = $xpath->query('/dataFields/items[@id="support"]/item');
$referralOutsideItems = $xpath->query('/dataFields/items[@id="referralOutside"]/item');
$levelItems = $xpath->query('/dataFields/items[@id="level"]/item');
$maritalItems = $xpath->query('/dataFields/items[@id="marital"]/item');
$endingItems = $xpath->query('/dataFields/items[@id="ending"]/item');
$contactNatureItems = $xpath->query('/dataFields/items[@id="contactNature"]/item');


//gender
foreach ($genderItems as $genderItem) { 
	 $gender.= "<option>" .$genderItem->nodeValue . "</option>";
}
$motherGender= "<select name='motherGender' id='motherGender'>".$gender."</select>";
$fatherGender= "<select name='fatherGender' id='fatherGender'>". $gender."</select>";
$xGender= "<select name='xGender' id='xGender'>". $gender."</select>";
$childGender1= "<select name='childGender1' id='childGender1'>".$gender."</select>";
$childGender2= "<select name='childGender2' id='childGender2'>".$gender."</select>";
$childGender3= "<select name='childGender3' id='childGender3'>".$gender."</select>";
$childGender4= "<select name='childGender4' id='childGender4'>".$gender."</select>";
$childGender5= "<select name='childGender5' id='childGender5'>".$gender."</select>";
$childGender6= "<select name='childGender6' id='childGender6'>".$gender."</select>";
$childGender7= "<select name='childGender7' id='childGender7'>".$gender."</select>";
$childGender8= "<select name='childGender8' id='childGender8'>".$gender."</select>";
$childGender9= "<select name='childGender9' id='childGender9'>".$gender."</select>";
$childGender10= "<select name='childGender10' id='childGender10'>".$gender."</select>";

$childGenders = [$childGender1,$childGender2,$childGender3,$childGender4,$childGender5,$childGender6,$childGender7,$childGender8,$childGender9,$childGender10];


//age
foreach ($ageItems as $ageItem) {
	 $age.= "<option>" .$ageItem->nodeValue . "</option>";
}
$motherAge= "<select name='motherAge' id='motherAge'>".$age."</select>";
$fatherAge= "<select name='fatherAge' id='fatherAge'>".$age."</select>";
$xAge= "<select name='xAge' id='xAge'>".$age."</select>";
$childAge1= "<select name='childAge1' id='childAge1'>".$age."</select>";
$childAge2= "<select name='childAge2' id='childAge2'>".$age."</select>";
$childAge3= "<select name='childAge3' id='childAge3'>".$age."</select>";
$childAge4= "<select name='childAge4' id='childAge4'>".$age."</select>";
$childAge5= "<select name='childAge5' id='childAge5'>".$age."</select>";
$childAge6= "<select name='childAge6' id='childAge6'>".$age."</select>";
$childAge7= "<select name='childAge7' id='childAge7'>".$age."</select>";
$childAge8= "<select name='childAge8' id='childAge8'>".$age."</select>";
$childAge9= "<select name='childAge9' id='childAge9'>".$age."</select>";
$childAge10= "<select name='childAge10' id='childAge10'>".$age."</select>";

$childAges = [$childAge1,$childAge2,$childAge3,$childAge4,$childAge5,$childAge6,$childAge7,$childAge8,$childAge9,$childAge10];

//zone
$zone= "<select name='zone' id='zone'>";
foreach ($zoneItems as $zoneItem) {
	 $zone.= "<option>" .$zoneItem->nodeValue . "</option>";
}
$zone.= "</select>";

//waitlist
foreach ($waitlistItems as $waitlistItem) {
	 $waitlistOptions.= "<option>" .$waitlistItem->nodeValue . "</option>";
}
$waitlist= "<select name='waitlist' id='waitlist'>".$waitlistOptions."</select>";
$familyPlan="<select name='familyPlan' id='familyPlan'>".$waitlistOptions."</select>";
//program
$program= "<select name='program' id='program' onchange='setUp()'>";
foreach ($programItems as $programItem) {
	 $program.= "<option value=\"".$programItem->nodeValue."\" >" .$programItem->nodeValue . "</option>";
}
$program.= "</select>";

//referral
$referral= "<select name='referral' id='referral'>";
foreach ($referralItems as $referralItem) {
	 $referral.= "<option>" .$referralItem->nodeValue . "</option>";
}
$referral.= "</select>";

//contact
$contact= "<select name='contact' id='contact'>";
foreach ($contactItems as $contactItem) {
	 $contact.= "<option>" .$contactItem->nodeValue . "</option>";
}
$contact.= "</select>";

//concern
$concern= "<select name='concern' id='concern'>";
foreach ($concernItems as $concernItem) {
	 $concern.= "<option>" .$concernItem->nodeValue . "</option>";
}
$concern.= "</select>";

//support
$support= "<select name='support' id='support'>";
foreach ($supportItems as $supportItem) {
	 $support.= "<option>" .$supportItem->nodeValue . "</option>";
}
$support.= "</select>";

//referralOutside
$referralOutside= "<select name='referralOutside' id='referralOutside'>";
foreach ($referralOutsideItems as $referralOutsideItem) {
	 $referralOutside.= "<option>" .$referralOutsideItem->nodeValue . "</option>";
}
$referralOutside.= "</select>";


//level
$level= "<select name='level' id='level'>";
foreach ($levelItems as $levelItem) {
	 $level.= "<option>" .$levelItem->nodeValue . "</option>";
}
$level.= "</select>";

//marital
$marital= "<select name='marital' id='marital'>";
foreach ($maritalItems as $maritalItem) {
	 $marital.= "<option>" .$maritalItem->nodeValue . "</option>";
}
$marital.= "</select>";


//ending
$ending= "<select name='ending' id='ending'>";
foreach ($endingItems as $endingItem) {
	 $ending.= "<option>" .$endingItem->nodeValue . "</option>";
}
$ending.= "</select>";

//contactNature
$contactNature= "<select name='contactNature' id='contactNature'>";
foreach ($contactNatureItems as $contactNatureItem) {
	 $contactNature.= "<option>" .$contactNatureItem->nodeValue . "</option>";
}
$contactNature.= "</select>";

	
		$db_name="pmcnutt";
		$table_name="intake";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$mysqli->select_db($db_name);
	
	
	$sql = "SELECT * FROM $table_name WHERE $queryData";
	//echo $sql;
	$result = $mysqli->query($sql);
while ($row = mysqli_fetch_array($result)) {
	$date=stripslashes($row['date']);
	$fileNumberDisplay = stripslashes($row['fileNumber']);
	$addressDisplay = stripslashes($row['address']);
	$programNameDisplay = $row['ProgramName'];
	$referralDisplay = $row['referral'];
	$contactDisplay = $row['contact'];
	$apartmentNumberDisplay = stripslashes($row['apartmentNumber']);
	$zoneDisplay = $row['zone'];
	$waitlistDisplay = $row['waitlist'];
	$motherNameDisplay = stripslashes($row['motherName']);
	$motherBirthDateDisplay = stripslashes($row['motherBirthdate']);
	$motherAgeDisplay = $row['motherAge'];
	$motherGenderDisplay = $row['motherGender'];
	$fatherNameDisplay = stripslashes($row['fatherName']);
	$fatherBirthdateDisplay = stripslashes($row['fatherBirthdate']);
	$fatherAgeDisplay = $row['fatherAge'];
	$fatherGenderDisplay = $row['fatherGender'];
	$maritalStatusDisplay = $row['maritalStatus'];
	$postalCodeDisplay = stripslashes($row['postalCode']);
	$phoneNumberDisplay = stripslashes($row['phoneNumber']);
	$cellNumberDisplay = stripslashes($row['cellNumber']);
	$emailDisplay = stripslashes($row['email']);	
	$primaryConcernDisplay = $row['primaryConcern'];
	$supportRequestedDisplay = $row['supportRequested'];
	$outsideReferralsDisplay = $row['outsideReferrals'];
	$endingDisplay = $row['ending'];
	$contactNatureDisplay = $row['contactNature'];
	$familyPlanDisplay = $row['familyPlan'];	
	$familyLevelDisplay = $row['familyLevel'];	
	$lastUpdated = stripslashes($row['date']);
	$name = stripslashes($row['name']);
	$birth = stripslashes($row['birth']);
	$age = stripslashes($row['age']);
	$gender = stripslashes($row['gender']);
	$editor=stripslashes($row['editor']);
}

	$children="<table><tr><td></td><td>Child</td><td>Birth date (dd/mm/y)</td><td>Age</td><td>Gender</td></tr>";
	$age="";
	$i=0;
	
		//$db_name="pmcnutt";
		$table_name="children";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();	
	}	

	$mysqli->select_db($db_name);
	$i=1;
	$jsDoThis="";
for ($r=1;$r<=10;$r++){
	$sql = "SELECT * FROM $table_name WHERE fileNumber=$fileNumberDisplay && childNumber=$r";
	$result = $mysqli->query($sql);
	if ($result ==true){	
				$row = mysqli_fetch_array($result);
				$childName=stripslashes($row['name']);
				$childBirth=stripslashes($row['birth']);
				$childGender=($row['gender']);
				$childAge=($row['age']);
				$children.="<tr><td>Child #".$i."</td>
							<td><input name='childName".$i."' type=\"text\" maxlength=\"50\" value='".$childName."' id='childName".$i."' /></td>
							<td><input name='childBirth".$i."' type=\"text\" maxlength=\"50\" value='".$childBirth."'id='childBirth".$i."' /></td>";
				
				$children.="<td>".$childAges[$i-1]."</td>";
				$children.="<td>".$childGenders[$i-1]."</td></tr>";
				$jsDoThis.="document.getElementById('childAge".$i."').value='".$childAge."';document.getElementById('childGender".$i."').value='".$childGender."';";
			
	}else{
		$r=10;
	}
	$i++;
}
$children.="</table>";

?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="generalStyles.css">
	<link rel='shortcut icon' href='favicon.ico'>
	<script type="text/javascript">
		function setUp(){
			document.getElementById("program").value="<?echo $programNameDisplay ?>";
			document.getElementById("referral").value="<?echo $referralDisplay ?>";
			document.getElementById("referralOutside").value="<?echo $outsideReferralsDisplay ?>";
			document.getElementById("ending").value="<?echo $endingDisplay ?>";
			document.getElementById("marital").value="<?echo $maritalStatusDisplay ?>";
			document.getElementById("concern").value="<?echo $primaryConcernDisplay ?>";
			document.getElementById("contact").value="<?echo $contactDisplay ?>";
			document.getElementById("contactNature").value="<?echo $contactNatureDisplay ?>";
			document.getElementById("zone").value="<?echo $zoneDisplay ?>";
			document.getElementById("support").value="<?echo $supportRequestedDisplay ?>";
			document.getElementById("level").value="<?echo $familyLevelDisplay ?>";
			document.getElementById("motherAge").value="<?echo $motherAgeDisplay ?>";
			document.getElementById("fatherAge").value="<?echo $fatherAgeDisplay ?>";			
			document.getElementById("motherGender").value="<?echo $motherGenderDisplay ?>";
			document.getElementById("fatherGender").value="<?echo $fatherGenderDisplay ?>";
			document.getElementById("waitlist").value="<?echo $waitlistDisplay ?>";
			document.getElementById("familyPlan").value="<?echo $familyPlanDisplay ?>";
			document.getElementById("xAge").value="<?echo $age ?>";
			document.getElementById("xGender").value="<?echo $gender ?>";
			<? echo $jsDoThis?>
			hideAll();
			if(document.getElementById("program").value=="Parenting Journey"){
				document.getElementById("pj").style.display="block";
			}else if(document.getElementById("program").value=="Native Social Counselling Agency"){
				document.getElementById("nsc").style.display="block";
			}else if(document.getElementById("program").value=="CHIP"){
				document.getElementById("chip").style.display="block";
			}else if(document.getElementById("program").value=="Pre-Natal"){
				document.getElementById("prenatal").style.display="block";
			}else{
				document.getElementById("youth").style.display="block";
			}
		}
			function hideAll(){
				document.getElementById("pj").style.display="none";
				document.getElementById("nsc").style.display="none";
				document.getElementById("youth").style.display="none";
				document.getElementById("chip").style.display="none";
				document.getElementById("prenatal").style.display="none";
			}
		</script>
		<title>Edit Intake Form</title>
	</head>
	<body onload="setUp()">
		<h1>Edit Intake Form</h1>
		<a href='Menu.php'>Back to Main Menu</a>
		<form method="POST" action="updateDisplay.php">
			<table>
				<tr><td>Last Updated:</td><td><?echo $date?></td><td>Updated By: </td><td><?echo $editor?></td></tr>
				<tr><td>File #:</td><td><input name="fileNumber" value="<?echo "$fileNumberDisplay";?>" type="text" maxlength="40" id="fileNumber" /></td><td>  </td><td></td><td></td></tr>
				<tr><td>*Program:</td><td><? echo $program?></td><td>  </td><td> *Zone:</td><td><? echo $zone ?></td></tr>
				<tr><td> Referral:</td><td> <? echo $referral?></select></td><td>   </td><td>  Waitlist:</td><td><? echo $waitlist ?></select></td></tr>
				<tr><td> Contact:</td><td><? echo $contact?></td><td></td>   <td></td><td></td></tr>
			</table> 
		
			<br/><br/>
			<table>
				<tr><td>Address:</td><td><textarea name="address" rows="2" cols="30" id="address" maxLength="200"><?echo "$addressDisplay";?></textarea></td></tr>
				<tr><td>APT #:</td><td><input type="text"  value="<?echo "$apartmentNumberDisplay";?>" name="apartmentNumber" maxLength="7"></td></tr>
				<tr><td>Postal Code:</td><td><input type="text" value="<?echo "$postalCodeDisplay";?>" name="postalCode" maxLength="8"></td></tr>
				<tr><td>*Phone Number:</td><td><input type="text" value="<?echo "$phoneNumberDisplay";?>" name="phoneNumber" maxLength="15"></td></tr>
				<tr><td>*Cell Number:</td><td><input type="text" value="<?echo "$cellNumberDisplay";?>" name="cellNumber" maxLength="15"></td></tr>
				<tr><td>*Email:</td><td><input type="text" value="<?echo "$emailDisplay";?>" name="email" maxLength="80"></td></tr>
			</table>
			
			<table>
				<tr><td></td><td>Name</td><td>Birth (DD/MM/YYYY)</td><td>Age</td><td>Gender</td></tr>
				<tr><td>Mother:</td> <td><input type="text" name="motherName" value="<?echo $motherNameDisplay?>" maxLength="50"></td> <td><input type="text" name="motherBirth" value="<?echo $motherBirthDateDisplay?>" maxLength="18"></td>  <td><? echo $motherAge ?></td><td><? echo $motherGender?></td></tr>
				<tr><td>Father:</td> <td><input type="text" name="fatherName" value="<?echo $fatherNameDisplay?>" maxLength="50"></td> <td><input type="text" name="fatherBirth" value="<?echo $fatherBirthdateDisplay?>" maxLength="18"></td>  <td><? echo $fatherAge ?></td><td><? echo $fatherGender?></td></tr>
				<tr><td>Marital Status:</td><td><? echo $marital?></td><td></td><td></td><td></td>
			</table><br />
			
			<? echo $children; ?>
			       <br />
		<div id="nsc">
			<table>
				<tr><td>Primary Concern:</td><td><? echo $concern?></td></tr>
				<tr><td>Support Requested:</td><td><? echo $support?></td></tr>
			</table>
		</div>
		<br/><br/>
		<div id="pj">
			<table>
				<tr><td>Outside Referrals:</td><td><? echo $referralOutside?></td></tr>
				<tr><td>Ending:</td><td><? echo $ending?></td></tr>
				<tr><td>Nature of Contact:</td><td><? echo $contactNature ?></td></tr>
				<tr><td>Family Plan:</td><td><?echo $familyPlan?></td></tr>
				<tr><td>Level of Family:</td><td><? echo $level?></td></tr>
			</table>
		</div>
				<div id="prenatal">
			PRENATAL
		</div>
		<div id="chip">
			CHIP
			<tr><td>Name:</td> <td><input type="text" name="name" maxLength="50"></td> <td>Birth:<input type="text" name="births" id="births" maxLength="18"></td>  <td>Age: <? echo $xAge ?></td><td>Gender: <? echo $xGender?></td></tr>
		</div>
		<div id="youth">
			YOUTH
		</div>
			<input type="hidden" name="op" value="ds">
			<p><input type="submit" name="submit" value="Send This Form">
		</form>

	</body>
</html>