<!DOCTYPE html>
<html>
<head>
	<title>Course List</title>
</head>
	<body>
		<h1>
			Thank you for your responses
		</h1>

<?php

try {

 $i = 0;
 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $statement = $dbh->prepare("INSERT INTO surveys VALUES (?, ?, ?, ?)");

 for ($i=1; $i < count($_POST); $i++) { 
 	$statement->execute([$_POST["question".$i], $i, $_COOKIE["userName"], $_COOKIE["class"]]);
 }

 $statement = $dbh->prepare("UPDATE register set survey_status = 1, survey_ts = now() where s_account = ? and id = ?;");
 date_default_timezone_set("America/Detroit");

 $statement->execute([	$_COOKIE["userName"], $_COOKIE["class"]]);

}
 catch (PDOException $e) {
 print "Error!" . $e->getMessage()."<br/>";
 die();

}



?>

<?php
if ($_COOKIE["loginType"] == "1") { 
	echo '<a href = "studentLanding.html"><button>
      Back to Home
    	</button> 
    	</a>';
	}
else {
	echo
	'<a href = "instructorLanding.html"><button>
      Back to Home
    	</button> 
    	</a>';


 } 
 ?>
	


	</body>
</html>
