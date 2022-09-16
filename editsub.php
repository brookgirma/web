<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";



$conn = mysqli_connect($server, $username, $password, $db);
$id= $_GET["id"];
$sql = "select * from `emaillist` where EmailID=$id";
    $res=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($res))
    {
        $email = $row["Email"]; 
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
        <input class="form-control" id="email" type="email" name="email" value="<?php echo $email?>" >
      </div>
      
      <br>
     
      <button type="submit" class="btn btn-primary " name="update" style="margin:auto;">Update</button>

     
    </div>


    <div class = "w-25" style="margin:auto;">
    
    </div>

       
      </form>

<?php

if(isset($_POST["update"]))
{
    $e = $_POST["email"];
   
    $query = "update `emaillist` set Email = '$e' where 
    EmailID = '$id'";
    $r = mysqli_query($conn, $query);
    header("location:manageSubs.php");
}


?>



</body>
</html>