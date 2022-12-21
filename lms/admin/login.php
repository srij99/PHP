<?php
$success=1;
session_start();



if($_SERVER['REQUEST_METHOD']=='POST'){
    $con = mysqli_connect("localhost", "root", "", "library management system");
    $email=$_POST["email"];
    $password=$_POST["password"];

    
$sql="Select * from `admin` where
email='$email' and password='$password'";
$result=mysqli_query($con, $sql);
if($result){

    $num=mysqli_num_rows($result);
    if($num>0){
       $success=1;
       
       
       $_SESSION['name']=$name;
       
       $_SESSION['email']=$email;
       
       header('location:admin_home.php');

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
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
    <style>
        #side-bar{
            background-color: cyan;
            padding: 50px;
        }
        #main-content{
            background-color: whitesmoke;

        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand p-3 text-light" >Library Management System</a>
            </div>
            <ul class="navbar-right navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="../register.php">Back</a>
                </li>
                
                
            </ul>
        </div>

    </nav><br>
    <span><marquee loop="50" behavior="slide" direction="right">Welcome to Library Management System!!!</marquee></span><br><br>
    <div class="container-fluid ">
  <div class="row">
    <div class="col-md-4" id="side-bar">
      <h5>Library Timing</h5>
      <ul>
        <li>Opening Time: 9:00 AM</li>
        <li>Closing Time: 8:00 AM</li>
        <li>Sunday Off</li>
    </ul>
    <h5>What we provide?</h5>
      <ul>
        <li>Furniture</li>
        <li>Air Conditioner</li>
        <li>Beverages</li>
    </ul>

    </div>
    <div class="col-md-8" id="main-content">
        <center><h3 class=" mt-5">Admin Login</h3></center>
        <form action="" method="post" class="m-5"  >
            
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control mb-3" placeholder="Enter your E-mail id" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control mb-4" placeholder="Enter your Password" required>
            </div>
            
            <div class="form-group text-center">
                <button type="submit" name="submit" class=" btn btn-primary  w-50">Login</button>
            </div>
            
        </form>
        <?php
if(!$success){

    echo ' <div class="alert alert-warning alert-danger fade show m-5" role="alert">
 Invalid Credentials.
</div>';
    
    }

?>
      
    </div>
  </div>
    </div>



  
</body>
</html>