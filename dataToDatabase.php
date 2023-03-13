<?php

$Host_name='localhost';
$username='abdulrahman';
$DATABASE_PASS = 'Alsafweh12';
$DATABASE_NAME = 'todo';

$con=mysqli_connect($Host_name,$username,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit("error in connection with database" . $con );
}

// $taskName=$_POST['taskName'];
// $description=$_POST['description'];
// $deadTime=$_POST['deadTime'];

//data insertion
function insert($taskName,$description,$deadTime){
    global $con;
$sql=mysqli_prepare($con,"insert into `todo` (`taskName`,`description`,`deadTime`,`deleted`,`CreatedBy`) Values (?,?,?'false',?)");
mysqli_stmt_bind_param($sql,"ssss",$taskName,$description,$deadTime,$Emailu);
mysqli_stmt_execute($sql);
}
?>