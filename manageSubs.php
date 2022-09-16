<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";
$conn = mysqli_connect($server, $username, $password, $db);
if(isset($_POST["insert"]))
{
    $email = $_POST['emailbx'];
    $query = "insert into emaillist(Email) values('$email')";
    if(mysqli_query($conn, $query))
    {
        echo "insert success";
    }
    else
    {
        echo "insert unsuccessful";
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
<form method="post" action="">
    <div class="navbar">
        <a  href="adminpage.htm">Home</a>
        <a  href="manageEmps.php">Manage Employees</a>
        <a class="active" href="manageSubs.php">Manage Subscribers</a>
        <a href="manageCars.php">Manage Cars</a>
    </div>
        
    
    
    <div class="form-group w-25 my-2" style="margin:auto;">
      <div class="p-1">
        <label for="email">Email</label>
        <input class="form-control" id="email" type="email" name="emailbx" >
      </div>
      
      <br>
      <button type="submit" class="btn btn-primary " name="insert" style="margin:auto;">Insert</button>
      
     
    </div>


    <div class = "w-25" style="margin:auto;">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
   <?php
   $res = mysqli_query($conn, "select * from `emaillist`");
   while($row=mysqli_fetch_array($res))
   {
       echo "<tr>";
       echo "<td>"; echo $row["EmailID"]; echo "</td>";
       echo "<td>"; echo $row["Email"]; echo "</td>";
       echo "<td>"; ?> <a href="editsub.php?id=<?php echo $row["EmailID"];?>"> <button type = 'button' class = 'btn btn-primary'> Edit </button> </a> <?php echo "</td>";
       echo "<td>"; ?> <a href="delsub.php?id=<?php echo $row["EmailID"];?>"> <button type = 'button' class = 'btn btn-danger'> Delete </button> </a> <?php echo "</td>";
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