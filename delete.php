<?php

// connection to  data base



$Host_name='localhost';
$username='abdulrahman';
$DATABASE_PASS = 'Alsafweh12';
$DATABASE_NAME = 'todo';

$con=mysqli_connect($Host_name,$username,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit("error in connection with database" . $con );
}
$id=$_POST['id'];
$sql=mysqli_prepare($con,"update `todo` set `deleted` = 'true' where `id` =?");
mysqli_stmt_bind_param($sql,"i",$id);
mysqli_stmt_execute($sql);

// mysqli_query($con, "update  `todo` set `deleted`='true' where  id = $id ");