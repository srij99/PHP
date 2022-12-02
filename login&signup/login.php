<?php
$success=1;


if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];

    
$sql="Select * from `registration` where
username='$username' and password='$password'";
$result=mysqli_query($con, $sql);
if($result){

    $num=mysqli_num_rows($result);
    if($num>0){
       $success=1;
       session_start();
       $_SESSION['username']=$username;
       header('location:home.php');

    }else{
        $success=0;

    }

    
}
    



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>




    <h1 class="text-center mt-2">Login</h1>

<div class="container mt-5" >

<form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" placeholder="Enter your Username" name="username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
</form>

<?php
if(!$success){

    echo ' <div class="alert alert-warning alert-danger fade show mt-5" role="alert">
 Invalid Credentials.

</div>
<div class="container mt-2">
    <h5>New User? <a href="sign.php">Sign-up</h5>
</div>


';
    
    }

?>




</div>
    
</body>
</html>