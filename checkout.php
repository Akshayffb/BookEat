<?php

@include 'config.php';
session_start();


if(!isset($_SESSION['email'])){
   header("location: userlogin.php");
}

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $houseno = $_POST['houseno'];
   $road = $_POST['road'];
   $area = $_POST['area'];
   // $city = $_POST['city'];
   // $country = $_POST['country'];
   $pincod = $_POST['pincod'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = ($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, houseno, road, area, pincod, total_product, total_price) VALUES('$name','$number','$email','$method','$houseno','$road','$area','$pincod','$total_product','$price_total')") or die('query failed');
   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
      <img src='Images/orderconfirmed.png'>

      <h1>Order Confirmed!</h1>
         <h3>Thank you for ordring from <br> BookEat</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> Username: <span>".$name."</span> </p>
            <p> Mobile No: <span>".$number."</span> </p>
            <p> Email: <span>".$email."</span> </p>
            <p> Order to be delivered at: <span>".$houseno.", ".$road.",".$area.", - ".$pincod."</span> </p>
            <p> Mode of Payment: <span>".$method."</span> </p>
            <h4>Pay only when you recieved the order!</h4>
         </div>
            <a href='userorders.php' class='btn'>My Orders</a>
            <a href='index.php' class='btn'>Take me Home</a>

         </div>
      </div>
      ";
      $cart_query = mysqli_query($conn, "DELETE FROM `shop_db`.`cart`");

   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="Images/logo1.png">

   <title>BookEat - Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="cartstyle.css">

</head>
<body>

<?php include 'BookEatheader.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete Your Order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total">Amount to be paid : &#8377;<?= $grand_total; ?>/- </span>
   </div>
      <div class="flex">
         <?php 
         if(!isset($_SESSION['email'])){


            ?>
            <?php 
         }else{
            $sql = "SELECT * from userregister where email='{$_SESSION['email']}'";
            $result1 = mysqli_query($conn1, $sql);
            if(mysqli_num_rows($result1)>0){
            while($rows = mysqli_fetch_assoc($result1)){
      ?>

         <div class="inputBox">
            <span>Username</span>
            <input type="text" placeholder="Enter your name" name="name" value="<?php echo $rows['user']; ?>" required>
         </div>
         <div class="inputBox">
            <span>Mobile No.</span>
            <input type="number" placeholder="Enter your number" name="number" value="<?php echo $rows['Phnumber']; ?>" required>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="Enter your email" name="email" value="<?php echo $rows['email']; ?>" required>
         </div>
         <div class="inputBox">
            <span>Mode of Payment</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on Devlivery</option>
               <option value="credit cart">Credit/Debit Cart</option>
               <option value="UPI">UPI</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Line 1</span>
            <input type="text" placeholder="e.g. Your house name & number" name="houseno" value="<?php echo $rows['house']; ?>" required>
         </div>
         <div class="inputBox">
            <span>Line 2</span>
            <input type="text" placeholder="e.g. Street name " name="road" value="<?php echo $rows['road']; ?>" required>
         </div>
         <div class="inputBox">
            <span>Area</span>
            <input type="text" placeholder="e.g. Enter your Areaname" name="area" value="<?php echo $rows['areaname']; ?>" required>
         </div>
         <!-- <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="e.g. maharashtra" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. india" name="country" required>
         </div> -->
         <div class="inputBox">
            <span>Pincode</span>
            <input type="text" placeholder="e.g. 560043" name="pincod" value="<?php echo $rows['pincode']; ?>" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
      <?php } } } ?>

   </form>

</section>



</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>