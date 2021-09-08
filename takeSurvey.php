<!DOCTYPE html>
<html>
<head>
	<title>Course List</title>
</head>
	<body>

<body>
  <link rel="stylesheet" type="text/css" href="style.css">
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
    $var = setcookie("class", $_POST["class"], time()+600, "/");
    if (array_key_exists('submit', $_POST) ) {

      print_r($_POST);
    }

    try {

     $config = parse_ini_file("db.ini");
     $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      ?>
      <form method = post action=submit.php >

     <?php
        foreach ( $dbh->query("SELECT question_number, question_text FROM questions where bool_response_type = 1;") as $row ) {

      echo "<p>".$row[0].". ".$row[1]."</p>";
      echo '<input type="radio" name="question'.$row[0].'" value="1">';
      echo '<label for="1">Strongly Agree  </label> ';
      echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

        echo '<input type="radio" name="question'.$row[0].'" value="2">';
      echo '<label for="2"> Agree </label>';
      echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

     
      echo '<input type="radio" name="question'.$row[0].'" value="3">';
      echo '<label for="3">Neutral    </label>';  
      echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

      
      echo '<input type="radio" name="question'.$row[0].'" value="4">';
      echo '<label for="4">Disagree    </label>'; 
      echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';


      echo '<input type="radio" name="question'.$row[0].'" value="5">';
      echo '<label for="5">Strongly Disagree </label>';
     
      echo '</br>';
     }



     foreach ( $dbh->query("SELECT question_number, question_text FROM questions where bool_response_type = 0;") as $row ) {
        echo "<p>".$row[0].". ".$row[1]."</p>";
        echo '<textarea type = "text" size ="500" name="question'.$row[0].'"style = "height:200px; width:500px;""></textarea>';
        echo '<br>';
      }
     
        ?>
        <input type="submit" name="submit" value = "Submit">
      
        </form>
        <?php

    }
     catch (PDOException $e) {
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
     } 
     ?>
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
