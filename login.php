<!DOCTYPE html>
<head>

</head>
<body>
    <form action = "login_process.php" method = "POST">
    <?php 
        if(isset($errormessage)){
        ?>
        <span style = "color:red;"><?php echo $errormessage;?></span>
        <?
        }
    ?>
    Username/Email: <input type = "text" name = "username" value = "<?php echo htmlspecialchars($_POST["username"], ENT_QUOTES);?>"><br />

    Password: <input type = "password" name = "password" value = "<?php echo htmlspecialchars($_POST["password"], ENT_QUOTES);?>"><br />

    <input type = "Submit">
    
    </form>
</body>
</html>