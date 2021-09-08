<!DOCTYPE html>
<html>
<head>
	<title>Course List</title>
</head>
	<body>
		<h1>
			Survey Response
		</h1>

<?php
$i = 1;
try { 
  $config = parse_ini_file("db.ini");
  $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $result = $dbh->query("SELECT count(question_number) FROM questions");
  $totalQuestion = $result->fetch();
}
catch (PDOException $e) {
 print "Error!" . $e -> getMessage()."<br/>";
 die();
}


if (array_key_exists('start', $_POST) || (array_key_exists('submit', $_POST))) {

try {

 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 


 $statement = $dbh->prepare("SELECT question_text, bool_response_type FROM questions where question_number = ?;");

 $statement->execute([$i]);

 $result = $statement->fetch();

 echo '<form name= "form" id = "form" method = "post" action="takeSurvey2.php" >' ;

  if ($result[1] == 1) {
  
 	echo "<p>".$result[0]."</p>";
 	echo '<input type="radio" "name="question" value="1">';
 	echo '<label for="1">Strongly Agree  </label> ';
 	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

 
 	echo '<input type="radio"  "name="question" value="2">';
 	echo '<label for="1"> Agree </label>';
 	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

 
 	echo '<input type="radio" "name="question" value="3">';
 	echo '<label for="1">Neutral    </label>';	
 	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

 	
 	echo '<input type="radio" "name="question" value="4">';
 	echo '<label for="1">Disagree    </label>';	
 	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';


 	echo '<input type="radio" "name="question" value="5">';
 	echo '<label for="1">Strongly Disagree </label>';
 
 	echo '</br>';
  $i++;
 }

 else {
  echo

 }
?>

  <input type="submit" class = "button" name = "submit" id = "submit" value = "Submit" action="takeSurvey2.php">
<?php
  echo '</form>';


}
 catch (PDOException $e) {
 print "Error!" . $e->getMessage()."<br/>";
 die();

}

}

?>

<br>

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

 <form method="post">
    <input type="submit" name="start" id = "start" class="button" value="Start Survey">
  </form>

	</body>
</html>
