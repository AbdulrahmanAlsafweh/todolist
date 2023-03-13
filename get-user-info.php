
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<table> <thead> <th>Task Name</th> <th>Description</th> <th>Dead Time</th> <th>Delete</th> </thead>
   <tbody>
  
<?php

$Host_name='localhost';
$username='abdulrahman';
$DATABASE_PASS = 'Alsafweh12';
$DATABASE_NAME = 'todo';

$con=mysqli_connect($Host_name,$username,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit("error in connection with database" . $con );
}

if (isset($_GET['user'])) {
    $selected_user = $_GET['user'];
    $sql = mysqli_prepare($con, "SELECT * FROM `user` WHERE `Email`=?");
    mysqli_stmt_bind_param($sql, "s", $selected_user);
    mysqli_stmt_execute($sql);
    $result = mysqli_stmt_get_result($sql);
    $row = mysqli_fetch_assoc($result);

    // print some data of user
    $output = "<h2>User Info</h2>";
    $output .= "<p>First Name: " . $row['FirstName'] . "</p>";
    $output .= "<p>Last Name: " . $row['LastName'] . "</p>";
    $output .= "<p>Email: " . $selected_user . "</p>";


    echo $output;
}

// sql to get the tasks of selected user

$sql = "SELECT id, deleted, taskName, description, deadTime, CreatedBy FROM todo WHERE CreatedBy = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $selected_user);

// Execute SQL statement and handle errors
if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr> <td>{$row['taskName']}</td> <td> {$row['description']} </td> <td> {$row['deadTime']} </td> <td><button class='btn btn-danger' onclick='deleteRow(this, {$row['id']})'>Delete</button></td></tr>";
    }
} else {
    echo "Error executing SQL statement: " . mysqli_error($con);
}

// Close database connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
</tbody>
</table>

