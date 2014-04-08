<?php

	//check for required fields
	if ((!$_POST['username']) || (!$_POST['password'])) {
	     header("Location: login.php");
	     exit;
	}
	$mysqli = new mysqli("ftp.nscctruro.ca","pmcnutt","pm0245232","pmcnutt");
	$sql = "SELECT * FROM tbllogin WHERE username = '$_POST[username]' AND password = '$_POST[password]'";

		$mysqli->select_db("pmcnutt");
		$result = $mysqli->query($sql);
		echo $result->num_rows;
	if (($result->num_rows) > 0) {
		 setcookie("page", "home");
		 $sql = "SELECT * FROM tbllogin WHERE username = '$_POST[username]'";

		$mysqli->select_db("pmcnutt");
		$result = $mysqli->query($sql);
		while ($row = mysqli_fetch_array($result)) {
			$editor=$row['editor'];
			$program=$row['program'];
			setcookie("editor", $editor);
			if($program=="nsc"){
				$program="Native Social Counselling Agency";
			}elseif($program=="pj"){
				$program="Parenting Journey";
			}elseif($program=="prenatal"){
				$program="Pre-natal";
			}elseif($program=="chip"){
				$program="CHIP";
			}elseif($program=="youth"){
				$program="Youth Outreach";
			}
			setcookie("program", $program);
		 }
		 header("Location: Menu.php");
		 exit;
	} else {
		header("Location: login.php");
		exit;
	}
?>