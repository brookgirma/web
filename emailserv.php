<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$server = "localhost";
$username = "root";
$password = "";
$db = "cartopia";
$conn = mysqli_connect($server, $username, $password, $db);

//send email

if(isset($_POST['submit'])){
   if(!empty($_POST['emailbox']))//emailbox name of email textbox
    {
        $email = $_POST['emailbox'];
        $query2 = mysqli_query($conn,"select * from emaillist where Email = '$email'");
        if(mysqli_num_rows($query2)>0)
        {
            echo "<script>
            window.location.href='cartopia.htm';
            alert('Subscription already exists');</script>"; 
        }
        else
        {
        $query = "insert into emaillist(Email) values('$email')";
        mysqli_query($conn, $query);
        echo "<script> 
        window.location.href='cartopia.htm';
        alert('Thank you for subscribing!');
        </script>";
  

        }
        
    }
    
   
}

//login

if(isset($_POST['login'])){
    if(!empty($_POST['text'])&&(!empty($_POST['password'])))//emailbox name of email textbox
     {
        $uname=$_POST['text'];
    $password=$_POST['password'];
    $sql="select * from employee where Username='".$uname."'AND Password='".$password."' limit 1";
    
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        header("location:adminpage.htm");
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }


     }
}

//to insert employee
if(isset($_POST['registerbtn'])){
    if(!empty($_POST['name'])&&(!empty($_POST['newusername']))&&(!empty($_POST['newpassword'])))//emailbox name of email textbox
     {
        $name = $_POST['name'];
        $nuname = $_POST['newusername'];
        $npass = $_POST['newpassword'];
      
         $query2 = mysqli_query($conn,"select * from employee where Username = '$nuname'");
         if(mysqli_num_rows($query2)>0)
         {
             echo "Already exist!"; 
         }
         else
         {
         $query = "insert into employee(Name, Username, Password) values('$name', '$nuname', '$npass')";
         mysqli_query($conn, $query);
         header("location:adminpage.htm");

         }
         
     }
     
    
 }


    
    
    
    
    
   
        

?>


