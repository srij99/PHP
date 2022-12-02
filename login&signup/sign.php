<?php
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];

    
$sql="Select * from `registration` where
username='$username'";
$result=mysqli_query($con, $sql);
if($result){

    $num=mysqli_num_rows($result);
    if($num>0){
       /*  echo "User already exist"; */
       $user=1;
    }else{
        $sql="insert into `registration`(username, password) values('$username','$password')";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Sign-up Successful";
        $success=1;
    }else{
        die(mysqli_error($con));
    }

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
    <title>Sign-up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>


    <h1 class="text-center mt-2">Sign-up</h1>

<div class="container mt-5" >

<form action="sign.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" placeholder="Enter your Username" name="username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary w-100 mt-3">Sign up</button>
</form>

<?php
if($user){
echo ' <div class="alert alert-warning alert-danger fade show mt-5" role="alert">
 User already exist.

</div>';

}

if($success){
    echo ' <div class="alert alert-warning alert-success fade show mt-5" role="alert">
 Sign-up successful.

</div>
<div class="container mt-2">
    <h5>Go to <a href="login.php">Login Page</h5>
</div>

';
    
    }

?>




</div>
    
</body>
</html>