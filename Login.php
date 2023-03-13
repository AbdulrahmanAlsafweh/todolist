<?php
Session_start();


// Connection with database

$Host_name='localhost';
$username='abdulrahman';
$DATABASE_PASS = 'Alsafweh12';
$DATABASE_NAME = 'todo';

$con=mysqli_connect($Host_name,$username,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit("error in connection with database" . $con );
}

// $Email=$_GET['Email'];
// $Password=$_GET['Password'];


// The function that check if the email and password are true
function check($Email,$Password){
    global $con;
$sql=mysqli_prepare($con,"Select `Email`,`Password` From `user` ");
mysqli_stmt_execute($sql);
$result=mysqli_stmt_get_result($sql);

while($row =mysqli_fetch_assoc($result)){
    if($Email == "Admin@gmail.com" && $Password == "12345678Admin"){
        header("Location:admin.php");
    }
  elseif($Email == $row['Email'] && $Password == $row['Password']){
    $_SESSION["Emailu"]=$Email;
    header("Location:index.php");
  }
}

}
?>