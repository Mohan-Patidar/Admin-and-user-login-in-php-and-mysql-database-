<?php
include 'dbcon.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE user set  username='" . $_POST['username'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Username update Successfully";
}
   
$result = mysqli_query($conn,"SELECT * FROM user WHERE id ='" . isset( $_GET['id']) . "'");
$row= mysqli_fetch_array($result);

?>
<html>
<head>
<title>Update username</title>
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
Username: <br>
<input type="text" name="username" class="txtField" value="<?php echo $row['username']; ?>">
<br>

<input type="submit" name="submit" value="Submit" class="buttom">

</form>
<a href='index.php'>Back</a>
</body>
</html>