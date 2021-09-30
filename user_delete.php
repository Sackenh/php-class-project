<?php
			session_start();
			if(intval($_SESSION["userid"])==0){
				include("login.php");
				die();
			}
			include("config.php");
			$id = mysqli_real_escape_string($connection, $_GET["id"]);
			
			$sql = "DELETE FROM users WHERE id='$id'";

			if($sql){
				echo "Succesfully Removed User from Database";
			} else { 
				echo "There was an error with trying to remove this user from the Database";
			}

			mysqli_query($connection, $sql);

			mysqli_close($connection);
?>
<!DOCTYPE html5>
<html>

	<head> 
		<title> Delete User </title>
	</head>

	<body> 

		
		 
		<meta http-equiv="refresh" content="5; URL = 'user_list.php'"/>

	</body>
</html>