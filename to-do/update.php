<?php
include 'connect.php';
$id = $_GET['updateid'];
if(isset($_POST['update'])){

    $task = $_POST["updatedtask"];
    

    $sql = "update `to_do` set `Task`='$task' where `Sr.No`='$id'";
    $result = mysqli_query($con, $sql);

    if($result){
        header("location: main.php");
    }else{
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container text-center mt-5">
    <form method="post" autocomplete="off">
  <div class="mb-3 w-100">
    <label for="exampleInputEmail1" class="form-label "><h1>Update To-Do Task</h1></label></div>
    <div class="container mb-3 w-75 "><input type="text" class="form-control mt-3 " placeholder="Enter new task" name="updatedtask">
    
  </div>
  
  <button type="submit" class="btn btn-success mt-3 w-25 btn-lg " data-bs-toggle="button"  name="update">Update Task</button>
</form>
    </div>
    
</body>
</html>