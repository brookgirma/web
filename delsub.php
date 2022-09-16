<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";
$conn = mysqli_connect($server, $username, $password, $db);
$id = $_GET["id"]; //because when u hover over button id=...
$sql = "delete from `emaillist` where EmailID=$id";
    if(mysqli_query($conn, $sql))
    {
        echo "delete success";
        header("location:manageSubs.php");
        
    }
    else
    {
        echo "delete unsuccessful";
        header("location:manageSubs.php");
    }

?>
