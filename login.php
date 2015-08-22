<?php
	include 'connect.php';
	
	$table_name = "users";
	
	$userID = $_POST['userID'];
	$password = $_POST['password'];
	
	
	$userID = stripslashes($userID);
	$password = stripslashes($password);
	$password = md5($password);
	
	$sql = "SELECT * FROM $table_name WHERE userID = $userID";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	$show = mysql_fetch_array($result);
	if($show['userID'] == '')
	{
		echo "Wrong UserID or Password combination.";
		header("refresh: 3;index.php");
	}
	elseif($show['userPassword'] == "")
	{
		setcookie("userID",$userID,time()+3600);
		header("location:addpassword.html");
		}
	elseif($count == 1 && $show['userPassword'] == $password)
	{
		$be = 1;
		setcookie("pageview",$be,time()+3600);
		setcookie("userID",$userID,time()+3600);
		setcookie("userName",$show['userFirstName'],time()+3600);
		setcookie("permission",$show['userPermission'],time()+3600);
		header("location:intranet.php");
	}
	else
	{
		echo "Wrong UserID or Password combination.";
		header("refresh: 3;index.php");
	}
?>
