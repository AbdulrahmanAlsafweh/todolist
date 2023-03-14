<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    
    <!-- Form to create account -->

    <form action="">
        <input type="text" placeholder="First Name" required name="firstName"> <br>
        <input type="text" placeholder="Last Name" required name="lastName"> <br>
        <input type="email" placeholder="Email" required name="email"> <br>
        <input type="password" placeholder="Password" required minlength="8" name="password"> <br>
        <input type="submit" value="Create Account">
    </form>
    <!-- if he have acc -->
    <p><b>I have account <a href="LoginForm.php">Login</a></b></p>
    <!-- php section -->
    <?php
       

        if (!empty($_GET['error'])) {
            echo "<p>{$_GET['error']}</p>";
        }

    include "insertAccount.php";
        if(isset($_GET['email'])){
            $firstName=$_GET['firstName'];
            $lastName=$_GET['lastName'];
            $email=$_GET['email'];
            $password=$_GET['password'];
            insert($firstName,$lastName,$email,$password);
        }

    ?>
</body>
</html>