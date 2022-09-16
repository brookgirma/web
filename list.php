<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of cars</title>
    <link rel="stylesheet" href="list.css"> 
    <link rel="stylesheet" href="Bootstrap/font-awesome-4.7.0/css/font-awesome.min.css"> 
</head>
<body>
    
    <button onclick="totop()" id="totopbtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>
<form action="emailserv.php" method="post">
    <div class="cont">
        
        <div class="navbar">

            <div class="logo">
                <img class="logoPic" src="img/CarTopia logo.png" alt="CarTopia">
            </div>

            <div class="menu">                

                <ul class="sub-menu">
                    <li>
                        <span class="sub-menuDrop">Menu <i class="fa fa-caret-down"></i></span>
                        <div class="links">
                            <ul>
                                <li><a href="cartopia.htm" class="active">Home</a></li>
                                <li><a href="list.htm" >List of cars</a></li>
                                <li><a href="#Contact_us">Contact us</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="outer-links">
                    <li><a href="cartopia.htm" class="active">Home</a></li>
                    <li><a href="list.htm" >List of cars</a></li>
                    <li><a href="#Contact_us">Contact us</a></li>
                </ul>                
            </div>

            <div class="search">                
                <i class="fa fa-search" ></i>
                <div class="searchBox">
                    <input type="text" class="find" placeholder="Search...">
                    <button type="button">Find</button>
                </div>
            </div>

            <div class="side-menu">
                <li>
                    <span class="fa fa-bars" id="menu-button"></span>
                    
                    <div class="links">
                        <ul>
                            <div class="logo">
                                <i class="fa fa-times"></i>
                                <img class="logoPic" src="img/CarTopia logo.png" alt="CarTopia">
                            </div>
                            <li><a href="cartopia.htm" class="active"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li><a href="list.htm" ><i class="fa fa-list"></i> List of cars</a></li>
                            <li><a href="#Contact_us"><i class="fa fa-address-book-o" aria-hidden="true"></i> Contact us</a></li>
                        </ul>
                        <div class="side-social">
                            <ul class="social">
                                <li><a href="https://www.facebook.com/cartopiaet/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://instagram.com/cartopiaet?utm_medium=copy_link" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://t.me/CarTopiaET" target="_blank"><i class="fa fa-telegram" target="_blank"></i></a></li>
                                <li><a href="https://www.google.com/maps/place/CarTopia+ET/@8.9951294,38.7592494,16.38z/data=!4m5!3m4!1s0x0:0xa3b7355179f3cca2!8m2!3d8.9981002!4d38.7649517" target="_blank"><i class="fa fa-google"></i></a></li>
                            
                            </ul>
                        </div>
                    </div>
                </li> 
            </div>

        </div>

    
        <div class="cont">
       
       
       <?php
       $server = "localhost";
       $username = "root";
       $password = "";
       $db = "cartopia";
       $conn = mysqli_connect($server, $username, $password, $db);
       $res = mysqli_query($conn, "select * from `car`");
      
   while($row=mysqli_fetch_array($res))
   {
   $count = 0;
    $p = $row["Picture"]; 
    $n = $row["Name"];

    echo '<div class="mid">';
    echo '  
      <div class="img"' .++$count.'style="float:left">
         <a href="Description.htm"> <img width="200"; height="200"; display: flex; src="img/'.$p.'"></a>
        <br> <a href="Description.htm#cars1">;' . $n . '</a> </div>
        
        ';
        echo '</div>';
   
   }

   ?>
</div>
   <footer class="foot" id="Contact_us">
    <div class="footsocial">
        <p>Follow Us</p>
        <ul>
            <li><a href="https://www.facebook.com/cartopiaet/" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://instagram.com/cartopiaet?utm_medium=copy_link" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://t.me/CarTopiaET" target="_blank"><i class="fa fa-telegram"></i></a></li>
            <li><a href="https://www.google.com/maps/place/CarTopia+ET/@8.9951294,38.7592494,16.38z/data=!4m5!3m4!1s0x0:0xa3b7355179f3cca2!8m2!3d8.9981002!4d38.7649517" target="_blank"><i class="fa fa-google"></i></a></li>
        </ul>
    </div>
    <div class="col2" id="col2">
        <ul>
            <li><a href="#">About us</a></li>
            <li><a href="#">Our Team</a></li>
            <li><a href="adminlogin.htm">Admin Login</a></li>
        </ul>
    </div>
    <div class="col3">
        <ul>
            <li><a href="tel:+251 913 06 56 46"><i class="fa fa-phone"></i></a></li>
            <li><a href="https://www.google.com/maps/place/CarTopia+ET/@8.99417,38.780255,14.25z/data=!4m5!3m4!1s0x0:0xa3b7355179f3cca2!8m2!3d8.9980988!4d38.764953" target="_blank"><i class="fa fa-map-marker"></i></a></li>
        </ul>
        <br>
        <div>
            <p>Send us your email to get notified on list car arrivals  </p>
            <input type="email" id="email" placeholder="Email Address" name="emailbox" required> 
            <button id="registerNew" type="submit" name="submit" style="background-color: rgb(39, 37, 37); color:DarkGrey; padding: 4px; margin-left: 5px;">Send</button>
           
        </div>                
    </div>
</footer>
</form>
    
    <script src="jQuery/jquery-3.6.0.js"></script>

    <script src="list.js"></script>

</body>
</html>