<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel='shortcut icon' href='favicon.ico'>
		<link rel="stylesheet" type="text/css" href="generalStyles.css">
	</head>
	<body>
		<h1>Login</h1>
		<form method="POST" action="verifyLogin.php">
			<p><strong>Username:</strong><br>
			<input type="text" name="username" size=25 maxlength=25></p>
			<p><strong>Password:</strong><br>
			<input type="password" name="password" size=25 maxlength=25></p>
			<p><input type="SUBMIT" name="submit" value="Login"></p>
		</form>
	</body>
</html>

