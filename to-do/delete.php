<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "delete from `to_do` where `Sr.No`=$id";
    $result = mysqli_query($con, $sql);
    if($result){
        header('location:main.php');
    }else{
        die(mysqli_error($con));
    }

}
?>

