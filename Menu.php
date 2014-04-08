<?php
      	if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
?>
<html>
	<head>
		<title>Menu</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" type="text/css" href="generalStyles.css">
		<link rel='shortcut icon' href='favicon.ico'>
	</head>
	<body id="menu">
	<a href='http://php.nscctruro.ca/~w0245232/capstone/intakeForm.php'>Intake Form</a><br/>
	<a href='http://php.nscctruro.ca/~w0245232/capstone/searchContacts.php'>Contacts</a><br/>
	<a href='http://php.nscctruro.ca/~w0245232/capstone/search.php'>Edit Intake Form</a><br/>
	<a href='http://php.nscctruro.ca/~w0245232/capstone/employeeProgram.php'>View/Update Employee Program Information</a><br/>
	<a href='http://php.nscctruro.ca/~w0245232/capstone/searchMonth.php'>Monthly Stats </a><br/>
	<a href='http://php.nscctruro.ca/~w0245232/capstone/searchYear.php'>Yearly Stats</a><br/>
	<a href='http://php.nscctruro.ca/~w0245232/capstone/files/uploadFile.php'>.PDFs</a><br/>
	<a href='http://php.nscctruro.ca/~w0245232/capstone/frontEndContent.php'>Site Content</a><br/>
	<a href='http://php.nscctruro.ca/~w0245232/capstone/admin.php'>	Login Information</a>
	<br/><a href="logout.php">Logout</a>
	</body>
</html>