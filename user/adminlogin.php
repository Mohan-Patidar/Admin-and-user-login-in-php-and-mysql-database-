<?php 
include "dbcon.php";
session_start();
if(isset($_SESSION['user'])){
    header("location: adminlogin.php");   
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <h1>Admin login</h1>
    <form method="POST">
        <?php if (isset($name_error)){?>
        <p><?php echo $name_error?><p>
        <?php }?>
        Username:<input type="text" name="username" placeholder="Username" /><br>
        Password:<input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="login" value="Login">
    </form>
<?php

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM admin WHERE name = '$username' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    
    if ($count==1) {
        session_register("username");
        $_SESSION['name'] = $username;
         
        header("location: retrieve.php");
       
      }
    else{
        $name_error = "Your Login Name or Password is invalid";  
        header("location: adminlogin.php");
       
    }
}
?>
<a href='index.php'>Back</a>
</body>
</html>