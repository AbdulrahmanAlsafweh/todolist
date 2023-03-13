<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-List</title>
    
</head>
<body>
    
<!-- Start of form -->
    <form   action="index.php" method="post" >
       
    <input type="text" name="taskName" placeholder="Task Name" required >
    <textarea name="description"  required cols="30" rows="10" placeholder="Description"></textarea>
    <input type="date" name="deadTime" required >
    <input type="submit" value="Create">
    <hr>


    </form>
<!-- End of Form -->


<!-- Start of table -->
   <table> <thead> <th>Task Name</th> <th>Description</th> <th>Dead Time</th> <th>Delete</th> </thead>
   <tbody>
    <?php
    session_status();

    require("dataToDatabase.php");
//  Connection with database   


$Host_name='localhost';
$username='abdulrahman';
$DATABASE_PASS = 'Alsafweh12';
$DATABASE_NAME = 'todo';

$con=mysqli_connect($Host_name,$username,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit("error in connection with database" . $con );
}


// Getting variable and pass them

if( isset ($_POST['taskName'])){
$taskName=$_POST['taskName'];
$description=$_POST['description'];
$deadTime=$_POST['deadTime'];

insert($taskName,$description,$deadTime,$_SESSION['Emailu']);
}


  // Insert the task into database


// Show The tasks in table
$sql=mysqli_prepare($con,"Select `id`,`deleted`,`taskName`, `description` , `deadTime` from `todo` ");
mysqli_stmt_execute($sql);
$result=mysqli_stmt_get_result($sql);

while($row=mysqli_fetch_assoc($result))

{
  if ($row['deleted'] == "false"){
    echo "<tr> <td>{$row['taskName']}</td> <td> {$row['description']} </td> <td> {$row['deadTime']} </td> <td><button class='btn btn-danger' onclick='deleteRow(this, {$row['id']})'>Delete</button></td></tr>";
}

}




?>
</tbody>
</table><!--End Of Table -->



</body>
<!-- This script is to delete the row -->
<script>
                function deleteRow(btn, id) {
                  var row = btn.parentNode.parentNode;
                  var xhr = new XMLHttpRequest();
                  xhr.open("POST", "delete.php", true);
                  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                      row.parentNode.removeChild(row);
                    }
                  };
                  xhr.send("id=" + id);
                }
        </script>

</html>