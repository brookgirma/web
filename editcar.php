<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";

$conn = mysqli_connect($server, $username, $password, $db);
$id= $_GET["id"];
$sql = "select * from `car` where CarID=$id";
    $res=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($res))
    {
        $name = $row['Name'];
        $picture = $row['Picture'];
        $desc = $row['Description'];
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
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
        <input class="form-control" id="name" type="text" name="name" value="<?php echo $name?>" >
      </div>
      <div class="p-1">
        <label for="image">Image</label>
        <input class="form-control" id="picture" type="file" name="image" accept=".jpg, .jpeg, .png" value="<?php echo $picture?>" >
      </div>
      <div class="p-1">
        <label for="desc">Description</label>
        <textarea class="form-control" name="desc" id="desc" cols="25" rows="10"><?php echo $desc; ?> </textarea>
      </div>
      
      
      <br>
      <button type="submit" class="btn btn-primary " name="update" style="margin:auto;">Update</button>
      
     
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

      <?php

if(isset($_POST["update"]))
{
     
    
   


    header("location:manageCars.php");
}


?>



</body>
</html>