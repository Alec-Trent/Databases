<!DOCTYPE html>
<html>
<head>
	<title>Class Select</title>
</head>
	<body>
		<h1>
			Choose what you would like to do 
		</h1>

<?php
	$var = setcookie("class", $_POST["class"], time()+600, "/");
?>
	
	 <button class="button button" onclick="window.location.href='studentList.php';">Show Student List</button>

	   <button class="button button1" onclick="window.location.href='survey.php';">Show Survey</button>
		

	</body>
</html>
