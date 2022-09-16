<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";
$conn = mysqli_connect($server, $username, $password, $db);
if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];
    $sql="delete from `employee` where ID = $id";
    $result=mysqli_query($conn, $sql);
    if($result)
    {
        //delete successful
        header('location:manageEmps.php');
    }
    else{
        die(mysqli_error($conn));
    }

}



?>