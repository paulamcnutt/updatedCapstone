	
<? 
	    if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		$currentProg=$_COOKIE['program'];
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
	//program
	
				if (!isset($waitlistOptions)){
						$waitlistOptions="";
					}
	$itemXML=new DOMDocument;
	$itemXML->load('data.xml');
	$xpath = new DOMXPath($itemXML);
	$programItems = $xpath->query('/dataFields/items[@id="program"]/item');
	$contactItems = $xpath->query('/dataFields/items[@id="contact"]/item');
	$referralItems = $xpath->query('/dataFields/items[@id="referral"]/item');
	$referralOutsideItems = $xpath->query('/dataFields/items[@id="referralOutside"]/item');
	$concernItems = $xpath->query('/dataFields/items[@id="concern"]/item');
	$supportItems = $xpath->query('/dataFields/items[@id="support"]/item');
	$referralOutsideItems = $xpath->query('/dataFields/items[@id="referralOutside"]/item');
	$endingItems = $xpath->query('/dataFields/items[@id="ending"]/item');
	$contactNatureItems = $xpath->query('/dataFields/items[@id="contactNature"]/item');
	$waitlistItems = $xpath->query('/dataFields/items[@id="waitlist"]/item');
	$nscFormItems = $xpath->query('/dataFields/items[@id="nscForm"]/item');	
	$pjFormItems = $xpath->query('/dataFields/items[@id="pjForm"]/item');
	$reReferralItems=$xpath->query('/dataFields/items[@id="reReferrals"]/item');
	
	$pjForms= "<select name='pjForms' id ='pjForms' onchange='setUp()'>";
	foreach ($pjFormItems as $pjFormItem) {
		 $pjForms.= "<option value=\"".$pjFormItem->nodeValue."\" >" .$pjFormItem->nodeValue . "</option>";
	}
	$pjForms.= "</select>";
	
	$nscForms= "<select name='nscForms' id ='nscForms' onchange='setUp()'>";
	foreach ($nscFormItems as $nscFormItem) {
		 $nscForms.= "<option value=\"".$nscFormItem->nodeValue."\" >" .$nscFormItem->nodeValue . "</option>";
	}
	$nscForms.= "</select>";

	$program= "<select name='program' id ='program' onchange='setUp()'>";
	foreach ($programItems as $programItem) {
	if($programItem->nodeValue==$currentProg){
	 $program.= "<option value=\"".$programItem->nodeValue."\" selected>" .$programItem->nodeValue . "</option>";
	}else{
	 $program.= "<option value=\"".$programItem->nodeValue."\" >" .$programItem->nodeValue . "</option>";
	}
	}
	$program.= "</select>";
	
	//contact
$contact= "<select name='contact'>";
foreach ($contactItems as $contactItem) {
	 $contact.= "<option>" .$contactItem->nodeValue . "</option>";
}
$contact.= "</select>";

//referral
$referral= "<select name='referral'>";
foreach ($referralItems as $referralItem) {
	 $referral.= "<option>" .$referralItem->nodeValue . "</option>";
}
$referral.= "</select>";


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

//ending
$ending= "<select name='ending'>";
foreach ($endingItems as $endingItem) {
	 $ending.= "<option>" .$endingItem->nodeValue . "</option>";
}
$ending.= "</select>";

//rereferral
$reReferral= "<select name='reReferral'>";
foreach ($reReferralItems as $reReferralItem) {
	 $reReferral.= "<option>" .$reReferralItem->nodeValue . "</option>";
}
$reReferral.= "</select>";


//contactNature
$contactNature= "<select name='contactNature'>";
foreach ($contactNatureItems as $contactNatureItem) {
	 $contactNature.= "<option>" .$contactNatureItem->nodeValue . "</option>";
}
$contactNature.= "</select>";

//waitlist
foreach ($waitlistItems as $waitlistItem) {
	 $waitlistOptions.= "<option>" .$waitlistItem->nodeValue . "</option>";
}
$familyPlan="<select name='familyPlan'>".$waitlistOptions."</select>";
 ?>
<html>
	<head>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript">
		function setUp(){
			CKEDITOR.replace('notes');
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
				<link rel="stylesheet" type="text/css" href="generalStyles.css">
				<link rel='shortcut icon' href='favicon.ico'>
	</head>
	<body onload="setUp()">
	<a href='Menu.php'>Back to Main Menu</a><br/>
	<form method="POST" action="addedContact.php">
		<table>
			<tr><td>File Number: </td><td><input type="text" id="fileNumber" name="fileNumber"/></td></tr>
			<tr><td>Name:</td><td><input type="text" id="name" name="name"/></td></tr>
			<tr><td>Program:  </td><td><? echo $program ?></td></tr>
			<tr><td>Contact:  </td><td><? echo $contact ?></td></tr>
			<tr><td>Referral:  </td><td><? echo $referral ?></td></tr>
			<tr><td>Re Referral: </td><td><? echo $reReferral ?></td></tr>
		</table>
		<div id="pj">
		<table>
			<tr><td>Outside Referral: </td><td> <? echo $referralOutside ?></td></tr>
			<tr><td>PJ Form Completed: </td><td> <? echo $pjForms ?></td></tr>
			<tr><td>Ending: </td><td><? echo $ending ?></td></tr>
			<tr><td>Nature of Contact: </td><td><? echo $contactNature ?></td></tr>
			<tr><td>Family Plan: </td><td><? echo $familyPlan ?></td></tr>
		</table>
		</div>
		<div id="chip">
		</div>
		<div id="prenatal">
		</div>
		<div id="youth">
		</div>
		<div id="nsc">
		<table>
			<tr><td>Primary Concern: </td><td> <? echo $concern ?></td></tr>
			<tr><td>Support Requested: </td><td> <? echo $support ?></td></tr>
			<tr><td>NSC Forms: </td><td> <? echo $nscForms ?></td></tr>
		</table>
		</div>
		
		<div>
		Notes:<br/>
		<textarea id="notes" name="notes" rows="10" cols="50"></textarea><br/>
		<input type="submit" id="btnSubmit" value="Submit"/>
		</div>
	</form>
	</body>
</html>