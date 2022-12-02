<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container text-center mt-5">
        <h1>To-Do Application</h1>
    </div>
    <div class="container text-center mt-5">
        
    <button type="submit" class="btn btn-success mt-2 w-25 btn-lg " data-bs-toggle="button" autocomplete="off"  ><a href ="add.php" class="text-light" style="text-decoration:none">Add Task</a></button>
    </div>

    <div class="container mt-5">

    <table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">Task No.</th>
      <th scope="col">Task</th>
      <th scope="col">Operations</th>
      
    </tr>
  </thead>
  <tbody>

  <?php
  include "connect.php";
  $sql = "Select * from `to_do`";
  $result = mysqli_query($con, $sql);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
          $id = $row['Sr.No'];
          $task = $row['Task'];
          echo '<tr>
          <th scope="row">'.$id.'</th>
          <td>'.$task.'</td>
          <td>
    <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light" style="text-decoration:none">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light" style="text-decoration:none">Delete</a></button>
  </td>
          
        </tr>';
    }
  }
  
  ?>
  
    
    
  </tbody>
</table>
    </div>

    
</body>
</html>
