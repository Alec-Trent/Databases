
<?php 

  print_r($_POST);
 ?>

Please change your password:

<form method=post action=changePass.php>
Password: <input type="password" name="password">
<br>
<input type="submit" name="change" value="Change Password">
</form>
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