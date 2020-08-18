<?php
include 'dbcon.php';

if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $q = "UPDATE user set  id = $id , username = '$username', email = '$email'   WHERE id=$id ";
    
    $query = mysqli_query($conn,$q);

    header('location:retrieve.php');

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>update</title>
</head>
<body>

    <form  action="" method="post">
        <h1>Update</h1>
        Name:<input type="text"  name="username" placeholder="Username"   /><br>
        
        Email Id:<input type="email"  name="email" placeholder="Email Adress"><br>
        
        <input type="submit" name="submit" value="update" >

    </form>

</body>
</html>


