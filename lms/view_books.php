<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "library management system");


$name = "";
$email = "";
$mobile = "";
$address = "";
$email=$_SESSION["email"];
$query = "Select * from `users` where email='$email'";
$result = mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result)){
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $address = $row['address'];
    $password = $row['password'];
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
           
            <ul class="nav navbar-right navbar-nav ">
            <li class="nav-item ">
                    <a class="nav-link text-light" data-bs-toggle="modal" data-bs-target="#popup">View Profile</a>
                </li>
                    
                <li class="nav-item"><a class="nav-link text-light" href="logout.php">Logout</a></li>
                
            </ul>

        </div>

    </nav><br>
    <span><marquee loop="50" behavior="slide" direction="right">Welcome to Library Management System!!!</marquee></span><br><br>
    
    <!--//////////////////////////////// View Profile /////////////////////////////////////////-->
    <div id="popup" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title ">Profile</h4>
      </div>
      <div class="modal-body">
        <form class="p-2 text-center">
            <strong><label for="name">Name:</label>
            <?php echo $name;?><br>
            <label for="email">Email:</label>
            <?php echo $email;?><br>
            <label for="mobile">Mobile Number:</label>
            <?php echo $mobile;?><br>
            <label for="address">Address:</label>
            <?php echo $address;?><br></strong>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-2"></div>

    <div class="col-md-8 ">
    <form class="text-center">
            <table class=" table table-bordered  mt-5 " >
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    
                    
                </tr>
                <?php
                $id = "";
                $book_name = "";
                $sql = "Select id,book_name from issued where user_id=$_SESSION[id]";
                $res = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $book_name = $row['book_name'];
                
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $book_name;?></td>
                        
                        
                    </tr>
                    <?php
                    }
                
                ?>


            </table>
        </form>

        
    </div>
    <div class="col-md-2"></div>
      </div>

        
      
    



</body>
</html>