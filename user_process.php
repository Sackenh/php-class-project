<?php
		$connection = mysqli_connect("localhost", "root", "root", "assignment3");  //host, user, pass, database

		$id = mysqli_real_escape_string($connection, $_GET["id"]);

		$errormessage = "";

		if ($_POST["firstname"] == "")
			$errormessage .= "First name is required<br />";

		if ($_POST["lastname"] == "")
			$errormessage .="Last name is required<br />";

		if ($_POST["email"] == "") 
			$errormessage  .="Email is required<br />";

		if ($_POST["password"] == "")
			$errormessage .= "Password is required<br />";
        if (strlen($_POST["password"]) > 0 xor strlen($_POST["password"] < 6))
            $errormessage .= "Password is too short. <br />";
		if ($_POST["password"] != $_POST["password_confirm"])
			$errormessage .="Passwords do not match<br />";

		if ($errormessage != "") {
			include("user_template.php");
			die();
		}

?>
<!DOCTYPE html5>
<html>
	<body>
		<?php
			$fname = mysqli_real_escape_string($connection,$_POST["firstname"]);
			$lname = mysqli_real_escape_string($connection,$_POST["lastname"]);
			$email = mysqli_real_escape_string($connection,$_POST["email"]);
			$userpassword = mysqli_real_escape_string($connection,$_POST["password"]);

			$result = mysqli_query($connection, "SELECT id FROM users WHERE id='$id'");

		  if(mysqli_num_rows($result) >0){ //if there is a value found then it will change rather than add new user
			$sql = "UPDATE users SET firstname = '$fname', lastname = '$lname', email = '$email', userpassword = '$userpassword' WHERE id='$id'";

			mysqli_query($connection, $sql);

			echo "User Information has been updated. Redirecting automatically shortly.";
			?><meta http-equiv="refresh" content="5; URL = 'user_list.php'"/><?
		  } else { //add new user
			$sql = "insert into users (firstname,lastname,email,userpassword) values ('$fname','$lname','$email','$userpassword')";
		   
			mysqli_query($connection, $sql);

			echo "Successfully Registered New User. You will automatically be redirected shortly.";
			?><meta http-equiv="refresh" content="5; URL = 'user_list.php'"/><?
		  }
			
		  mysqli_close($connection);
		?>
		 
	</body>
</html>


