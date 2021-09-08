<!DOCTYPE html>
<html>
<head>
	<title>Class Select</title>
</head>
	<body>
		<h1>
			Please Select Your Class
		</h1>

<?php
try {
 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "<table border='1'>";
 echo "<TR>";
 echo "<TH> Course_ID </TH> ";
 echo "<TH> Course Name </TH>";
 echo "<TH> Credits </TH>";
 echo "<TH> Manage </TH>";
 echo "</TR>";

 $statement = $dbh->prepare("SELECT id, title, credits name FROM course natural join teaches where i_account = ?;");
 foreach ( $statement->execute([$_COOKIE["userName"]]) as $row ) {

 echo '<form method="post" action="registration.php">';

 echo "<TR>";
 echo "<TD>".$row[0]."</TD>";
 echo "<TD>".$row[1]."</TD>";
 echo "<TD>".$row[2]."</TD>";

 echo ' <input type="hidden" name="id" value="'. $row[0]. '">'; 
 echo ' <input type="hidden" name="title" value="'. $row[1].'">';
 echo ' <input type="hidden" name="credits "value="'. $row[2].'">';


 echo '<TD> <input type="submit" name="edit" value="Register" > </TD>';


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

 		$statement = $dbh->prepare("SELECT s_account from register where s_account = ? and id = ?;");

 		$statement->execute([$_COOKIE["userName"], $_POST["id"]]);

 		if ($statement->rowCount() > 0) {
 			echo " <p> You are already registered for this course, dumb bitch. </p>";
 		}
 		else{
 		$statement = $dbh->prepare("INSERT INTO register values(0, '', ?, ?);");

 		$statement->execute([$_COOKIE["userName"], $_POST["id"]]);

 		if ($statement) {
 			echo "<p> you have been registered for ".$_POST['id']. " successfully.</p>";
 		}
 		}

	} catch (PDOException $e) {
 		print "Error!" . $e->getMessage()."<br/>";
 		die();
	}
}

?>


		

	</body>
</html>
