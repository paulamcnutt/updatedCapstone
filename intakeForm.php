<?
      		if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		$currentProg=$_COOKIE['program'];
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		
					if (!isset($gender)){
						$gender="";
						$fatherGender="";
						$childGender1="";
						$age="";
						$waitlistOptions="";
					}
					
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
$motherGender= "<select name='motherGender'>".$gender."</select>";
$fatherGender= "<select name='fatherGender'>". $gender."</select>";
$xGender= "<select name='xGender'>". $gender."</select>";
$childGender1= "<select name='childGender1'>".$gender."</select>";
$childGender2= "<select name='childGender2'>".$gender."</select>";
$childGender3= "<select name='childGender3'>".$gender."</select>";
$childGender4= "<select name='childGender4'>".$gender."</select>";
$childGender5= "<select name='childGender5'>".$gender."</select>";
$childGender6= "<select name='childGender6'>".$gender."</select>";
$childGender7= "<select name='childGender7'>".$gender."</select>";
$childGender8= "<select name='childGender8'>".$gender."</select>";
$childGender9= "<select name='childGender9'>".$gender."</select>";
$childGender10= "<select name='childGender10'>".$gender."</select>";

$childGenders = [$childGender1,$childGender2,$childGender3,$childGender4,$childGender5,$childGender6,$childGender7,$childGender8,$childGender9,$childGender10];

//age
foreach ($ageItems as $ageItem) {
	 $age.= "<option>" .$ageItem->nodeValue . "</option>";
}
$motherAge= "<select name='motherAge'>".$age."</select>";
$fatherAge= "<select name='fatherAge'>".$age."</select>";
$xAge= "<select name='xAge'>".$age."</select>";
$childAge1= "<select name='childAge1'>".$age."</select>";
$childAge2= "<select name='childAge2'>".$age."</select>";
$childAge3= "<select name='childAge3'>".$age."</select>";
$childAge4= "<select name='childAge4'>".$age."</select>";
$childAge5= "<select name='childAge5'>".$age."</select>";
$childAge6= "<select name='childAge6'>".$age."</select>";
$childAge7= "<select name='childAge7'>".$age."</select>";
$childAge8= "<select name='childAge8'>".$age."</select>";
$childAge9= "<select name='childAge9'>".$age."</select>";
$childAge10= "<select name='childAge10'>".$age."</select>";

$childAges = [$childAge1,$childAge2,$childAge3,$childAge4,$childAge5,$childAge6,$childAge7,$childAge8,$childAge9,$childAge10];

//zone
$zone= "<select name='zone'>";
foreach ($zoneItems as $zoneItem) {
	 $zone.= "<option>" .$zoneItem->nodeValue . "</option>";
}
$zone.= "</select>";

//waitlist
foreach ($waitlistItems as $waitlistItem) {
	 $waitlistOptions.= "<option>" .$waitlistItem->nodeValue . "</option>";
}
$waitlist= "<select name='waitlist'>".$waitlistOptions."</select>";
$familyPlan="<select name='familyPlan'>".$waitlistOptions."</select>";
//program
$program= "<select name='program' id ='program' onchange='setUp()'>";
foreach ($programItems as $programItem) {
	if($programItem->nodeValue==$currentProg){
	 $program.= "<option value=\"".$programItem->nodeValue."\" selected>" .$programItem->nodeValue . "</option>";
	}else{
	 $program.= "<option value=\"".$programItem->nodeValue."\" >" .$programItem->nodeValue . "</option>";
	}
}
$program.= "</select>";

//referral
$referral= "<select name='referral'>";
foreach ($referralItems as $referralItem) {
	 $referral.= "<option>" .$referralItem->nodeValue . "</option>";
}
$referral.= "</select>";

//contact
$contact= "<select name='contact'>";
foreach ($contactItems as $contactItem) {
	 $contact.= "<option>" .$contactItem->nodeValue . "</option>";
}
$contact.= "</select>";

//concern
$concern= "<select name='concern'>";
foreach ($concernItems as $concernItem) {
	 $concern.= "<option>" .$concernItem->nodeValue . "</option>";
}
$concern.= "</select>";

//support
$support= "<select name='support'>";
foreach ($supportItems as $supportItem) {
	 $support.= "<option>" .$supportItem->nodeValue . "</option>";
}
$support.= "</select>";

//referralOutside
$referralOutside= "<select name='referralOutside'>";
foreach ($referralOutsideItems as $referralOutsideItem) {
	 $referralOutside.= "<option>" .$referralOutsideItem->nodeValue . "</option>";
}
$referralOutside.= "</select>";


//level
$level= "<select name='level'>";
foreach ($levelItems as $levelItem) {
	 $level.= "<option>" .$levelItem->nodeValue . "</option>";
}
$level.= "</select>";

//marital
$marital= "<select name='marital'>";
foreach ($maritalItems as $maritalItem) {
	 $marital.= "<option>" .$maritalItem->nodeValue . "</option>";
}
$marital.= "</select>";


//ending
$ending= "<select name='ending'>";
foreach ($endingItems as $endingItem) {
	 $ending.= "<option>" .$endingItem->nodeValue . "</option>";
}
$ending.= "</select>";

//contactNature
$contactNature= "<select name='contactNature'>";
foreach ($contactNatureItems as $contactNatureItem) {
	 $contactNature.= "<option>" .$contactNatureItem->nodeValue . "</option>";
}
$contactNature.= "</select>";

	$children="<table><tr><td></td><td>Child</td><td>Birth date (dd/mm/yyyy)</td><td>Age</td><td>Gender</td></tr>";
	$age="";
	$i=0;
	
for ($i=1;$i<=10;$i++){
	$children.="<tr><td>Child #".$i."</td>
				<td><input name='childName".$i."' type=\"text\" maxlength=\"50\" id='childName".$i."' /></td>
				<td><input name='childBirth".$i."' type=\"text\" maxlength=\"50\" id='childBirth".$i."' /></td>";
	
	$children.="<td>".$childAges[$i-1]."</td>";
	$children.="<td>".$childGenders[$i-1]."</td></tr>";
	
				
}
$children.="</table>";

	
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="generalStyles.css">
		<link rel='shortcut icon' href='favicon.ico'>
		<script type="text/javascript">
		function setUp(){
			hideAll();
			if(document.getElementById("program").value=="Parenting Journey"){
				document.getElementById("pj").style.display="block";
			}else if(document.getElementById("program").value=="Native Social Counselling Agency"){
				document.getElementById("nsc").style.display="block";
			}else if(document.getElementById("program").value=="CHIP"){
				document.getElementById("chip").style.display="block";
			}else if(document.getElementById("program").value=="Pre-natal"){
				document.getElementById("prenatal").style.display="block";
			}else{
				document.getElementById("youth").style.display="block";
			}
		}
			function hideAll(){
				document.getElementById("pj").style.display="none";
				document.getElementById("nsc").style.display="none";
				document.getElementById("chip").style.display="none";
				document.getElementById("prenatal").style.display="none";
				document.getElementById("youth").style.display="none";
			}
		</script>
		<title>Native Council of Nova Scotia Intake Form</title>
	</head>
	<body onload="setUp()">
		<h1>Native Council of Nova Scotia Intake Form</h1>
		<a href='Menu.php'>Back to Main Menu</a>
		<form method="POST" action="addedIntake.php">
			<table> 
				<tr><td>File #:</td><td><input name="fileNumber" type="text" maxlength="40" id="fileNumber" /></td><td>  </td><td></td><td></td></tr>
				<tr><td>*Program:</td><td><? echo $program?></td><td>  </td><td> *Zone:</td><td><? echo $zone ?></td></tr>
				<tr><td> Referral:</td><td> <? echo $referral?></select></td><td>   </td><td>  Waitlist:</td><td><? echo $waitlist ?></select></td></tr>
				<tr><td> Contact:</td><td><? echo $contact?></td><td></td>   <td></td><td></td></tr>
			</table> 
		
			<br/><br/>
			<table>
				<tr><td>Address:</td><td><textarea name="address" rows="5" cols="25" id="address" maxLength="200"></textarea></td></tr>
				<tr><td>APT #:</td><td><input type="text" name="apartmentNumber" maxLength="7"></td></tr>
				<tr><td>Postal Code:</td><td><input type="text" name="postalCode" maxLength="8"></td></tr>
				<tr><td>*Phone Number:</td><td><input type="text" name="phoneNumber" maxLength="15"></td></tr>
				<tr><td>*Cell Number:</td><td><input type="text" name="cellNumber" maxLength="15"></td></tr>
				<tr><td>*Email:</td><td><input type="text" name="email" maxLength="80"></td></tr>
			</table>
			<table>
				<tr><td></td><td>Name</td><td>Birth (DD/MM/YYYY)</td><td>Age</td><td>Gender</td></tr>
				<tr><td>Mother:</td> <td><input type="text" name="motherName" maxLength="50"></td> <td><input type="text" name="motherBirth" maxLength="18"></td>  <td><? echo $motherAge ?></td><td><? echo $motherGender?></td></tr>
				<tr><td>Father:</td> <td><input type="text" name="fatherName" maxLength="50"></td> <td><input type="text" name="fatherBirth" maxLength="18"></td>  <td><? echo $fatherAge ?></td><td><? echo $fatherGender?></td></tr>
				<tr><td>Marital Status:</td><td><? echo $marital?></td><td></td><td></td><td></td>
			</table><br />
			<br/>
			<br/>
			<? echo $children; ?>
			       <br /><br />
		<div id="nsc">
			<table>
			
				<tr><td>Primary Concern:</td><td><? echo $concern?></td></tr>
				<tr><td>Support Requested:</td><td><? echo $support?></td></tr>
			</table>
		</div>
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
			<p><input type="submit" name="submit" value="Send This Form">
		</form>

	</body>
</html>