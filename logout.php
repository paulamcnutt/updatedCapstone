<?

setcookie("editor", "", time()-3600);
setcookie("page", "", time()-3600);
header("Location: login.php");
exit;


?>