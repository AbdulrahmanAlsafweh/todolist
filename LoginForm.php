<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="LoginForm.php" method="GET">
    <input type="Email" placeholder="Email" required name="Email"> <br>
    <input type="password" placeholder="Password" required minlength="8" name="Password">
    <input type="submit" value="Login">
    </form>

    <?php
    
    
    require("Login.php");
    $Email=$_GET['Email'];
    $Password=$_GET['Password'];
    Check($Email,$Password);

    ?>

</body>
</html>