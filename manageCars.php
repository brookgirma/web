<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";
$conn = mysqli_connect($server, $username, $password, $db);
if(isset($_POST["insert"]))
{
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    if($_FILES["image"]["error"] === 4)
    {
        echo "
        <script> alert('Image doesn't exist'); </script>
        ";
    }
    else
    {
      $fileName = $_FILES["image"]["name"];
      $fileSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));

      if(!in_array($imageExtension, $validImageExtension))
      {
        echo "
        <script> alert('Invalid Image Extension'); </script>
        "; 
      }
      else if($fileSize>1000000)
      {
        echo "
        <script> alert('Image size must be 1MB or less'); </script>
        ";
      }
      else
      {
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;

        move_uploaded_file($tmpName, 'img/' . $newImageName);
        $query = "insert into car(Name, Picture, Description) values('$name', '$newImageName', '$desc')";
        mysqli_query($conn, $query);
        // echo "
        // <script> alert('Image Successfully Added'); </script>
        // ";

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
    <title>Manage Subscriptions</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <div class="navbar">
        <a  href="adminpage.htm">Home</a>
        <a  href="manageEmps.php">Manage Employees</a>
        <a  href="manageSubs.php">Manage Subscribers</a>
        <a class="active"href="manageCars.php">Manage Cars</a>
    </div>
        
    
    
    <div class="form-group w-25 my-2" style="margin:auto;">
      <div class="p-1">
        <label for="name">Car Name</label>
        <input class="form-control" id="name" type="text" name="name" >
      </div>
      <div class="p-1">
        <label for="image">Image</label>
        <input class="form-control" id="picture" type="file" name="image" accept=".jpg, .jpeg, .png">
      </div>
      <div class="p-1">
        <label for="desc">Description</label>
        <textarea class="form-control" name="desc" id="desc" cols="25" rows="10"></textarea>
      </div>
      
      
      <br>
      <button type="submit" class="btn btn-primary " name="insert" style="margin:auto;">Insert</button>
      
     
    </div>


    <div class = "w-25" style="margin:auto;">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Picture</th>
      <th scope="col">Description</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
   <?php
   $res = mysqli_query($conn, "select * from `car`");
   while($row=mysqli_fetch_array($res))
   {
       echo "<tr>";
       echo "<td>"; echo $row["CarID"]; echo "</td>";
       echo "<td>"; echo $row["Name"]; echo "</td>";
$p = $row["Picture"];
      
       echo "<td>"; echo '<img src="img/'.$p.'" alt="car-img" style="width:128px;height:128px">'; echo "</td>";
       echo "<td>"; echo $row["Description"]; echo "</td>";
       echo "<td>"; ?> <a href="editcar.php?id=<?php echo $row["CarID"];?>"> <button type = 'button' class = 'btn btn-primary'> Edit </button> </a> <?php echo "</td>";
       echo "<td>"; ?> <a href="delcar.php?id=<?php echo $row["CarID"];?>"> <button type = 'button' class = 'btn btn-danger'> Delete </button> </a> <?php echo "</td>";
       echo "</tr>";   
   }
   
   ?>

  </tbody>
</table>

    </div>
<!-- <div class="input-group w-25 my-2" style="position: relative;
     margin:auto;">
  <div class="form-outline">
    <input type="search" id="form1" class="form-control" name="searchbx" />
  </div>
  <button type="button" class="btn btn-primary" name="searchbtn" id="searchbtn">
    <i class="fa fa-search"></i>
  </button>
</div> -->
       
      </form>





</body>
</html>