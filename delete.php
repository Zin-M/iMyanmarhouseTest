<?php session_start(); ?>
<?php
require'db_connect.php';
$id=$_GET['id'];
$sql="DELETE FROM users WHERE id=$id";
mysqli_query($conn,$sql);
$_SESSION['successMsg']=" User deleted successfully";
header("location:list.php");
?>