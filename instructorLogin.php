<?php
session_start();
if (isset($_POST["logout"])) {
session_destroy();
header("Location: Login.html");
    exit();
}

// user entered the data */
if (isset($_POST["userid"]) ) {

try { 
 $config = parse_ini_file("db.ini");
 $dbh = new PDO($config['dsn'], $config['username'],$config['password']);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //prepares statment
 $statement = $dbh-> prepare("select i_account, password from instructor where i_account = ?");
 //executes
 $statement->execute([$_POST['userid']]);


 if ($statement->rowCount() == 1) {
 	$result = $statement->fetch();
 	$var = setcookie("userName", $_POST["userid"], time()+600, "/");
 	$var = setcookie("loginType", "0", time()+600, "/");
 	if ($result[1] == "") {
 		header("Location: changePass.php");
		exit();
 	}
	 else if ($result[1] == sha1($_POST["password"])) {
 		header("Location: instructorLanding.html");
 		exit();
 	}
 	else {
 		print("Wrong password!");
 	}
 }
 else {
 	print("user does not exist");
 }

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

  <div class= "content">
  	<br>
  	<h1>Instructor Login:</h1>

	<form method=post action=instructorLogin.php>
		<label for="uName">User Name: </label>
		<input type="text" name="userid">

		<br>

		<label for="password">Password: </label>
		<input type="password" name="password">
		
		<br>
		<br>

		<button class="button button" type="submit" name="login">Log In</button>
		<button class="button button" type="submit" name="logout">Log Out</button>

	</form>
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
  padding-left: 4%;
 }

 label { 
 	color: black; 
 	font-weight: bold; 
 	display: block; 
 	width: 150px; 
 	float: left; 
 	font-size: 24px;
 	} 

 input[type=text] {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid gold;
  border-radius: 4px;
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
  padding: 32px 64px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 24px;
  margin: 4px 2px;
  cursor: pointer;
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