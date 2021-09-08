<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
	<body>
		<h1>
			Course Registration
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
 echo "<TH> Register </TH>";
 echo "</TR>";

 foreach ( $dbh->query("SELECT id, title, credits name FROM course") as $row ) {

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
 			echo " <p> You are already registered for this course.</p>";
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


<style>

  html, body {
  margin: 0;
  padding: 0;
  }

  .header {
  background-color: black;
  text-align: left;
  padding: 20px;
  }

 .slimHeader {
  background-color: #292828;
  top:14%;
  height: 3.5%;
 }

 .content{
  background-color: #e5e5e5;
  padding-left: 1.5%;
  padding-right: 1.5%;
 }

 label { 
  color: black; 
  font-weight: bold; 
  display: block; 
  width: 150px; 
  float: left; 
  font-size: 24px;
  } 

 input[type=password] {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid gold;
  border-radius: 4px;
 }

 .button {
  background-color: grey;
  border: none;
  color: white;
  padding: 156px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 24px;
  margin: 4px 2px;
  cursor: pointer;
  width: 100%;
 }

 .button:hover {
  background-color: #d3d3d3;
 }

 .footer {
  background-color: black;
  text-align: center;
  padding: 10px;
  }

  @media screen and (max-width: 600px) {
  .column {
    width: 100%;
    }
  }
</style>


</body> 
</html> 


	</body>
</html>
