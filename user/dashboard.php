<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: adminlogin.php");
exit(); }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
</head>
<body>
<div>
<p>Welcome <?php echo $_SESSION['username']; ?>....</p><br>

<a href='updateusername.php'>Update username</a><br><br>
<a href='updateemail.php'>Update Email Id</a><br><br>
<a href="retrieve.php">Data retrieve </a><br><br>
<a href="delete.php">user Delete </a><br><br>


<a href="adminlogout.php">Logout</a>

</div>
</body>
</html>











