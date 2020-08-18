
<?php
  if(!isset($username)){
    $username = "";
  }
  include "dbcon.php";
    if (isset($_POST['submit']) ){
        $username = filter_input(INPUT_POST,'username');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        $password1 = filter_input(INPUT_POST,'password1');
    
        if(empty($username)){
            $name_error = "Please enter username";
        }elseif(!preg_match("/^[a-zA-Z ]*$/",$username)){
            $name_error = "Only letters and white space allowed";
        }
      
        if(empty($email)){
            $email_error = "Please enter email id";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error = "Your email is invalid";
        }
        if(empty($password)){
            $password_error = "Please enter password";
        }elseif($password != $password1){
            $password_error = "the password does not meet the requirements!";
        }
 
        $sql_u = "SELECT * FROM user WHERE username='$username'";
        $sql_e = "SELECT * FROM user WHERE email='$email'";
        $res_u = mysqli_query($conn, $sql_u);
        $res_e = mysqli_query($conn, $sql_e);
  
        if (mysqli_num_rows($res_u) > 0) {
          $name_error = "Sorry... username already taken"; 	
        }else if(mysqli_num_rows($res_e) > 0){
          $email_error = "Sorry... email already taken"; 	
        }else{
             $query = "INSERT INTO user (username, email, password,password1) 
                      VALUES ('$username', '$email', '".md5($password)."', '".md5($password)."')";
             $results = mysqli_query($conn, $query);
             echo "Registeration success <br/><a href='login.php'> Login</a>.";
            // header("Location: login.php");
             exit();
        }
    }else { 
        
  ?>

<?php
    }
?>  


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
</head>
<body>

    <form  action="" method="post">
        <h1>Register</h1>
        Name:<input type="text"  name="username" placeholder="Username"   /><br>
        <?php if (isset($name_error)){?>
        <p><?php echo $name_error?><p>
        <?php }?>
        Email Id:<input type="email"  name="email" placeholder="Email Adress"><br>
        <?php if (isset($email_error)){?>
            <p><?php echo $email_error?><p>
        <?php }?>
        
        Password:<input type="password"  name="password" placeholder="Password"><br>
    
        
        Confirm Password:<input type="password "  name="password1" placeholder="Confirm Password"><br>
        <?php if (isset($password_error)){?>
            <p><?php echo $password_error?><p>
        <?php }?>

        <input type="submit" name="submit" value="Register" >

        <p>Already a member ?<a href="login.php">login </a></p>


        
       
    </form>


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>

</body>
</html>

