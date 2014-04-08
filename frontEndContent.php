<?

     	if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';

		$program= "<select name='program' id ='program' onchange='update()'><option value='Native Social Counselling Agency' >Native Social Counselling Agency</option><option value='Parenting Journey'>Parenting Journey</option><option value='Pre-natal'>Pre-natal</option><option value='CHIP'>CHIP</option><option value='Home' >Home</option><option value='About' >About</option><option value='Contact' >Contact</option></select>";
	$db_name="pmcnutt";
	$table_name="tblfrontendcontent";
	$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);
		

	$mysqli->select_db($db_name);
	
	if ($_SERVER['QUERY_STRING']=="updated"){
		
		if ($_POST['program']=="Native Social Counselling Agency"){
			$prog="nsc";
			$contents=$_POST['contentNSC'];
		}else if($_POST['program']=="Parenting Journey"){
			$prog="pj";
			$contents=$_POST['contentPJ'];
		}else if($_POST['program']=="Pre-natal"){
			$prog="prenatal";
			$contents=$_POST['contentPN'];
		}elseif($_POST['program']=="CHIP"){
			$prog="chip";
			$contents=$_POST['contentCHIP'];
		}elseif($_POST['program']=="Contact"){
			$prog="contact";
			$contents=$_POST['contentCONTACT'];
		}elseif($_POST['program']=="Home"){
			$prog="home";
			$contents=$_POST['contentHOME'];
		}elseif($_POST['program']=="About"){
			$prog="about";
			$contents=$_POST['contentABOUT'];
		}
		$sql="update ". $table_name ." set $prog='$contents' where id=1"; 
		//echo $sql;
		$result = $mysqli->query($sql)or die ('Unable to execute query');	
		echo "Content updated!";
	}
	$sql="select * from ". $table_name ." where id=1"; 
	$result = $mysqli->query($sql)or die ('Unable to execute query');	
	$row = mysqli_fetch_array($result);
	$nscValue=stripslashes($row['nsc']);
	$chipValue=stripslashes($row['chip']);
	$pjValue=stripslashes($row['pj']);
	$pnValue=stripslashes($row['prenatal']);
	$aboutValue=stripslashes($row['about']);
	$contactValue=stripslashes($row['contact']);
	$homeValue=stripslashes($row['home']);
?>
<html>
		<head>
			<link rel="stylesheet" type="text/css" href="generalStyles.css">
			<link rel='shortcut icon' href='favicon.ico'>
			<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
			<script type="text/javascript">
			function setUp(){
				CKEDITOR.replace('contentNSC');
				CKEDITOR.replace('contentPJ');
				CKEDITOR.replace('contentPN');
				CKEDITOR.replace('contentCHIP');
				CKEDITOR.replace('contentHOME');
				CKEDITOR.replace('contentCONTACT');
				CKEDITOR.replace('contentABOUT');
				update();
			}
			function update(){
				hideAll();
				if(document.getElementById("program").value=="Parenting Journey"){
					document.getElementById("apj").style.display="block";
				}else if(document.getElementById("program").value=="Native Social Counselling Agency"){
					document.getElementById("ansc").style.display="block";
				}else if(document.getElementById("program").value=="CHIP"){
					document.getElementById("achip").style.display="block";
				}else if(document.getElementById("program").value=="Pre-natal"){
					document.getElementById("apn").style.display="block";
				}else if(document.getElementById("program").value=="Home"){
					document.getElementById("ahome").style.display="block";
				}else if(document.getElementById("program").value=="About"){
					document.getElementById("aabout").style.display="block";
				}else if(document.getElementById("program").value=="Contact"){
					document.getElementById("acontact").style.display="block";
				}
			}
			function hideAll(){
				document.getElementById("ansc").style.display="none";
				document.getElementById("apj").style.display="none";
				document.getElementById("apn").style.display="none";
				document.getElementById("achip").style.display="none";
				document.getElementById("aabout").style.display="none";
				document.getElementById("acontact").style.display="none";
				document.getElementById("ahome").style.display="none";
			}
			</script>
		</head>
		<body onload="setUp()">
		<form method="POST" action="frontEndContent.php?updated">
			<a href='Menu.php'>Back to Main Menu</a><br/>
			<? echo $program ?>
			<div id="ansc">
			<textarea id="contentNSC" name="contentNSC"><? echo $nscValue ?></textarea>
			</div>
			<div id="apj">
			<textarea id="contentPJ" name="contentPJ"><? echo $pjValue ?></textarea>
			</div>
			<div id="apn">
			<textarea id="contentPN" name="contentPN"><? echo $pnValue ?></textarea>
			</div>
			<div id="achip">
			<textarea id="contentCHIP" name="contentCHIP"><? echo $chipValue ?></textarea>
			</div>
			<div id="ahome">
			<textarea id="contentHOME" name="contentHOME"><? echo $homeValue ?></textarea>
			</div>
			<div id="acontact">
				<textarea id="contentCONTACT" name="contentCONTACT"><? echo $contactValue ?></textarea>
			</div>
			<div id="aabout">
				<textarea id="contentABOUT" name="contentABOUT"><? echo $aboutValue ?></textarea>
			</div>
		<input type="submit" id="btnSubmit" value="Update"/>	
		</body>
</html>