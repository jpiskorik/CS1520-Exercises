<?php

if (isset($_SESSION["error"]))
   echo "Sorry there was an error"
   
?>

<html>
<head>
   <title>Exercise 4 username/password</title>
   <link rel="stylesheet" href="ex4.css">
</head>
<body>
	<form action="process.php" method="POST">
	Name: <input class ="box" type="text" name="name"><br>
	Password: <input class = "box" type="text" name="password"><br>
	<input type="submit">
	</form>
</body>
</html>  