<?php

// @include 'config.php';
// $conn2 = mysqli_connect('localhost','root','','adminlog') or die('connection failed');


@include 'adminconfig.php';
//  session_start();

 if(!isset($_SESSION['emailaddress'])){
    header("location: adminlogin.html");
 }else
 {
    // header("location: maindashboard.php");
  
 }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin.dashboard.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"/>
    <link rel="icon" href="Images/logo1.png">
    <title>BookEat - Dashboard</title>


</head>
<body>
    <!-- <h2>Welcome, Admin</h2> -->

    <div class="sidepanel">
        <div class="sidepanel1">

       <p>Admin</p>

        <ul>
            <li><img src="Images/dashboard1.png" alt=""><a href="maindashboard.php">Dashboard</a></li>
            <li><img src="Images/orders3.png" alt=""><a href="allorders.php">All Orders</a></li>
            <li><img src="Images/dish3.png" alt=""><a href="adminadditems.php">Add new food</a></li>
            <li><img src="Images/earnings.png" alt=""><a href="adminearnings.php">Earnings</a></li>
            <li><img src="Images/users.png" alt=""><a href="registereduser.php">Users</a></li>
            <li><img src="Images/feedback1.png" alt=""><a href="feedback.php">FeedBack</a></li>
        </ul>


        

        
            <ul class="log">



            <?php
              if(!isset($_SESSION['emailaddress'])){
               ?>
               
               <?php
              }else{
              $sql = "SELECT * from adminregister where emailaddress='{$_SESSION['emailaddress']}'";
              $result1 = mysqli_query($conn2, $sql);
              if(mysqli_num_rows($result1)>0){
                while($rows = mysqli_fetch_assoc($result1)){
                    echo '<h4>Welcome,  '.$rows['user'].'</h4>';
   
              
              } } }
               ?>


                <li><img src="Images/signout2.png" alt=""><a href="adminlogout.php">Logout</a></li>
            </ul>
        
    </div>
    </div>

    


    
</body>
</html>