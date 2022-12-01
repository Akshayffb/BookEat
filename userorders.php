<?php


session_start();

@include 'config.php';

if(!isset($_SESSION['email'])){
   header("location: userorders.php");
}





if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `orders` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: userorders.php');
      $message[] = 'Your order has been deleted';
   }else{
      header('location: userorders.php');
      $message[] = 'Order could not be deleted';
   };
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/logo1.png">
  <title>BookEat - My Orders</title>
  <link rel="stylesheet" href="userorders.css">
  <link rel="stylesheet" href="myprofile.css">
  <link rel="icon" href="logo,pic/gear_shop-removebg-preview.png">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>



  
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};
?>
<?php include 'BookEatheader.php'; ?>
<section class="display-product-table">
<h2>My Orders</h2>
<table>
      
      <tbody>
         
<thead>
         
         <th>Booking Id</th>
         <th>House name & no</th>
         <th>Lane</th> 
         <th>Area</th>
         <th>Pin Code</th>
         <th>Items You Ordered</th>
         <th>Total Price</th>   
         <th>Status</th>       
         <th>Update Orders</th>

      </thead>

         <?php         
            $select_products = mysqli_query($conn, "SELECT * FROM `orders`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>
            

         <tr>
            
         <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['houseno']; ?></td>
            <td><?php echo $row['road']; ?></td>
            <td><?php echo $row['area']; ?></td>
            <td><?php echo $row['pincod']; ?></td>
            <td><?php echo $row['total_product']; ?></td>
            <td>&#8377;<?php echo $row['total_price']; ?>/-</td>
            <td><?php echo $row['status']; ?></td>

            <td>
               <a style="width: auto; color: #000; font-weight: 300; " href="userorders.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to cancel this order?');">Cancel order </a>
            </td>
         </tr>
         <?php
            };    
            }else{
               echo "<div class='empty' ><p style='padding-top: 1%;'> Your cart is Empty <br> You have not Ordered anything yet! </p><br>Order <a href='index.php'>Now</a></div>";
            };
         ?>
      </tbody>
   </table>
   <a href="index.php">
   <video width="800" height="800" autoplay muted loop>
  <source src="Images/userordergif.mp4" type="video/mp4">
  <!-- <source src="movie.ogg" type="video/ogg"> -->
</video>
</a>
</section>





    <!--Footer Section-->

    <footer>
     <div class="foot">
        <div class="foot1">
          
          <div id="link1" class="linkss">
          
          <h5>BookEat - Grab a Bite </h5> <p> <br> Order anything, anywhere, anytime <br>
           Eat, Sleep and Save Money<br>
            All at one place
          </p>
            </div>


            <div id="link1" class="linkss">
              <h4>Office</h4>
              <p>OMBR Layout<br>
                 Bangalore - 560043<br>
                  Karnataka
              </p>            
             
            
            </div>

            
            <div class="linkss">
              <h4>Other Links</h4>
              <li><a href="Know.php"> About us</a></li>
              <li><a href="Contact.php">Contact</a></li>
              <li><a href="adminlogin.html">Admin Login</a></li>
                        
             
            
            </div>

            
            <div class="linkss">
              <h4>Legal</h4>
              <li><a href="terms.php"> Terms & Services</a></li>
              <li><a href="privacy.php"> Privacy Policies</a></li>
          
                        
             
            
            </div>

        </div>

        <hr>
        <div class="foot2">
         <a href="index.php"> <img src="img/logo1.png" alt="" style="width: 46%;"></a>  

          <h2 style="font-size: 20px;">&reg; <a href="index.php" style="text-decoration: none;"> BookEat</a></h2>

          <ul>
            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
           <a href="https://twitter.com/"> <i class="fa-brands fa-twitter"></i></a>
           <a href="https://www.instagram.com/"> <i class="fa-brands fa-instagram"></i></a>
          </ul>


        </div>
        <div class="foot2">

        </div>
      </div>
    </footer>







</body>
</html>
