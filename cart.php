<?php

@include 'config.php';
session_start();
// @include 'cartconfig.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE Id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE Id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="Images/logo1.png">
   <title>My WishList</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'BookEatheader.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">My WishList</h1>

   <!-- <h1 style="text-align: center; font-size: 20px;">Your cart is Empty <br> You have not Ordered anything yet! </p><br>Order <a href='index.php'>Now</a>
</h3> -->

   <table>

      <thead>
         <!-- <h1>Items</h1> -->
         <!-- <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th> -->
         <!-- <th>action</th> -->
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="Addedimages/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <!-- <td><?php echo $fetch_cart['category']; ?></td> -->
            <td><?php echo $fetch_cart['descr']; ?></td>
            <td>&#8377;<?php echo ($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['Id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="add" name="update_update_btn">
               </form>   
            </td>
            <td>&#8377;<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td id="remove"><a id="removebtn" href="cart.php?remove=<?php echo $fetch_cart['Id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i>Delete</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>

         <tr class="table-bottom">
            <td><a id="removebtn" href="index.php" class="option-btn" style="margin-top: 0;">Order More</a></td>
            <td>*Pay online & be safe</td>
            <td colspan="3">Amount to be paid : -</td>
            <td>&#8377;<?php echo $grand_total; ?>/-</td>
            <td><a id="removebtn" href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i>Delete all</a></td>
         </tr>
         

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" id="removebtn" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Checkout now</a>
   </div>

</section>

</div>



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



<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>