<!DOCTYPE html>
<html>
<head>
	<title>Course List</title>
</head>
	<body>
		<h1>
			Select a Course
		</h1>

<?php
try {
 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "<table border='1'>";
 echo "<TR>";
 echo "<TH> Course ID </TH> ";
 echo "<TH> Students </TH>";
 echo "</TR>";

 foreach ( $dbh->query("SELECT id from teaches;") as $row ) {

 echo '<form method="post" action="instructorCourses.php">';

 echo "<TR>";
 echo "<TD>".$row[0]."</TD>";

 echo ' <input type="hidden" name="id" value="'. $row[0]. '">'; 

echo '<TD> <input type="submit" name="edit" value="Manage" > </TD>';

 echo "</TR>";

 echo '</form>';
 }

 echo "</table>";
} catch (PDOException $e) {
 print "Error!" . $e->getMessage()."<br/>";
 die();
}

if (array_key_exists('edit', $_POST) ) {
	try {
 		$config = parse_ini_file("db.ini");
 		$dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 		$statement = $dbh->prepare("SELECT i_account from teaches where i_account = ? and id = ?;");

 		$statement->execute([$_COOKIE["userName"], $_POST["id"]]);

 		if ($statement->rowCount() == 0) {
 			echo " <p> You have no classes assigned to you. </p>";
 		}

 		$statement->execute([$_COOKIE["userName"], $_POST["id"]]);
 		}

	} catch (PDOException $e) {
 		print "Error!" . $e->getMessage()."<br/>";
 		die();
	}
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
 } ?>
		

	</body>
</html>
