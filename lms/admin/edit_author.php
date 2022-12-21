<?php
require('function.php');
session_start();
$con = mysqli_connect("localhost", "root", "", "library management system");

$name = "";
$email = "";
$mobile = "";
$address = "";
$email=$_SESSION["email"];
$query = "Select * from `admin` where email='$email'";
$result = mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result)){
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $address = $row['address'];
    $password = $row['password'];
}

$sql = "select * from author where id=$_GET[id]";
$author = "";

$res= mysqli_query($con, $sql);
while ($ro = mysqli_fetch_assoc($res)) {
    
    $author=$ro['author'];
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#e3f2fd">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-center">
            <li class="nav-item">
                <a href="admin_home.php" class="nav-link">Dashboard</a>
            </li>
            <div class="dropdown">
            <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">Books</a>
	        <ul class="dropdown-menu">
		        <li><a class="dropdown-item" href="add_book.php">Add New Book</a></li>
		        <li><a class="dropdown-item" href="manage_book.php">Manage Book</a></li>
	        </ul>
	        </div>
            <div class="dropdown">
            <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">Category</a>
	        <ul class="dropdown-menu">
		        <li><a class="dropdown-item" href="add_category.php">Add New Category</a></li>
		        <li><a class="dropdown-item" href="manage_category.php">Manage Category</a></li>
	        </ul>
	        </div>
            <div class="dropdown">
            <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">Author</a>
	        <ul class="dropdown-menu">
		        <li><a class="dropdown-item" href="add_author.php">Add New Author</a></li>
		        <li><a class="dropdown-item" href="manage_author.php">Manage Author</a></li>
	        </ul>
	        </div>
            <li class="nav-item">
                <a href="issue.php" class="nav-link">Issue Books</a>
            </li>
            

        </ul>

    </div>

    </nav>
    
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
    <div class="col-md-8">
    <form action="" method="post" class="m-5 " autocomplete="off" >
        <div class="mb-3 text-center"> <h4> Edit Author </h4> </div>
            <div class="form-group">
                <label for="name">Author Name:</label>
                <input type="text" name="author_name" class="form-control mb-3" value="<?php echo $author;?>" required>
            </div>
            
            
            <div class="form-group text-center ">
                <button type="submit" name="addauthor" class=" btn btn-primary  w-50 " >Edit Author</button>
            </div>
            
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<?php
if(isset($_POST['addauthor'])){
    
    $sql2 = "update author set author='$_POST[author_name]' where id=$_GET[id]";
    $res2 = mysqli_query($con, $sql2);
    echo "<script>window.location.href='manage_author.php';</script>";

    
}


?>



        
      
    



</body>
</html>