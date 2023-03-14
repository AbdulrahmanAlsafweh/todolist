<?php

   // connection with database

   $Host_name='localhost';
   $username='abdulrahman';
   $DATABASE_PASS = 'Alsafweh12';
   $DATABASE_NAME = 'todo';

   $con=mysqli_connect($Host_name,$username,$DATABASE_PASS,$DATABASE_NAME);
   if(mysqli_connect_error()){
       exit("error in connection with database" . $con );
   }

//    This function is to insert the accou tot database
   function insert($firstName,$lastName,$email,$password){
    global $con;
    $stmt="SELECT * FROM `user` ";
    $sql=mysqli_prepare($con,$stmt);
    mysqli_stmt_execute($sql);
    $result=mysqli_stmt_get_result($sql);

    while($row=mysqli_fetch_assoc($result)){
       
        if($email == $row['Email']){
            header("location:createAccount.php?error=Error");
            exit;
        }
        else {
        $sql=mysqli_prepare($con ,"insert into `user` (`FirstName`,`LastName`,`Email`,`Password`) values (?,?,?,?)");
        mysqli_stmt_bind_param($sql,"ssss",$firstName,$lastName,$email,$password);
        mysqli_stmt_execute($sql);
            header("location:createAccount.php?error=Done");
            exit;
    }
    }

   }