<!DOCTYPE html>
<html>
<head>
	<title>Student List</title>
</head>
	<body>
		<h1>
			Student List
		</h1>

<?php
try {
 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "<table border='1'>";
 echo "<TR>";
 echo "<TH> Student Account </TH> ";
 echo "<TH> Name </TH>";
 echo "</TR>";

  $statement = $dbh->prepare("SELECT s_account, name FROM register natural join student WHERE id = ?");

  $statement->execute([$_COOKIE["class"]]);

  $result = $statement->fetchAll();


 foreach ( $result as $row ) {

 echo '<form method="post" action="studentList.php">';

 echo "<TR>";
 echo "<TD>".$row[0]."</TD>";
 echo "<TD>".$row[1]."</TD>";

 echo "</TR>";

 echo '</form>';
 }

 echo "</table>";
} catch (PDOException $e) {
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
 } ?>
		

	</body>
</html>
