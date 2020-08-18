<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: adminlogin.php");
exit(); }
?>
<?php

include 'dbcon.php';
 
$result = mysqli_query ($conn,"Select * FROM user");


?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 </head>
<body>
<p>Welcome <?php echo $_SESSION['username']; ?>....</p><br>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
    <td>id</td>
    <td>User name</td>
    <td>Email id</td>
    <td>Password</td>
    <td>Delete</td>
    <td>Update</td>
    
  </tr>
<?php

while($row = mysqli_fetch_array($result)) {
?>
<tr>
  <td><?php echo $row["id"]; ?></td>
  <td><?php echo $row["username"]; ?></td>
  <td><?php echo $row["email"]; ?></td>
  <td><?php echo $row["password"]; ?></td>
  
  <td><button><a href ="delete.php?id=<?php echo $row["id"];?>">Delete</a></button></td>
  <td><button><a href ="update.php?id=<?php echo $row["id"];?>">Update</a></button></td>
</tr>
<?php

}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>

<a href="adminlogout.php">Logout</a>
 </body>
</html>