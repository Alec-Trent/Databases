<?php

// user entered the data */
if (array_key_exists('change', $_POST) ) {
$pass = $_POST["password"];
try { 

 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //prepares statment
 if ($_COOKIE["loginType"] == "1") {
 	$statement = $dbh-> prepare("UPDATE student SET password = ? WHERE s_account = ? ;");
 }
 else {
 	$statement = $dbh-> prepare("UPDATE instructor SET password = ? WHERE i_account = ? ;");
 }
 //executes
 $statement->execute([sha1($pass), $_COOKIE["userName"]]);

} catch (PDOException $e) {
 print "Error!" . $e -> getMessage()."<br/>";
 die();
}
}
?>

<html>
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
    <h1 style="color:black; font-family:Tahoma">Please change your password</h1>

    <form method=post action=changePass.php>
    <label for="password">Password: </label>
    <input type="password" name="password">
    <br>
    <br>
    <input type="submit" name="change" value="Change Password">
    </form>
    <?php 
    if (array_key_exists('change', $_POST) ) {
      echo "Password Changed Successfully <br>";
    }
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


