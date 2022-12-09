<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("location:login.php");

} elseif ($_session['usertype'] == 'student') {
    header("location:login.php");

}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$name=$_SESSION['usrname'];

$sql = "SELECT * FROM user WHERE username='$name'";

$result = mysqli_query($data, $sql);

$info=mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>

	<?php
    include 'student_css.php';
    ?>

    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;

        }
        .div_deg{
            background-color:skyblue;
            width:500px;
            padding-top: 70px;
            padding-bottom: 70px;


        }

    </style>

</head>

<body>


<?php
include 'student_sidebar.php'
?>

<div class="content">
    <center>
        <h1>Update Profile</h1>
        <br><br>
    <form>
        <div class="div_deg">

        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo "{$info['username']}" ?> ">
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo "{$info['email']}"?> ">
        </div>
        <div>
            <label>Phone</label>
            <input type="text" name="phone"value="<?php echo "{$info['phone']}"?> ">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password" value="<?php echo "{$info['password']}" ?>" >
        </div>
        <div>
            <input  type="submit" class="btn btn-primary" name="update">
        </div>

        </div>
    </form>
    </center>
</div>

</body>

</html>
