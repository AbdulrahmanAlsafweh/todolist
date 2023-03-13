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

        $sql=mysqli_prepare($con,"Select `Email`,`FirstName`,`LastName` from `user`");
        mysqli_stmt_execute($sql);
        $result=mysqli_stmt_get_result($sql);

        while($row=mysqli_fetch_assoc($result)){
            echo "<option value='{$row['Email']}'>{$row['FirstName']}</option>";
        }

        mysqli_close($con);
    ?>
</select>

<div id="user-info"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#User").change(function() {
            var selected_user = $(this).val();
            if (selected_user != "") {
                $.ajax({
                    url: "get-user-info.php",
                    data: {user: selected_user},
                    success: function(result) {
                        $("#user-info").html(result);
                    }
                });
            } else {
                $("#user-info").html("");
            }
        });
    });
</script>



</body>
</html>

