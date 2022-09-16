<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";
$conn = mysqli_connect($server, $username, $password, $db);
$id = $_GET["id"]; //because when u hover over button id=...
$sql = "delete from `car` where CarID=$id";
    if(mysqli_query($conn, $sql))
    {
        echo "delete success";
        header("location:manageCars.php");
        
    }
    else
    {
        echo "delete unsuccessful";
        header("location:manageCars.php");
    }

?>
