<?
if ($_COOKIE['page']=="home") {
		}else{
			 header( "Location: login.php");
			 exit;
		}
		
		
		echo "Logged in as: ". $_COOKIE['editor'].'</br>';
		 ?>
		 
		 
		 Copy paste monthly stats change query