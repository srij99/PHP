<?php
$con = mysqli_connect("localhost", "root", "", "library management system");
$sql = "delete from category where id=$_GET[id]";
$result = mysqli_query($con, $sql);
//echo "<script>window.location.href='manage_book.php';</script>";
header('location:manage_category.php');
?>