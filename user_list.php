<?php
			session_start();
			if(intval($_SESSION["userid"])==0){
				include("login.php");
				die();
			}

			include("config.php");
			
			$sql = "SELECT id, firstname, lastname, email FROM users";
			$result = mysqli_query($connection, $sql);
			?>
			<h1 align = "center"> User List  </h1>
				<table border = "1" align = "center" style="line-height:25px;">
					<tr>
						<th> User ID </th>
						<th> First Name </th>
						<th> Last Name </th>
						<th> Email </th>
						<th> EDIT </th>
						<th> DELETE </th> 

					</tr>
			<?php
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["firstname"]; ?></td>
						<td><?php echo $row["lastname"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><a href = "user_edit.php?id=<?php echo $row["id"]; ?>"> EDIT USER</a></td>
						<td><a href = "user_delete.php?id=<?php echo $row["id"]; ?>"> DELETE USER</a></td>
					</tr>
				<?php
				}
			} else { 
				echo "0 results";
			}
			
			mysqli_close($connection);
		?>
<!DOCTYPE html5>
<html>
	<head>
		<title> User List. Click here to </title>
		<a href = "logout.php">Logout</a>
	</head>
	<body>
		<p style = "text-align:center;"><a href = "user_template.php"> Add New User </a></p>

	</body>
</html>
