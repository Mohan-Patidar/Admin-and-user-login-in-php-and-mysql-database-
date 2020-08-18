<?php
include 'dbcon.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$query = " DELETE FROM `user` WHERE id = '$id' ";
mysqli_query($conn,$query);

header('location:retrieve.php');

?>
