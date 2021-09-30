<?php 
   session_start();
   include("config.php");

   $errormessage = "";

   if($_POST["username"]==""){
       $errormessage .= "Username is required. <br />";
   }

   if($_POST["password"]==""){
       $errormessage .= "Password is required. <br />";
   }

   if($errormessage != ""){
       include("login.php");
       die();
   }

   $loginUsername = mysqli_real_escape_string($connection, $_POST["username"]);
   $loginPassword = mysqli_real_escape_string($connection, $_POST["password"]);

   $result = mysqli_query($connection, "SELECT * from USERS where email = '$loginUsername' and userpassword='$loginPassword'");

   if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row["id"];
        }

        $_SESSION['userid'] = $id;
        echo "Login Successful. Redirecting Automatically Shortly.";
        ?><meta http-equiv="refresh" content="5; URL = 'user_list.php'"/><? 

   } else {

        $errormessage .= "Invalid Username or Password.<br />";
        include("login.php");
        die();
   }
?>



<!DOCTYPE html5>
<html>
    <body>
        

    </body>

</html>
