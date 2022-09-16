

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .inner{
    position: relative;
    margin: 1%;
      }
    </style>
</head>
<body>
  <form >
    <div class="navbar">
        <a  href="adminpage.htm">Home</a>
        <a class="active"  href="manageEmps.php">Manage Employees</a>
        <a  href="manageSubs.php">Manage Subscribers</a>
        <a href="manageCars.php">Manage Cars</a>
    </div>
    <br>
    
    <div class="inner">
      <button class="btn btn-primary my-5"> <a href="register.htm" class="text-light" style="text-decoration:none;">Add Employee</a> </button>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>
            <tbody>
              <!-- for display -->
              <?php
              $server = "localhost";
              $username = "root";
              $password = "";
              $db = "cartopia";
              $conn = mysqli_connect($server, $username, $password, $db);
              $sql = "select * from employee";
              $result = mysqli_query($conn,$sql);
              if($result)
              {
                while($row=mysqli_fetch_assoc($result))
                {
                  $id=$row['ID'];
                  $name=$row['Name'];
                  $uname=$row['Username'];
                  $pwd=$row['Password'];
                  echo'<tr>
                  <th scope="row">'.$id.'</th>
                  <td>'.$name.'</td>
                  <td>'.$uname.'</td>
                  <td>'.$pwd.'</td>
                  <td>
                  <button class="btn btn-primary"><a class="text-light" style="text-decoration:none;" href="update.php?updateid='.$id.'">Update</a></button>
                  <button class="btn btn-danger"><a class="text-light" style="text-decoration:none;" href="delete.php?deleteid='.$id.'">Delete</a></button>
                  </td>
                  
                </tr>';
                }
              }else if(isset($_POST['searchbtn']))
              {
                if(!empty($_POST['searchbx']))
                {
                  $input = $_POST['searchbx'];
                  $sql= "select * from `employee` where (Name like '%".$input."%') or (Username like '%".$input."%')";
                  $result = mysqli_query($conn, $sql);
                  if($result)
                  {
                    while($row=mysqli_fetch_assoc($result))
                {
                  $id=$row['ID'];
                  $name=$row['Name'];
                  $uname=$row['Username'];
                  $pwd=$row['Password'];
                  echo'<tr>
                  <th scope="row">'.$id.'</th>
                  <td>'.$name.'</td>
                  <td>'.$uname.'</td>
                  <td>'.$pwd.'</td>
                  <td>
                  <button class="btn btn-primary"><a class="text-light" style="text-decoration:none;" href="update.php?updateid='.$id.'">Update</a></button>
                  <button class="btn btn-danger"><a class="text-light" style="text-decoration:none;" href="delete.php?deleteid='.$id.'">Delete</a></button>
                  </td>
                  
                </tr>';
                }
                  }
                }
              }
             
              ?>

            </tbody>
          </table>
    </div>
    </form>



    <!-- search btn -->
    <form method="post"></form>
    <div class="input-group" style="position: relative;
    margin: 1%;">
  <div class="form-outline">
    <input type="search" id="form1" class="form-control" name="searchbx" />
  </div>
  <button type="button" class="btn btn-primary" name="searchbtn" id="searchbtn">
    <i class="fa fa-search"></i>
  </button>
</div>
</form>

</body>
</html>