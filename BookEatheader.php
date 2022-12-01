<?php

@include 'config.php';


?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="BookEatheader.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7f8d1dd8b4.js"></script>
        <script src="aside.js"></script>
        <link rel="icon" href="Images/logo1.png">
    <title>BookEat - Grab A Bite</title>
    </head>
    <body>
        <div class="navbar">

          <nav>

          <a href="index.php" >
            <img src="img/logo1.png" alt="" class="logo">
            </a>

            <a style="text-decoration: none;"><h2>BookEat </h2></a>

            <ul>

            
              <li>
                <a href="index.php">Home</a>
            </li>   
            <li>
                <a href="Know.php">Know Us</a>
            </li>
            <li>
                <a href="Contact.php">Help</a>
            </li>

            </ul>

            

            <div class="Right-section">

              <?php
              if(!isset($_SESSION['email'])){
               ?>
               <a href="userlogin.php" class="lo">Sign in</a> 
               <?php
              }else{
              $sql = "SELECT * from userregister where email='{$_SESSION['email']}'";
              $result1 = mysqli_query($conn1, $sql);
              if(mysqli_num_rows($result1)>0){
                while($rows = mysqli_fetch_assoc($result1)){
              ?>
               <div class='dropdown1'>
               <button class='dropbtn1'>Hi, <?php echo $rows['user']; ?></button>
               <div class='dropdown-content1'>
               <a href='myprofile.php'>My Profile</a>
               <a href='userorders.php'>My Orders</a>
               <a href="userlogout.php">logout</a>
               </div>
               </div>
             <?php } } } ?>
             
             <?php
             $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
             $row_count = mysqli_num_rows($select_rows);
       
             ?>
            <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i> <span><?php echo $row_count; ?></span> </a>


           <!-- <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i> <span></span> </a> -->
           </div>

          </nav>
          
        </div>








    

<!-- resposive for mobile -->

<script>
function myFunctionn() {
  var x = document.getElementById("myLinkss");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

</script>



    </body>
</html>