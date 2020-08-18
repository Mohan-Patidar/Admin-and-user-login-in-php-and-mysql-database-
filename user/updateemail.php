<?php
include 'dbcon.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE user set  email='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Email update  Successfully";
}
   
$result = mysqli_query($conn,"SELECT * FROM user WHERE id ='" . isset( $_GET['id']) . "'");
$row= mysqli_fetch_array($result);

?>
<html>
<head>
<title>Update email id</title>
</head>
<body>
<form  method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">

</div>
id: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="id"  value="<?php echo $row['id']; ?>">
<br>

Email:<br>
<input type="text" name="email" value="<?php echo $row['email']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
<a href='index.php'>Back</a>
</body>
</html>