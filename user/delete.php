<?php
include 'dbcon.php';
if(count($_POST)>0) {
mysqli_query($conn,"DELETE from user  WHERE id='" . $_POST['id'] . "'");
$message = "Delete user Successfully..";
}
   
$result = mysqli_query($conn,"SELECT * FROM user WHERE id ='" . isset( $_GET['id']) . "'");
$row= mysqli_fetch_array($result);

?>
<html>
<head>
<title>Delete user</title>
</head>
<body>
<form  method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">

</div>
id: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="id" placeholder="Input id to delete" value="<?php echo $row['id']; ?>">
<br>
<input type="submit" name="delete" value="Delete" class="buttom">

</form>
<a href='index.php'>Back</a>
</body>
</html>