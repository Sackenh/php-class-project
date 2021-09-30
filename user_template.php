<!DOCTYPE html5>
<html>
	<head>
		<title>Adding New User</title>
		<a href = "logout.php">Logout</a>
	</head>
	<body>
	<?php $id = mysqli_real_escape_string($connection, $_GET["id"]); ?>
		<form action="user_process.php" method="POST">
			<?php
				if (isset($errormessage)) {
					?>
					<span style="color: red;"><?php echo $errormessage;?> </span>
					<?
				}
			?>	

			First Name: <input type="text"  name="firstname" value="<?php echo htmlspecialchars($_POST["firstname"], ENT_QUOTES);?>"><br />
			Last Name: <input type="text" name="lastname" value="<?php echo htmlspecialchars($_POST["lastname"], ENT_QUOTES);?>"><br />
			Email: <input type="text" name="email" value="<?php echo htmlspecialchars($_POST["email"], ENT_QUOTES);?>"><br />
			Password: <input type="password" name="password" value="<?php echo htmlspecialchars($_POST["password"], ENT_QUOTES);?>"><br />
			Confirm Password: <input type="password" name="password_confirm" value="<?php echo htmlspecialchars($_POST["password_confirm"], ENT_QUOTES);?>"><br />
            
            <input type = "Submit">
                


        
        
            </form>
        </body>
    </html>