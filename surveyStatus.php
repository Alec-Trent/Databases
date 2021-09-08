<!DOCTYPE html>
<html>
<head>
	<title>Choose Course</title>
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
  	<h1 style="color:black; font-family:Tahoma">Survey Status</h1>
	 <?php
	try {
	 $config = parse_ini_file("db.ini");
	 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
	 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 echo "<table border='1'>";
	 echo "<TR>";
	 echo "<TH> Course </TH> ";
	 echo "<TH> Completed On </TH>";
	 echo "</TR>";

	 $statement = $dbh->prepare("SELECT id, survey_ts, survey_status FROM register WHERE s_account = ?;");
	 $statement->execute([$_COOKIE["userName"]]);

	 $result = $statement->fetchAll();

	 foreach ($result as $row) {


	 echo "<TR>";
	 echo "<TD>".$row[0]."</TD>";

	 if ($row[2] == 1) {
	 	echo "<TD>".$row[1]."</TD>";
	 }

	 else{
	 	echo "<TD> Not Completed </TD>";
	 }

	 echo "</TR>";

	 echo '</form>';
	 }

	 echo "</table>";
	} catch (PDOException $e) {
	 print "Error!" . $e->getMessage()."<br/>";
	 die();
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
