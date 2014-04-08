<?

		if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
					$db_name="pmcnutt";
					$table_name="tbllogin";
					$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232",$db_name);

				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_error());
					exit();
				}
				$mysqli->select_db($db_name);
				$usern=$_SERVER['QUERY_STRING'];
				$sql = "SELECT * FROM $table_name WHERE username='$usern'";
				$result = $mysqli->query($sql);
				$row = mysqli_fetch_array($result);
				$date1=stripslashes($row['updated']);
				$editor1=stripslashes($row['editedby']);
				$username=stripslashes($row['username']);
				$password=stripslashes($row['password']);
				$program=stripslashes($row['program']);
				$editor=stripslashes($row['editor']);
?>
<html>
<head>
	<link rel='shortcut icon' href='favicon.ico'>
	<link rel="stylesheet" type="text/css" href="generalStyles.css">
</head>
<body>
		<a href='Menu.php'>Back to Main Menu</a><br/>
		<form method='POST' action='updatedLogin.php?<? echo $username?>'>
			<table>
				<tr><td><b>Last Updated:</b></td><td><? echo $date1 ?></td></tr>
				<tr><td><b>Edited By:</b></td><td><? echo $editor1 ?></td></tr>
				<tr><td>Username:</td><td> <input type="text" name="username" value="<? echo $username ?>" maxLength="100"></td></tr>
				<tr><td>Password: </td><td><input type="text" name="password" value="<? echo $password ?>" maxLength="100"></td></tr>
				<tr><td>Program: </td><td><input type="text" name="program" value="<? echo $program ?>" maxLength="100" readonly></td></tr>
				<tr><td>Editor Name: </td><td><input type="text" name="editorName" value="<? echo $editor ?>" maxLength="100"></td></tr>
				<tr><td></td><td><input type="submit" ID="btnAddForm" value="Update Login"/></td></tr>
			</table>
			
				<br />
		</form>
</body>
</html>