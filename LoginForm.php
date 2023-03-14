<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- Form for Login -->
    <form action="LoginForm.php" method="GET">
    <input type="Email" placeholder="Email" required name="Email"> <br>
    <input type="password" placeholder="Password" required minlength="8" name="Password">
    <br>
    <input type="submit" value="Login">
    </form>

    <!-- Link to Register(Create Account) -->
    <p>
        <b>I Don't Have Account, <a href="createAccount.php">Sign up</a></b>
    </p>
    <?php
    
    
    require("Login.php");
    if(isset($_GET['Email'])){
    $Email=$_GET['Email'];
    $Password=$_GET['Password'];
    Check($Email,$Password);}

    ?>

</body>
</html>