<?	if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';


	$yearDD="<select id='year' name='year'><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option><option value='2021'>2021</option><option value='2022'>2022</option><option value='2023'>2023</option><option value='2024'>2024</option></select>";
	echo "
		<a href='Menu.php'>Back to Main Menu</a><form method='POST' action='yearlyStats.php'>Reporting Date: Year: $yearDD	<input type='submit' id='btnSubmit' value='Submit'/></form>";
$currentYear=date("y");

	?>
<html>
<head>
		<link rel='shortcut icon' href='favicon.ico'>
		<link rel="stylesheet" type="text/css" href="generalStyles.css">
		<script type="text/javascript">
			document.getElementById("year").value="20<?echo $currentYear ?>";
		</script>
</head>
<body>
</body>
</html>