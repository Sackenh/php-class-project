<?php 
	session_start();
			if(intval($_SESSION["userid"])==0){
				include("login.php");
				die();
			}
	include("config.php");

	$id = mysqli_real_escape_string($connection, $_GET["id"]);
	
	?>
		<form action="user_process.php?id=<?php echo $id; ?>" method="POST">
			<?php
			include 'user_template.php';
			if (isset($errormessage)) {
				?>
				<span style="color: red;"><?php echo $errormessage;?> </span>
				<?
			}
			
			

			$sql = "SELECT firstname, lastname, email, userpassword FROM users WHERE id='$id'";

			$result = mysqli_query($connection, $sql);
			
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo $row["firstname"];
					echo " - ";
					echo $row["lastname"];
					echo " - ";
					echo $row["email"];
					echo " - ";
					echo $row["userpassword"];
					echo " - ";
				}
			} else {
				echo "No Results Available";
			}
		?>	
<!DOCTYPE html5>
<html>
	<head> 
		<title> Edit User </title>
		<a href = "logout.php">Logout</a>
	</head>
	<body>
		</form>
	</body>
</html>
