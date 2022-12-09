<?php
error_reporting(0);
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");

} elseif ($_session['usertype'] == 'student') {
    header("location:login.php");

}

$host = "localhost";
$user = "root";
$password="";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT* FROM user WHERE usertype='student'";

$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>

	<?php
    include 'admin_css.php';
    ?>

    <style type="text/css">
        .table_th{
            padding: 20px;
            font-size: 20px;
        }
        .table_td{
            padding:20px;
            background-color: skyblue;
        }

    </style>
</head>

<body>

	<?php

include 'admin_sidebar.php';
?>


	<div class="content">

        <center>

		<h1>Student Data</h1>

        <?php
        if($_SESSION['message'])
        {
           echo $_SESSION['message'];
        }
        unset($_SESSION['message']);

        ?>
        <br><br>

        <table border="1px">
            <tr>
                <th class="table_th">Username</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Password</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>

            <?php
            while($info=$result->fetch_assoc()){

            ?>
            <tr>
                <td class="table_td">
                    <?php  echo"{$info['username']}";?>
                </td>
                <td class="table_td">
                    <?php  echo"{$info['email']}";?>
                </td>
                <td class="table_td">
                    <?php  echo"{$info['phone']}";?>
                </td>
                <td class="table_td">
                    <?php  echo"{$info['password']}";?>
                </td>
                <td class="table_td">
                    <?php  
                    echo "<a onClick=\" javascript:return confirm (' ARE YOU SURE TO DELETE THIS') ; \" class='btn btn-danger'href='delete.php?student_id={$info['id']}'>Delete</a>";
                    ?>
                </td>

                <td class="table_td">
                    <?php  echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'> Update </a>"; ?>
                </td>

            </tr>

            <?php
            }
            ?>

        </table>
        </center>


	</div>

</body>

</html>