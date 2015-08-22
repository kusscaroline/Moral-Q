<?php
	setcookie("userID", " ",time()-3600);
	setcookie("userFirstName", " ",time()-3600);
	setcookie("permission"," ",time()-3600);
	header("refresh: 3; index.php");
	echo "You have been logged out.<br/>";
	echo "You will be redirected to the login page in 3 seconds.";
?>
