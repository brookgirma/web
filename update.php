<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";
$conn = mysqli_connect($server, $username, $password, $db);
$id=$_GET['updateid'];
$sql="select * from `employee` where ID = $id";
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_assoc($result);
$name = $row['Name'];
$nuname = $row['Username'];
$npass = $row['Password'];


if(isset($_POST['update']))
{
  $name = $_POST['name'];
  $nuname = $_POST['newusername'];
  $npass = $_POST['newpassword'];
  $sql = "update `employee` set ID=$id, Name='$name', Username='$nuname', Password='$npass'
  where ID = $id";
  $result=mysqli_query($conn, $sql);
  if($result)
  {
    header('location:manageEmps.php');
  }
  else
  {
    die(mysqli_error($conn));
  }
  
  

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <form method="post">
    
    <div class="form-group w-25 my-2" style="margin:auto;">
      <div class="p-1">
        <label for="name">Full Name</label>
        <input class="form-control" id="name" type="text" name="name" value=<?php echo $name?>>
      </div>
      <div class="p-1">
        <label for="newusername">Username</label>
        <input class="form-control" id="newusername" type="text" name="newusername" value=<?php echo $nuname?>>
      </div>
      <div class="p-1">
        <label for="newpassword">Password</label>
        <input class="form-control" id="newpassword" type="password" name="newpassword" value=<?php echo $npass?>>
      </div>
      <br>
      <button type="submit" class="btn btn-primary " name="update" style="margin:auto;">Update</button>
    </div>

       
      </form>
</body> 
</html>