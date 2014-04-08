<?
		if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
$queryData =$_SERVER['QUERY_STRING'];					
$itemXML=new DOMDocument;
$itemXML->load('data.xml');
$xpath = new DOMXPath($itemXML);

$programItems = $xpath->query('/dataFields/items[@id="program"]/item');

//program
$program= "<select name='programSelector' id='programSelector' onchange='setUp()'>";
foreach ($programItems as $programItem) {
	 $program.= "<option value=\"".$programItem->nodeValue."\" >" .$programItem->nodeValue . "</option>";
}
$program.= "</select>";
					$db_name="pmcnutt";
					$table_name="tblemployeeinformation";
					$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);

				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_error());
					exit();
				}
				$mysqli->select_db($db_name);
				$prog="Pre-natal";
				$sql = "SELECT * FROM $table_name WHERE Program='$prog'";
				//echo $sql;
				$result = $mysqli->query($sql);
				$row = mysqli_fetch_array($result);
				$date1=stripslashes($row['date']);
				$editor1=stripslashes($row['Editor']);
				$name1=stripslashes($row['Name']);
				$address1=stripslashes($row['Address']);
				$location1=stripslashes($row['Location']);
				$telephone1=stripslashes($row['TelephoneNumber']);
				$cell1=stripslashes($row['Cell']);
				$email1=stripslashes($row['Email']);
				
				
				$prog="CHIP";
				$sql = "SELECT * FROM $table_name WHERE Program='$prog'";
				
				$result = $mysqli->query($sql);
				$row = mysqli_fetch_array($result);
				$date2=stripslashes($row['date']);
				$editor2=stripslashes($row['Editor']);
				$name2=stripslashes($row['Name']);
				$address2=stripslashes($row['Address']);
				$location2=stripslashes($row['Location']);
				$telephone2=stripslashes($row['TelephoneNumber']);
				$cell2=stripslashes($row['Cell']); 
				$email2=stripslashes($row['Email']); 
				
				$prog="Native Social Counselling Agency";
				$sql = "SELECT * FROM $table_name WHERE Program='$prog'";
				
				$result = $mysqli->query($sql);
				$row = mysqli_fetch_array($result);
				$date3=stripslashes($row['date']);
				$editor3=stripslashes($row['Editor']);
				$name3=stripslashes($row['Name']);
				$address3=stripslashes($row['Address']);
				$location3=stripslashes($row['Location']);
				$telephone3=stripslashes($row['TelephoneNumber']);
				$cell3=stripslashes($row['Cell']);
				$email3=stripslashes($row['Email']);
				
				$prog="Parenting Journey";
				$sql = "SELECT * FROM $table_name WHERE Program='$prog'";
				$result = $mysqli->query($sql);
				$row = mysqli_fetch_array($result);
				$date4=stripslashes($row['date']);
				$editor4=stripslashes($row['Editor']);
				$name4=stripslashes($row['Name']);
				$address4=stripslashes($row['Address']);
				$location4=stripslashes($row['Location']);
				$telephone4=stripslashes($row['TelephoneNumber']);
				$cell4=stripslashes($row['Cell']);
				$email4=stripslashes($row['Email']);
				
				$prog="Youth Outreach";
				$sql = "SELECT * FROM $table_name WHERE Program='$prog'";
				
				$result = $mysqli->query($sql);
				$row = mysqli_fetch_array($result);
				$date5=stripslashes($row['date']);
				$editor5=stripslashes($row['Editor']);
				$name5=stripslashes($row['Name']);
				$address5=stripslashes($row['Address']);
				$location5=stripslashes($row['Location']);
				$telephone5=stripslashes($row['TelephoneNumber']);
				$cell5=stripslashes($row['Cell']);
				$email5=stripslashes($row['Email']);
?>
<html>	
	<head>
		<script type="text/javascript">
		function setUp(){
			hideAll();
			if(document.getElementById("programSelector").value=="Parenting Journey"){
				document.getElementById("Parenting Journey").style.display="block";
			}else if(document.getElementById("programSelector").value=="Native Social Counselling Agency"){
				document.getElementById("Native Social Counselling Agency").style.display="block";
			}else if(document.getElementById("programSelector").value=="CHIP"){
				document.getElementById("CHIP").style.display="block";
			}else if(document.getElementById("programSelector").value=="Pre-natal"){
				document.getElementById("Pre-natal").style.display="block";
			}else{
				document.getElementById("youth Outreach").style.display="block";
			}
		}
			function hideAll(){
				document.getElementById("Parenting Journey").style.display="none";
				document.getElementById("Native Social Counselling Agency").style.display="none";
				document.getElementById("youth Outreach").style.display="none";
				document.getElementById("CHIP").style.display="none";
				document.getElementById("Pre-natal").style.display="none";
			}
		</script>
		<link rel="stylesheet" type="text/css" href="generalStyles.css">
		<link rel='shortcut icon' href='favicon.ico'>
	</head>
	<body onload="setUp()">
		<a href='Menu.php'>Back to Main Menu</a><br/>
<form method="POST" action="updatedProgram.php">
			<tr><td>Program: </td><td><? echo $program?></td><td></tr>
	<div id="Pre-natal">
		<table>
			<tr><td><b>Last Updated:</b></td><td><? echo $date1 ?></td></tr>
			<tr><td><b>Edited By:</b></td><td><? echo $editor1 ?></td></tr>
			<tr><td>Name:</td><td> <input type="text" name="Name1" value="<? echo $name1 ?>" maxLength="70"></td><td></tr>
			<tr><td>Address: </td><td><input type="text" name="Address1" value="<? echo $address1 ?>" maxLength="100"></td><td></tr>
			<tr><td>Location: </td><td><input type="text" name="Location1" value="<? echo $location1 ?>" maxLength="70"></td><td></tr>
			<tr><td>Telephone #: </td><td><input type="text" name="TelephoneNumber1" value="<? echo $telephone1 ?>" maxLength="15"></td><td></tr>
			<tr><td>Cell: </td><td><input type="text" name="Cell1" value="<? echo $cell1 ?>" maxLength="15"></td><td></tr>
			<tr><td>Email: </td><td><input type="text" name="Email1" value="<? echo $email1 ?>" maxLength="100"></td><td></tr>
		</table>
	</div>
		<div id="CHIP">
		<table>
			<tr><td><b>Last Updated:</b></td><td><? echo $date2 ?></td></tr>
			<tr><td><b>Edited By:</b></td><td><? echo $editor2 ?></td></tr>
			<tr><td>Name:</td><td> <input type="text" name="Name2" value="<? echo $name2 ?>" maxLength="70"></td><td></tr>
			<tr><td>Address: </td><td><input type="text" name="Address2" value="<? echo $address2 ?>" maxLength="100"></td><td></tr>
			<tr><td>Location: </td><td><input type="text" name="Location2" value="<? echo $location2 ?>" maxLength="70"></td><td></tr>
			<tr><td>Telephone #: </td><td><input type="text" name="TelephoneNumber2" value="<? echo $telephone2 ?>" maxLength="15"></td><td></tr>
			<tr><td>Cell: </td><td><input type="text" name="Cell2" value="<? echo $cell2 ?>" maxLength="15"></td><td></tr>
			<tr><td>Email: </td><td><input type="text" name="Email2" value="<? echo $email2 ?>" maxLength="100"></td><td></tr>
		</table>
	</div>
	<div id="Native Social Counselling Agency" >
		<table>
			<tr><td><b>Last Updated:</b></td><td><? echo $date3 ?></td></tr>
			<tr><td><b>Edited By:</b></td><td><? echo $editor3 ?></td></tr>
			<tr><td>Name:</td><td> <input type="text" name="Name3" value="<? echo $name3 ?>" maxLength="70"></td><td></tr>
			<tr><td>Address: </td><td><input type="text" name="Address3" value="<? echo $address3 ?>" maxLength="100"></td><td></tr>
			<tr><td>Location: </td><td><input type="text" name="Location3" value="<? echo $location3 ?>" maxLength="70"></td><td></tr>
			<tr><td>Telephone #: </td><td><input type="text" name="TelephoneNumber3" value="<? echo $telephone3 ?>" maxLength="15"></td><td></tr>
			<tr><td>Cell: </td><td><input type="text" name="Cell3" value="<? echo $cell3 ?>" maxLength="15"></td><td></tr>
			<tr><td>Email: </td><td><input type="text" name="Email3" value="<? echo $email3 ?>" maxLength="100"></td><td></tr>
		</table>
	</div>
	<div id="Parenting Journey" >
		<table>
			<tr><td><b>Last Updated:</b></td><td><? echo $date4 ?></td></tr>
			<tr><td><b>Edited By:</b></td><td><? echo $editor4 ?></td></tr>
			<tr><td>Name:</td><td> <input type="text" name="Name4" value="<? echo $name4 ?>" maxLength="70"></td><td></tr>
			<tr><td>Address: </td><td><input type="text" name="Address4" value="<? echo $address4 ?>" maxLength="100"></td><td></tr>
			<tr><td>Location: </td><td><input type="text" name="Location4" value="<? echo $location4 ?>" maxLength="70"></td><td></tr>
			<tr><td>Telephone #: </td><td><input type="text" name="TelephoneNumber4" value="<? echo $telephone4 ?>" maxLength="15"></td><td></tr>
			<tr><td>Cell: </td><td><input type="text" name="Cell4" value="<? echo $cell4 ?>" maxLength="15"></td><td></tr>
			<tr><td>Email: </td><td><input type="text" name="Email4" value="<? echo $email4 ?>" maxLength="100"></td><td></tr>
		</table>
	</div>
	<div id="youth Outreach" >
		<table>
			<tr><td><b>Last Updated:</b></td><td><? echo $date5 ?></td></tr>
			<tr><td><b>Edited By:</b></td><td><? echo $editor5 ?></td></tr>
			<tr><td>Name:</td><td> <input type="text" name="Name5" value="<? echo $name5 ?>" maxLength="70"></td><td></tr>
			<tr><td>Address: </td><td><input type="text" name="Address5" value="<? echo $address5 ?>" maxLength="100"></td><td></tr>
			<tr><td>Location: </td><td><input type="text" name="Location5" value="<? echo $location5 ?>" maxLength="70"></td><td></tr>
			<tr><td>Telephone #: </td><td><input type="text" name="TelephoneNumber5" value="<? echo $telephone5 ?>" maxLength="15"></td><td></tr>
			<tr><td>Cell: </td><td><input type="text" name="Cell5" value="<? echo $cell5 ?>" maxLength="15"></td><td></tr>
			<tr><td>Email: </td><td><input type="text" name="Email5" value="<? echo $email5 ?>" maxLength="100"></td><td></tr>
		</table>
	</div>
	<input type="submit" id="submit" value="Update Information"/>
</form>	
	</body>
</html>