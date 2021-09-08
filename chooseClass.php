<!DOCTYPE html>
<html>
<head>
	<title>Choose Course</title>
</head>
	<body>
		<h1>
			Select the course you would like to manage
		</h1>

<?php
try {
 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "<table border='1'>";
 echo "<TR>";
 echo "<TH> Course </TH> ";
 echo "<TH> Manage </TH>";
 echo "</TR>";

 $statement = $dbh->prepare("SELECT id FROM teaches WHERE i_account = ?;");
 $statement->execute([$_COOKIE["userName"]]);

 $result = $statement->fetchAll();

 foreach ($result as $row) {

 echo '<form method="post" action="classOption.php">';

 echo "<TR>";
 echo "<TD>".$row[0]."</TD>";
 echo '<TD> <input type="submit" name="manage" value="Manage" </TD>';

 echo ' <input type="hidden" name="class" value="'. $row[0]. '">'; 


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
