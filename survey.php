<!DOCTYPE html>
<html>
<head>
	<title>Course List</title>
</head>
<body>
<!-- Top black bar that houses the image and Title font -->
  <div class="header"> 
    <img src="https://www.mtu.edu/mtu_resources/images/download-central/logos/husky-icon/thumb.png" style="width:250px;height:100px;float:left;">
    <h1 style="color:gold; font-family:Tahoma">Databases Final</h1>
  </div>


  <div class="slimHeader">

  </div>


  <div class="content">
  	<br>
  	<h1 style="color:black; font-family:Tahoma">Survey Response</h1>
	 <?php
try {
	//mc questions
 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 

 foreach ( $dbh->query("SELECT question_number, question_text FROM questions where bool_response_type = 1;") as $row ) {

 echo "<table border='1'>";
 echo "<TR>";
 echo "<TH> Question Num </TH> ";
 echo "<TH> Question Text </TH>";
 echo "<TH> Response Rate </TH>";
 echo "<TH> Strongly Agree </TH>";
 echo "<TH> Agree </TH>";
 echo "<TH> Neutral </TH>";
 echo "<TH> Disagree </TH>";
 echo "<TH> Strongly Disagree </TH>";
 echo "</TR>";


 $statement = $dbh->prepare("SELECT count(survey_response) FROM surveys NATURAL JOIN teaches WHERE id = ? and question_number = ? and i_account = ?;");

 $statement->execute([$_COOKIE["class"], $row[0], $_COOKIE["userName"]]);

 $result = $statement->fetch();

 $responseCount = $result[0];

 echo "<TR>";
 echo "<TD>".$row[0]."</TD>";
 echo "<TD>".$row[1]."</TD>";
 echo "<TD>".$responseCount."</TD>";

 $statement = $dbh->prepare("SELECT count(survey_response) from surveys where id = ? and survey_response = '1' and question_number = ?;");
 $statement->execute([$_COOKIE["class"], $row[0]]);
 $result = $statement->fetch();
 echo "<TD>".$result[0]."</TD>";

 $statement = $dbh->prepare("SELECT count(survey_response) from surveys where id = ? and survey_response = '2' and question_number = ?;");
 $statement->execute([$_COOKIE["class"], $row[0]]);
 $result = $statement->fetch();
 echo "<TD>".$result[0]."</TD>";

 $statement = $dbh->prepare("SELECT count(survey_response) from surveys where id = ? and survey_response = '3' and question_number = ?;");
 $statement->execute([$_COOKIE["class"], $row[0]]);
 $result = $statement->fetch();
 echo "<TD>".$result[0]."</TD>";

 $statement = $dbh->prepare("SELECT count(survey_response) from surveys where id = ? and survey_response = '4' and question_number = ?;");
 $statement->execute([$_COOKIE["class"], $row[0]]);
 $result = $statement->fetch();
 echo "<TD>".$result[0]."</TD>";

 $statement = $dbh->prepare("SELECT count(survey_response) from surveys where id = ? and survey_response = '5' and question_number = ?;");
 $statement->execute([$_COOKIE["class"], $row[0]]);
 $result = $statement->fetch();
 echo "<TD>".$result[0]."</TD>";

 echo "</TR>";

 echo '</form>';
 

 echo "</table>";
 echo "<br>";
}

 //text questions

 foreach ( $dbh->query("SELECT question_number, question_text FROM questions where bool_response_type = 0;") as $row ) {

 echo "<table border='1'>";
 echo "<TR>";
 echo "<TH> Question Num </TH> ";
 echo "<TH> Question Text </TH>";
 echo "<TH> Response Rate </TH>";
 echo "</TR>";


 $statement = $dbh->prepare("SELECT count(survey_response) FROM surveys NATURAL JOIN teaches WHERE id = ? and question_number = ? and i_account = ?;");

 $statement->execute([$_COOKIE["class"], $row[0], $_COOKIE["userName"]]);

 $result = $statement->fetch();

 $responseCount = $result[0];

 echo "<TR>";
 echo "<TD>".$row[0]."</TD>";
 echo "<TD>".$row[1]."</TD>";
 echo "<TD>".$responseCount."</TD>";
 echo "</TR>";
 echo "<TR>";
 echo "<TD></TD>";
 echo "<TH> Responses </TH>";
 echo "<TD></TD>";
 echo "</TR>";

$statement = $dbh->prepare("SELECT survey_response from surveys where id = ? and question_number = ?");

$statement->execute([$_COOKIE["class"], $row[0]]);

$result = $statement->fetchAll();

foreach ($result as $row) {
echo "<TR>";
echo "<TD></TD>";
echo "<TD>".$row[0]."</TD>";
echo "<TD></TD>";
echo "</TR>";
}


 echo '</form>';
 

 echo "</table>";
 echo "<br>";

 }
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
 } ?>
	 <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
      </div>

<div class="footer">

  </div>
		
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
