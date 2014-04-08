<?
     	if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';


?>
<html>
	<head>
		<title>Search Intakes </title>
		<link rel="stylesheet" type="text/css" href="generalStyles.css">
		<link rel='shortcut icon' href='favicon.ico'>
	</head>
	<body>
		<form method="POST" action="searchResults.php">
		<h1>Search Intake:</h1>
		<a href='Menu.php'>Back to Main Menu</a>
		<h3>Search by File Number or Last Name:</h3>
			<input type="text" name="search"><br/>
			<input type="radio" name="searchCriteria" value="fNumber">File Number<br/>
			<input type="radio" name="searchCriteria" value="Name">Last Name<br/><br/>

		<h3>Or browse entries based on program:</h3>
			Search by program <select name='program'><option></option><option>Pre-natal</option><option>CHIP</option><option>Native Social Counselling Agency</option><option>Parenting Journey</option><option>Youth Outreach</option></select>
			<br/>
	<h3>Or do not enter anything above and hit submit to view all entries:</h3>
			<input type="submit" name="submit" value="Search">
		</form>
	</body>
</html>