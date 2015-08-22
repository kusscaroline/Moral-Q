<html>
	<head>
		<title>SuperSpeed Intranet</title>
		<style>
			#box{
				 position:absolute;
			     border:0px;
			     top:25%;
			     right:25%;
			     bottom:25%;
			     left:25%;
			     padding:25px;
			     margin:25px;   
				}
		</style>
	</head>
	<body>
		<div id="box">
			<form action="login.php" method="post" align="center">
				<label align="center">User ID:</label>
				<input type="text" name="userID" align="center"/><br />
				<label align="center">Password: </label>
				<input type="password" name="password" align="center"/><br />
				<input type="submit" name="submit" value="Login" align="center"/>
			</form>
		</div>
	</body>
</html>
