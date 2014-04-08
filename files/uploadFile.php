<?
	if ($_COOKIE['page']=="home") {
	}else{
		 header( "Location: ../login.php");
		 exit;
	}

	if ($_SERVER['QUERY_STRING']=="submit" && $_FILES['uploaderName']['name']!=""){
      	
		$ftp_server = "php.nscctruro.ca";
		$ftp_username   = "w0245232";
		$ftp_password   =  "w0245232";
			
		$conn_id = ftp_connect($ftp_server) or die("could not connect to $ftp_server");
		//connected
		if(@ftp_login($conn_id, $ftp_username, $ftp_password)){
				ftp_put($conn_id, "../capstone/files/".$_FILES['uploaderName']['name'], $_FILES['uploaderName']['tmp_name'],FTP_ASCII);
		}	
		echo $_FILES['uploaderName']['name'] . " has been added!";
	}elseif ($_SERVER['QUERY_STRING']=="delete"){
		$ftp_server = "php.nscctruro.ca";
		$ftp_username   = "w0245232";
		$ftp_password   =  "w0245232";
			
		$conn_id = ftp_connect($ftp_server) or die("could not connect to $ftp_server");
		//connected
		if(@ftp_login($conn_id, $ftp_username, $ftp_password)){
				ftp_delete($conn_id, "../capstone/files/".$_POST['deleteForm']);
		}	
		echo $_POST['deleteForm'] . " has been deleted!";
	}
	$options="";
	$links="";
	foreach (glob("*.pdf") as $filename) {
		$options.= "<option>$filename</option>";
		 $links.= "<br/><a href='http://php.nscctruro.ca/~w0245232/capstone/files/".$filename.  "' target='blank'>".$filename."</a>";
	}	
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../generalStyles.css">
	<link rel='shortcut icon' href='../favicon.ico'>
</head>
<body>
    <div>
		<a href='../Menu.php'>Back to Main Menu</a><br/>
		<div class="title"><b>Print, Upload, and View .PDFs:</b></div>
		<form method='POST' action='uploadFile.php?submit' ENCTYPE='multipart/form-data'>
			<span class="subtitle">Upload a Form</span>
			<label ID="lblFormFeedback"/><br />
			<input type="file" name="uploaderName"  id="uploaderName" value="Browse" size="30">
			<br />
			<input type="submit" ID="btnAddForm" value="Add Form"/>
			<br />
		</form>
		<form method='POST' action='uploadFile.php?delete' ENCTYPE='multipart/form-data'>
			<span class="subtitle">Delete a Form</span><br />
			<select ID="deleteForm" name="deleteForm"><? echo $options ?></select><br />
			<input type="submit" ID="btnDeleteForm" value="Delete Form"/>
			<label ID="deleteFormFeedback" />
		</form>
		<br />
		<br />

       <span class="subtitle"> Click on a link below to view previously uploaded files, they will open in another window where they can be saved or printed from:</span>
		<? echo $links ?>
</body>
</html>