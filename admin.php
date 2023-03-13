<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <!-- The DropDown MEnu -->

<label for="User">Select User</label>
<select name="UserName" id="User">
<?php

// sessionstart
session_start();

// connection with database

$Host_name='localhost';
$username='abdulrahman';
$DATABASE_PASS = 'Alsafweh12';
$DATABASE_NAME = 'todo';

$con=mysqli_connect($Host_name,$username,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit("error in connection with database" . $con );
}
// end of connection

$sql=mysqli_prepare($con,"Select ")


?>
</select>


</body>
</html>

