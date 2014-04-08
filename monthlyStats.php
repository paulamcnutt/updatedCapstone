<? 
      	if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		$currentProg=$_COOKIE['program'];		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		$reportedMonth=$_POST['month'];
		$reportedYear=$_POST['year'];
		$monthReporting= "Month Reported: ".$reportedMonth . "/".$reportedYear;
	//program
	$itemXML=new DOMDocument;
	$itemXML->load('data.xml');
	$xpath = new DOMXPath($itemXML);
	$programItems = $xpath->query('/dataFields/items[@id="program"]/item');
	$program= "<select name='program' id ='program' onchange='setUp()'>";
	foreach ($programItems as $programItem) {
		if($programItem->nodeValue==$currentProg){
	 $program.= "<option value=\"".$programItem->nodeValue."\" selected>" .$programItem->nodeValue . "</option>";
	}else{
	 $program.= "<option value=\"".$programItem->nodeValue."\" >" .$programItem->nodeValue . "</option>";
	}
	}
	$program.= "</select>";
	
	
		$db_name="pmcnutt";
		$table_name="intake";
		$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);
			/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$countSelf=0;$countCommunity=0;$countDoctor=0;$countServiceProvider=0;$countPublicHealth=0;$countSchool=0;$countMental=0;$countNCNS=0;$countAborg=0;$countHousing=0;$countDiabetes=0;$countHumanRights=0;$countFamilyBenefits=0;$countPrenatal=0;$countEducation=0;$countMedicalService=0;$countChildAbuse=0;$countEmployment=0;$countDrug=0;$countParenting=0;$countEmergency=0;$countSpousalAbuse=0;$countTransportation=0;$countHealthConcern=0;$countLegalIssues=0;$countIncome=0;$countOtherConcern=0;$countEmergencyFood=0;$countHome=0;$countPhone=0;$countOffice=0;$countEmail=0;$countAccompanied=0;$countCollaborativeFamily=0;$countCollaborative=0;$countLegal=0;$countContactOther=0;	$countEndingContact=0;$countEndingEligible=0;$countEndingRelocation=0;$countEndingRequest=0;$countEndingOther=0;$countWaitlist=0;$countTotalFamilyPlan=0; $countCYDev=0;$countAttachment=0;$countParenting=0;$countFLMan=0;$countFWR=0;$countSC=0;$countLegal=0;$countNatureOther=0;$countMH=0;$countAddictions=0;$countFoodBank=0;$countCommServices=0;$countFamResource=0;$countORNSC=0;$countOROther=0;$numFamilies=0;$countFam1=0;$countFam2=0;$countFam3=0;$countZone1=0;$countZone2=0;$countZone3=0;$countZone4=0;$countZone5=0;$countZone6=0;$countZone7=0;$countZone8=0;$countZone9=0;$countZone10=0;$countZone11=0;$countZone12=0;$countNAborg=0;$countNNCNS=0;$countNMental=0;$countNSchool=0;$countNPublicHealth=0;$countNServiceProvider=0;$countNDoctor=0;$countNCommunity=0;$countNSelf=0;$age6=0;$age17=0;$age25=0;$age40=0;$age65=0;$age66=0;$countLegalNature=0;$caseLoad=0;$countNPhone=0;$countNHomeVisit=0;$countNoffice=0;$countNEmail=0;$countNOtherContact=0;$supportWithProfessional=0;$supportWithGroup=0;$supportWithLegal=0;$supportWithOther=0;$countAdult6=0;$countAdult16=0;$countAdult25=0;$countAdult40=0;$countAdult65=0;$countAdult66=0;
$newClient=0;$recurringClient=0;
	//here
	
	
	$mysqli->select_db($db_name);
	//get everyone on waitlist for PJ program
	$sql ="SELECT * FROM $table_name WHERE ProgramName='Parenting Journey'";
	
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	
	while ($row = mysqli_fetch_array($result)) {	
	if ($row['waitlist']=="Yes"){
			$countWaitlist+=1;
		}
	}
	//current month/year PJ
	$sql ="SELECT * FROM $table_name WHERE date BETWEEN '$reportedYear-$reportedMonth-00 00:00:00' AND '$reportedYear-$reportedMonth-31 23:59:59'  AND ProgramName='Parenting Journey'";
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	while ($row = mysqli_fetch_array($result)) {
		$caseLoad+=1;
		$numFamilies+=1;
		if ($row['referral']!=""){
			if($row['referral']=="Self"){
				$countSelf+=1;
			}elseif($row['referral']=="Community Services"){
				$countCommunity+=1;
			}elseif($row['referral']=="Family Doctor"){
				$countDoctor+=1;
			}elseif($row['referral']=="Community Service Provider"){
				$countServiceProvider+=1;
			}elseif($row['referral']=="Public Health"){
				$countPublicHealth+=1;
			}elseif($row['referral']=="School"){
				$countSchool+=1;
			}elseif($row['referral']=="Mental Health"){
				$countMental+=1;
			}elseif($row['referral']=="NCNS"){
				$countNCNS+=1;
			}else{
				$countAborg+=1;
			}
		}
		if ($row['contact']!=""){
			if($row['contact']=="Home Visit"){
				$countHome+=1;
			}elseif($row['contact']=="Phone, Text Message"){
				$countPhone+=1;
			}elseif($row['contact']=="Office"){
				$countOffice+=1;
			}elseif($row['contact']=="Email, Letter"){
				$countEmail+=1;
			}elseif($row['contact']=="Accompanied appointment"){
				$countAccompanied+=1;
			}elseif($row['contact']=="Collaborative mtg w family"){
				$countCollaborativeFamily+=1;
			}elseif($row['contact']=="Collaborative mtg w/o family"){
				$countCollaborative+=1;
			}elseif($row['contact']=="Legal"){
				$countLegal+=1;
			}else{
				$countContactOther+=1;
			}
		}
		if ($row['ending']!=""){
			if($row['ending']=="No contact"){
				$countEndingContact+=1;
			}elseif($row['ending']=="No longer Eligible"){
				$countEndingEligible+=1;
			}elseif($row['ending']=="Relocation"){
				$countEndingRelocation+=1;
			}elseif($row['ending']=="Service No longer requested"){
				$countEndingRequest+=1;
			}else{
				$countEndingOther+=1;
			}
		}

		if ($row['familyPlan']=="Yes"){
			$countTotalFamilyPlan+=1;
		}
		if ($row['contactNature']!=""){
			if ($row['contactNature']=="Child/Youth Development"){
				$countCYDev+=1;
			}elseif($row['contactNature']=="Attachment"){
				$countAttachment+=1;
			}elseif($row['contactNature']=="Parenting"){
				$countParenting+=1;
			}elseif($row['contactNature']=="Family Life Management"){
				$countFLMan+=1;
			}elseif($row['contactNature']=="Family Wellness/Relationships"){
				$countFWR+=1;
			}elseif($row['contactNature']=="Social Community Networks"){
				$countSC+=1;
			}elseif($row['contactNature']=="Legal"){
				$countLegalNature+=1;
			}else{
				$countNatureOther+=1;
			}
		}
		if ($row['outsideReferrals']!=""){
			if ($row['outsideReferrals']=="Mental Health"){
				$countMH+=1;
			}elseif($row['outsideReferrals']=="Addictions"){
				$countAddictions+=1;
			}elseif($row['outsideReferrals']=="Food Bank"){
				$countFoodBank+=1;
			}elseif($row['outsideReferrals']=="Community Services"){
				$countCommServices+=1;
			}elseif($row['outsideReferrals']=="Family Resource Center"){
				$countFamResource+=1;
			}elseif($row['outsideReferrals']=="NSC"){
				$countORNSC+=1;
			}else{
				$countOROther+=1;
			}
		}		
		if ($row['familyLevel']!=""){
			if ($row['familyLevel']=="Level #1"){
				$countFam1+=1;
			}elseif($row['familyLevel']=="Level #2"){
				$countFam2+=1;
			}else{
				$countFam3+=1;
			}
		}
	}
	

	//nsc
	//NSC intake this month/year
	$sql ="SELECT * FROM $table_name WHERE date BETWEEN '$reportedYear-$reportedMonth-00 00:00:00' AND '$reportedYear-$reportedMonth-31 23:59:59' AND ProgramName='Native Social Counselling Agency'";
	// echo $sql
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	while ($row = mysqli_fetch_array($result)) {
		if($row['motherAge']!=""){
			if($row['motherAge']=="0--3 yrs"){
				$countAdult6+=1;
			}elseif($row['motherAge']=="3--6 yrs"){
				$countAdult6+=1;
			}elseif($row['motherAge']=="7--16 yrs"){
				$countAdult16+=1;
			}elseif($row['motherAge']=="17--25 yrs"){
				$countAdult25+=1;
			}elseif($row['motherAge']=="26--40 yrs"){
				$countAdult40+=1;
			}elseif($row['motherAge']=="41--65 yrs"){
				$countAdult65+=1;
			}elseif($row['motherAge']=="65+ yrs"){
				$countAdult66+=1;
			}
		}
		if($row['fatherAge']!=""){
			if($row['fatherAge']=="0--3 yrs"){
				$countAdult6+=1;
			}elseif($row['fatherAge']=="3--6 yrs"){
				$countAdult6+=1;
			}elseif($row['fatherAge']=="7--16 yrs"){
				$countAdult16+=1;
			}elseif($row['fatherAge']=="17--25 yrs"){
				$countAdult25+=1;
			}elseif($row['fatherAge']=="26--40 yrs"){
				$countAdult40+=1;
			}elseif($row['fatherAge']=="41--65 yrs"){
				$countAdult65+=1;
			}elseif($row['fatherAge']=="65+ yrs"){
				$countAdult66+=1;
			}
		}
		if($row['primaryConcern']!=""){
				if($row['primaryConcern']=="Housing"){
					$countHousing+=1;
				}elseif($row['primaryConcern']=="Diabetes"){
					$countDiabetes+=1;
				}elseif($row['primaryConcern']=="Human Rights"){
					$countHumanRights+=1;
				}elseif($row['primaryConcern']=="Family Benefits"){
					$countFamilyBenefits+=1;
				}elseif($row['primaryConcern']=="Prenatal/Post Natal"){
					$countPrenatal+=1;
				}elseif($row['primaryConcern']=="Education"){
					$countEducation+=1;
				}elseif($row['primaryConcern']=="Medical Service"){
					$countMedicalService+=1;
				}elseif($row['primaryConcern']=="Child Abuse/Neglect"){
					$countChildAbuse+=1;
				}elseif($row['primaryConcern']=="Employment"){
					$countEmployment+=1;
				}elseif($row['primaryConcern']=="Alcohol/Drug"){
					$countDrug+=1;
				}elseif($row['primaryConcern']=="Parenting"){
					$countParenting+=1;
				}elseif($row['primaryConcern']=="Emergency Shelter"){
					$countEmergency+=1;
				}elseif($row['primaryConcern']=="Emergency Food"){
					$countEmergencyFood+=1;
				}elseif($row['primaryConcern']=="Spousal Abuse"){
					$countSpousalAbuse+=1;
				}elseif($row['primaryConcern']=="Transportation"){
					$countTransportation+=1;
				}elseif($row['primaryConcern']=="Health Concern"){
					$countHealthConcern+=1;
				}elseif($row['primaryConcern']=="Legal Issues"){
					$countLegalIssues+=1;
				}elseif($row['primaryConcern']=="Income Assist."){
					$countIncome+=1;
				}else{
					$countOtherConcern+=1;
				}
			}	
		if($row['zone']!=""){
				if($row['zone']=="Zone #1 Colchester, Cumberland, Pictou"){
					$countZone1+=1;
				}elseif($row['zone']=="Zone #2 Hants County"){
					$countZone2+=1;
				}elseif($row['zone']=="Zone #3 Halifax"){
					$countZone3+=1;
				}elseif($row['zone']=="Zone #4 Annapolis, Digby"){
					$countZone4+=1;
				}elseif($row['zone']=="Zone #5 Lunenburg"){
					$countZone5+=1;
				}elseif($row['zone']=="Zone #6 Cape Breton"){
					$countZone6+=1;
				}elseif($row['zone']=="Zone #7 Antigonish, Inverness,Richmond, Guysborough"){
					$countZone7+=1;
				}elseif($row['zone']=="Zone #8 Yarmouth, Shelburne"){
					$countZone8+=1;
				}elseif($row['zone']=="Zone #9 Queens County"){
					$countZone9+=1;
				}elseif($row['zone']=="Zone #10 Kings County"){
					$countZone10+=1;
				}elseif($row['zone']=="Zone #11 Sheet Harbour"){
					$countZone11+=1;
				}else{
					$countZone12+=1;
				}
		}
		if ($row['referral']!=""){
			if($row['referral']=="Self"){
				$countNSelf+=1;
			}elseif($row['referral']=="Community Services"){
				$countNCommunity+=1;
			}elseif($row['referral']=="Family Doctor"){
				$countNDoctor+=1;
			}elseif($row['referral']=="Community Service Provider"){
				$countNServiceProvider+=1;
			}elseif($row['referral']=="Public Health"){
				$countNPublicHealth+=1;
			}elseif($row['referral']=="School"){
				$countNSchool+=1;
			}elseif($row['referral']=="Mental Health"){
				$countNMental+=1;
			}elseif($row['referral']=="NCNS"){
				$countNNCNS+=1;
			}else{
				$countNAborg+=1;
			}
		}
		if ($row['contact']!=""){
			if($row['contact']=="Phone, Text Message"){
				$countNPhone+=1;
			}elseif($row['contact']=="Home Visit"){
				$countNHomeVisit+=1;
			}elseif($row['contact']=="Office"){
				$countNoffice+=1;
			}elseif($row['contact']=="Email, Letter"){
				$countNEmail+=1;
			}else{
				$countNOtherContact+=1;
			}
		
		}
		if ($row['supportRequested']!=""){
			if($row['supportRequested']=="W Professional"){
				$supportWithProfessional+=1;
			}elseif($row['supportRequested']=="W Group Consultation"){
				$supportWithGroup+=1;
			}elseif($row['supportRequested']=="W Legal/Court"){
				$supportWithLegal+=1;
			}else{
				$supportWithOther+=1;
			}
		
		}
		$newClient+=1;
	}
	$sql ="SELECT * FROM children WHERE date BETWEEN '$reportedYear-$reportedMonth-00 00:00:00' AND '$reportedYear-$reportedMonth-31 23:59:59' AND program='Native Social Counselling Agency'";
	// echo $sql
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	while ($row = mysqli_fetch_array($result)) {
		if($row['age']!=""){
			if($row['age']=="0--3 yrs"){
						$age6+=1;
					}elseif($row['age']=="3--6 yrs"){
						$age6+=1;
					}elseif($row['age']=="7--16 yrs"){
						$age17+=1;
					}elseif($row['age']=="17--25 yrs"){
						$age25+=1;
					}elseif($row['age']=="26--40 yrs"){
						$age40+=1;
					}elseif($row['age']=="41--65 yrs"){
						$age65+=1;
					}elseif($row['age']=="65+ yrs"){
						$age66+=1;
					}
					
		}	
	}
	//pj contact 
	$sql ="SELECT * FROM contact WHERE date BETWEEN '$reportedYear-$reportedMonth-00 00:00:00' AND '$reportedYear-$reportedMonth-31 23:59:59' AND program='Parenting Journey'";
	//echo $sql;
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	while ($row = mysqli_fetch_array($result)) {
		if($row['contact']!=""){
			if($row['contact']=="Home Visit"){
				$countHome+=1;
			}elseif($row['contact']=="Phone, Text Message"){
				$countPhone+=1;
			}elseif($row['contact']=="Office"){
				$countOffice+=1;
			}elseif($row['contact']=="Email, Letter"){
				$countEmail+=1;
			}elseif($row['contact']=="Accompanied appointment"){
				$countAccompanied+=1;
			}elseif($row['contact']=="Collaborative mtg w family"){
				$countCollaborativeFamily+=1;
			}elseif($row['contact']=="Collaborative mtg w/o family"){
				$countCollaborative+=1;
			}elseif($row['contact']=="Legal"){
				$countLegal+=1;
			}elseif($row['contact']=="Other"){
				$countContactOther+=1;
			}
		}
		if ($row['referral']!=""){
		if($row['referral']=="Self"){
				$countSelf+=1;
			}elseif($row['referral']=="Community Services"){
				$countCommunity+=1;
			}elseif($row['referral']=="Family Doctor"){
				$countDoctor+=1;
			}elseif($row['referral']=="Community Service Provider"){
				$countServiceProvider+=1;
			}elseif($row['referral']=="Public Health"){
				$countPublicHealth+=1;
			}elseif($row['referral']=="School"){
				$countSchool+=1;
			}elseif($row['referral']=="Mental Health"){
				$countMental+=1;
			}elseif($row['referral']=="NCNS"){
				$countNCNS+=1;
			}else{
				$countAborg+=1;
			}
		}
		if ($row['contactNature']!=""){
				if ($row['contactNature']=="Child/Youth Development"){
					$countCYDev+=1;
				}elseif($row['contactNature']=="Attachment"){
					$countAttachment+=1;
				}elseif($row['contactNature']=="Parenting"){
					$countParenting+=1;
				}elseif($row['contactNature']=="Family Life Management"){
					$countFLMan+=1;
				}elseif($row['contactNature']=="Family Wellness/Relationships"){
					$countFWR+=1;
				}elseif($row['contactNature']=="Social Community Networks"){
					$countSC+=1;
				}elseif($row['contactNature']=="Legal"){
					$countLegalNature+=1;
				}else{
					$countNatureOther+=1; 
				}
			}
		if ($row['outsideReferrals']!=""){
			if ($row['outsideReferrals']=="Mental Health"){
				$countMH+=1;
			}elseif($row['outsideReferrals']=="Addictions"){
				$countAddictions+=1;
			}elseif($row['outsideReferrals']=="Food Bank"){
				$countFoodBank+=1;
			}elseif($row['outsideReferrals']=="Community Services"){
				$countCommServices+=1;
			}elseif($row['outsideReferrals']=="Family Resource Center"){
				$countFamResource+=1;
			}elseif($row['outsideReferrals']=="NSC"){
				$countORNSC+=1;
			}else{
				$countOROther+=1;
			}
		}	
	}
	$totalFollowUps=0;
	//contact NSC
		$sql ="SELECT * FROM contact WHERE date BETWEEN '$reportedYear-$reportedMonth-00 00:00:00' AND '$reportedYear-$reportedMonth-31 23:59:59' AND program='Native Social Counselling Agency'";
	// echo $sql
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	while ($row = mysqli_fetch_array($result)) {
		$totalFollowUps+=1;
		if ($row['contact']!=""){
			if($row['contact']=="Phone, Text Message"){
				$countNPhone+=1;
			}elseif($row['contact']=="Home Visit"){
				$countNHomeVisit+=1;
			}elseif($row['contact']=="Office"){
				$countNoffice+=1;
			}elseif($row['contact']=="Email, Letter"){
				$countNEmail+=1;
			}else{
				$countNOtherContact+=1;
			}
		
		}
		if ($row['supportRequested']!=""){
			if($row['supportRequested']=="W Professional"){
				$supportWithProfessional+=1;
			}elseif($row['supportRequested']=="W Group Consultation"){
				$supportWithGroup+=1;
			}elseif($row['supportRequested']=="W Legal/Court"){
				$supportWithLegal+=1;
			}else{
				$supportWithOther+=1;
			}
		
		}
		if($row['primaryConcern']!=""){
				if($row['primaryConcern']=="Housing"){
					$countHousing+=1;
				}elseif($row['primaryConcern']=="Diabetes"){
					$countDiabetes+=1;
				}elseif($row['primaryConcern']=="Human Rights"){
					$countHumanRights+=1;
				}elseif($row['primaryConcern']=="Family Benefits"){
					$countFamilyBenefits+=1;
				}elseif($row['primaryConcern']=="Prenatal/Post Natal"){
					$countPrenatal+=1;
				}elseif($row['primaryConcern']=="Education"){
					$countEducation+=1;
				}elseif($row['primaryConcern']=="Medical Service"){
					$countMedicalService+=1;
				}elseif($row['primaryConcern']=="Child Abuse/Neglect"){
					$countChildAbuse+=1;
				}elseif($row['primaryConcern']=="Employment"){
					$countEmployment+=1;
				}elseif($row['primaryConcern']=="Alcohol/Drug"){
					$countDrug+=1;
				}elseif($row['primaryConcern']=="Parenting"){
					$countParenting+=1;
				}elseif($row['primaryConcern']=="Emergency Shelter"){
					$countEmergency+=1;
				}elseif($row['primaryConcern']=="Emergency Food"){
					$countEmergencyFood+=1;
				}elseif($row['primaryConcern']=="Spousal Abuse"){
					$countSpousalAbuse+=1; 
				}elseif($row['primaryConcern']=="Transportation"){
					$countTransportation+=1;
				}elseif($row['primaryConcern']=="Health Concern"){
					$countHealthConcern+=1;
				}elseif($row['primaryConcern']=="Legal Issues"){
					$countLegalIssues+=1;
				}elseif($row['primaryConcern']=="Income Assist."){
					$countIncome+=1;
				}else{
					$countOtherConcern+=1;
				}
			}
		if ($row['referral']!=""){
				if($row['referral']=="Self"){
					$countNSelf+=1;
				}elseif($row['referral']=="Community Services"){
					$countNCommunity+=1;
				}elseif($row['referral']=="Family Doctor"){
					$countNDoctor+=1;  
				}elseif($row['referral']=="Community Service Provider"){
					$countNServiceProvider+=1;
				}elseif($row['referral']=="Public Health"){
					$countNPublicHealth+=1;
				}elseif($row['referral']=="School"){ 
					$countNSchool+=1;
				}elseif($row['referral']=="Mental Health"){
					$countNMental+=1;
				}elseif($row['referral']=="NCNS"){
					$countNNCNS+=1;
				}else{
					$countNAborg+=1;
				}
			}
	}
	
	$sql ="SELECT DISTINCT fileNumber FROM contact WHERE date BETWEEN '$reportedYear-$reportedMonth-00 00:00:00' AND '$reportedYear-$reportedMonth-31 23:59:59' AND program='Native Social Counselling Agency'";
	$result = $mysqli->query($sql)or die ('Unable to execute query');
	while ($row = mysqli_fetch_array($result)) {
		$recurringClient++;
	}
	
	$totalAdultAges=($countAdult6+$countAdult16+$countAdult25+$countAdult40+$countAdult65+$countAdult66);
	$totalChildAges=($age6+$age17+$age25+$age40+$age65+$age66);
	$total6=($countAdult6+$age6);
	$total17=($countAdult16+$age17);
	$total25=($countAdult25+$age25);
	$total40=($countAdult40+$age40);	
	$total65=($countAdult65+$age65);
	$total66=($countAdult66+$age66);
	$totalTotals=($total6+$total17+$total25+$total40+$total65+$total66);
	
	//$totalReferrals=($countSelf+$countCommunity+$countDoctor+$countServiceProvider+$countPublicHealth+$countSchool+$countMental+$countNCNS+$countAborg);
	$totalEnding = ($countEndingContact + $countEndingEligible + $countEndingRelocation + $countEndingRequest + $countEndingOther);
	$totalContacts =($countHome+$countPhone+$countOffice+$countEmail+$countAccompanied+$countCollaborativeFamily+$countCollaborative+$countLegal+$countContactOther);
	$totalContactNature=($countCYDev+$countAttachment+$countParenting+$countFLMan+$countFWR+$countSC+$countLegal+$countNatureOther);
	
	
	
	
	
	
	
	?>
<html>
	<head>
	<link rel='shortcut icon' href='favicon.ico'> 
	<link rel="stylesheet" type="text/css" href="stats.css">
	<link rel="stylesheet" type="text/css" href="generalStyles.css">
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
	</head>
	<body onload="setUp()">
	<a href='Menu.php'>Back to Main Menu</a><br/>
	Program: <? echo $program ?><br/>
	<?echo $monthReporting?> 
	<div id="pj">
		<h1>PARENTING JOURNEY MONTHLY STATS</h1>
		<table>
			<tr><td>Location</td><td>Kms</td></tr>
			<tr><td>Current Caseload: <? echo $caseLoad ?></td><td>Current Waitlist: <? echo $countWaitlist ?></td></tr>
		</table>
		<table>
			<tr><td># of level 1 Families: <? echo $countFam1 ?></td><td># of level 2 families: <? echo $countFam2 ?></td><td># of level 3 families: <? echo $countFam3 ?></td></tr>
			<tr><td></td><td></td><td></td></tr>
		</table>
		<table>
			<tr><td># of Families</td><td><? echo $numFamilies ?></td><td># of Children</td><td></td><td># of families with family plans</td><td><? echo $countTotalFamilyPlan ?></td></tr>		
		</table>
		<table>
			<tr><td># of children 3-5 years</td><td># of children 6-11 years</td><td># of children 12-16 years</td></tr>
			<tr><td></td><td></td><td></td></tr>
		</table>
		<br/>
		<b>Referral Information - Referral Sources</b><br/>
		<table>
		<!--<? //echo $totalReferrals ?>-->
			<tr><td>Total # of families Referred</td><td></td><td>Total # of Re-referrals</td><td></td></tr>
			<tr><td>Self</td> <td><? echo $countSelf ?></td><td>Public Health</td> <td> <? echo $countPublicHealth ?></tr>
			<tr><td>Community Services</td> <td><? echo $countCommunity ?></td><td>Schools</td> <td><? echo $countSchool ?> </td></tr>
			<tr><td>Family Doctor</td> <td> <? echo $countDoctor ?></td><td>Mental Health Services</td> <td> <? echo $countMental ?></td></tr>
			<tr><td>Community Service Provider</td> <td> <? echo $countServiceProvider ?></td><td>NCNS:</td> <td> <? echo $countNCNS ?></td></tr>
			<tr><td>Aboriginal group\Transition:</td> <td> <? echo $countAborg ?></td></tr>
		</table>
		<br/>
		<b>Other as in other reason -see sheet
		Participation Ending - Reasons</b>
		<table>
			<tr><td>Total # of Families No Longer Participating in PJ</td><td><? echo $totalEnding ?></td><td>Relocation</td><td><? echo $countEndingRelocation ?></td></tr>
			<tr><td>No contact</td><td><? echo $countEndingContact ?></td><td>Services no longer requested</td><td><? echo $countEndingRequest ?></td></tr>
			<tr><td>No longer eligible</td><td><? echo $countEndingEligible ?></td><td>Other:</td><td><? echo $countEndingOther ?></td></tr>		
		</table>
		<br/>
		<b>Activity Summary</b>
		<table>
			<tr><td>Total # of Family Contacts</td><td><? echo $totalContacts?></td><td>Nature of Visits/Contacts</td><td><? echo $totalContactNature?></td></tr>
			<tr><td># of Home Visits</td><td><? echo $countHome ?></td><td>Child/Youth Development</td><td><? echo $countCYDev?></td></tr>
			<tr><td># of Phone, Text Messages</td><td><? echo $countPhone ?></td><td>Attachment</td><td><? echo $countAttachment?></td></tr>
			<tr><td>Office</td><td><? echo $countOffice ?></td><td>Parenting</td><td><? echo $countParenting?></td></tr>
			<tr><td>Email, Letter</td><td><? echo $countEmail ?></td><td>Family Life management</td><td><? echo $countFLMan?></td></tr>
			<tr><td># of Accompanied appointment</td><td><? echo $countAccompanied ?></td><td>Family Wellness/ Relationships</td><td><? echo $countFWR?></td></tr>
			<tr><td># of Collaborative mtg w family</td><td><? echo $countCollaborativeFamily ?></td><td>Social Community Networks</td><td><? echo $countSC?></td></tr>
			<tr><td># of Collaborative mtg w/o family</td><td><? echo $countCollaborative ?></td><td>Legal</td><td><? echo $countLegalNature?></td></tr>
			<tr><td>Other</td><td><? echo $countContactOther ?></td><td>Other</td><td><? echo $countNatureOther?></td></tr>
		</table>
		<br/>
		<b>Referrals(Outside)</b><br/>
		<table>
			<tr><td>Total # of referrals for families</td><td><? echo $totalReferrals ?></td><td>Community Services</td><td><? echo $countCommServices ?></td></tr>
			<tr><td>Mental Health Services</td><td><? echo $countMH ?></td><td>Family Resource Centers</td><td><? echo $countFamResource ?></td></tr>
			<tr><td>Addictions Services</td><td><? echo $countAddictions ?></td><td>NSC</td><td><? echo $countORNSC ?></td></tr>
			<tr><td>Food Bank</td><td><? echo $countFoodBank?></td><td>Other</td><td><? echo $countOROther ?></td></tr>
		</table>
		
	</div>
	<div id="chip">
	</div>
	<div id="prenatal">
	</div>
	<div id="youth">
	</div>
	<div id="nsc">
		<h1>NSC TOTAL MONTHLY STATS</h1>
		<table>
			<tr><td><b>NEW CLIENTS:</b><? echo $newClient ?></td><td><b>RECURRING CLIENTS:</b><? echo $recurringClient ?></tr>
		</table>
		<table>
			<tr><td>1.<b>Contacts:</b></td><td> Phone:<? echo $countNPhone ?></td><td> Home Visits:<? echo $countNHomeVisit ?></td><td> Office:<? echo $countNoffice ?></td><td> Letter:<? echo $countNEmail ?></td><td> Other:<? echo $countNOtherContact ?></td></tr>
		</table>
		<table>
			<tr><td>2.<b>Client Type (#served by age): </b></td></tr>  
		</table>
		<table>
			<tr><td></td><td> 0-6 yrs</td><td> 7-16 yrs</td><td> 17-25 yrs</td><td> 26--40 yrs</td><td> 41-65 yrs</td><td> 65+</td><td>Total #:</td></tr>
			<tr><td>Children:</td><td><? echo $age6 ?></td><td><? echo $age17 ?></td><td><? echo $age25 ?></td><td><? echo $age40 ?></td><td><? echo $age65 ?></td><td><? echo $age66 ?></td><td><? echo $totalChildAges ?></td></tr>
			<tr><td>Adults:</td><td><? echo $countAdult6 ?></td><td><? echo $countAdult16 ?></td><td><? echo $countAdult25 ?></td><td><? echo $countAdult40 ?></td><td><? echo $countAdult65 ?></td><td><? echo $countAdult66 ?></td><td><? echo $totalAdultAges?></td></tr>
			<tr><td>Total:</td><td><? echo $total6 ?></td><td><? echo $total17 ?></td><td><? echo $total25 ?></td><td><? echo $total40 ?></td><td><? echo $total65 ?></td><td><? echo $total66 ?></td><td><? echo $totalTotals ?></td></tr>
		</table>
		<table>
			<tr><td><b>3.Zone Number:</b></td></tr>
		</table>
		<table>
			<tr><td>1. <? echo $countZone1 ?></td><td>2. <? echo $countZone2 ?></td><td>3. <? echo $countZone3 ?></td><td>4. <? echo $countZone4 ?></td><td>5. <? echo $countZone5 ?></td><td>6. <? echo $countZone6 ?></td></tr>
			<tr><td>7. <? echo $countZone7 ?></td><td>8. <? echo $countZone8 ?></td><td>9. <? echo $countZone9 ?></td><td>10. <? echo $countZone10 ?></td><td>11. <? echo $countZone11 ?></td><td>12. <? echo $countZone12 ?></td></tr>
		</table>
		<table>
			<tr><td><b>4.Primary Concern</b></td></tr>
		</table>
		<table>
			<tr><td>Housing:</td><td><? echo $countHousing ?> </td><td>Education/Training:</td><td><? echo $countEducation ?></td><td>Alcohol/Drug:</td><td><? echo $countDrug ?></td><td>Health Concern:</td><td><? echo $countHealthConcern ?></td></tr>
			<tr><td>Diabetes:</td><td><? echo $countDiabetes ?></td><td>Medical Service:</td><td><? echo $countMedicalService ?></td><td>Parenting:</td><td><? echo $countParenting ?></td><td>Legal Issues:</td><td><? echo $countLegalIssues ?></td></tr>
			<tr><td>Human Rights:</td><td><? echo $countHumanRights ?></td><td>Emergency Food:</td><td><? echo $countEmergencyFood ?></td><td>Emergency Shelter:</td><td><? echo $countEmergency ?></td><td>Income Assist.:</td><td><? echo $countIncome ?></td></tr>
			<tr><td>Family Benefits:</td><td><? echo $countFamilyBenefits ?></td><td>Child Abuse/Neglect:</td><td><? echo $countChildAbuse ?></td><td>Spousal Abuse:</td><td><? echo $countSpousalAbuse ?></td><td>Employment:</td><td><? echo $countEmployment ?></td></tr>
			<tr><td>Prenatal/Post Natal:</td><td><? echo $countPrenatal ?></td><td>Transportation:</td><td><? echo $countTransportation ?></td><td>Other:</td><td><? echo $countOtherConcern ?></td></tr>
		</table>
		<table>
			<tr><td><b>5.Client Support Requested:</b></td></tr>
		</table>
		<table>
			<tr><td>w/Professionals:</td><td><? echo $supportWithProfessional ?></td><td>w/Group Consultation:</td><td><? echo $supportWithGroup ?></td></tr>
			<tr><td>w/Legal/Court:</td><td><? echo $supportWithLegal ?></td><td>w/other:</td><td><? echo $supportWithOther ?></td></tr>
		</table>
		<table>
			<tr><td><b>6.Total Number of Referrals:</b></td><td>IN</td><td>OUT</td></tr>
			<tr><td>Self:</td><td><? echo $countNSelf ?></td><td></td></tr>
			<tr><td>Community Services:</td><td><? echo $countNCommunity ?></td><td></td></tr>
			<tr><td>Family Doctor:</td><td><? echo $countNDoctor ?></td><td></td></tr>
			<tr><td>Community Service Provider:</td><td><? echo $countNServiceProvider ?></td><td></td></tr>
			<tr><td>Public Health:</td><td><? echo $countNPublicHealth ?></td><td></td></tr>
			<tr><td>School:</td><td><? echo $countNSchool ?></td><td></td></tr>
			<tr><td>Mental Health:</td><td><? echo $countNMental ?></td><td></td></tr>
			<tr><td>NCNS:</td><td><? echo $countNNCNS ?></td><td></td></tr>
			<tr><td>Aboriginal group\Transition:</td><td><? echo $countNAborg ?></td><td></td></tr>
		</table>	
		<table>
			<tr><td><b>7.Number of Follow Ups:</b><? echo $totalFollowUps?></td></tr>
		</table>		
	</div>	
	</body>
</html>