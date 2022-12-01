<?php

@include 'config.php';
// $conn2 = mysqli_connect('localhost','root','','adminlog') or die('connection failed');


@include 'adminconfig.php';
//  session_start();

 if(!isset($_SESSION['emailaddress'])){
    header("location: adminlogin.html");
 }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="maindashboard.css">
    <link rel="icon" href="Images/logo1.png">
    <title>BookEat - Admin Dashboard</title>
</head>
<body>


<?php include 'Admin.dashboard.php'; ?>


    <div id="mainaside" class="mainaside">
       <h4>Dashboard</h4> 
      <div class="subaside1">
        <div class="subasideimg">
            <a href="allorders.php">
        <?php         
            $query = "SELECT id FROM `orders` ORDER BY id";
            $query_run = mysqli_query($conn, $query);

            $row = mysqli_num_rows($query_run);
            echo '<h2>Total Number of Orders</h2>';
            echo '<h1> '.$row.'</h1>';
            
            ?>
            </a>
            
          <!-- <img src="" alt=""> -->
          <!-- <h3>All Orders</h3> -->
          <!-- <p>Biryani, North Indian, Kebabs, Mughlai, Grill, Beverages, Sweets, Desserts</p> -->
          <!-- <ul>
           <li>30 minutes Garntee</li> 
           <li>&#8377; 5221</li>
          
        </ul> -->
        <!-- <button><a href="allorders.php">Click</a></button> -->
        </div>
        <div class="subasideimg">

        <a href="adminadditems.php">
        <?php         
            $query = "SELECT id FROM `products` ORDER BY id";
            $query_run = mysqli_query($conn, $query);

            $row = mysqli_num_rows($query_run);
            echo '<h2>Total number of Food</h2>';
            echo '<h1> '.$row.'</h1>';
            
            ?>
            </a>
          
        </div>

        <div class="subasideimg">


        <a href="registereduser.php">
        <?php         
            $query = "SELECT id FROM `userregister` ORDER BY id";
            $query_run = mysqli_query($conn1, $query);

            $row = mysqli_num_rows($query_run);
            echo '<h2>Total Number of users</h2>';
            echo '<h1> '.$row.'</h1>';
            
            ?>
            </a>

        </div>

        <div class="subasideimg">


        <a href="feedback.php">
        <?php         
            $query = "SELECT id FROM `feedback` ORDER BY id";
            $query_run = mysqli_query($conn, $query);

            $row = mysqli_num_rows($query_run);
            echo '<h2>Total Number of Feedback</h2>';
            echo '<h1> '.$row.'</h1>';
            
            ?>
            </a>

        </div>


        <div class="subasideimg1">

        <a href="adminearnings.php">
        <?php
         $select_order = mysqli_query($conn, "SELECT * FROM `orders`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_order) > 0){
            while($fetch_order = mysqli_fetch_assoc($select_order)){
            $total_price = ($fetch_order['total_price']);
            $grand_total = $total += $total_price;
            }
        }
        echo'<h3>Total Earnings</h3>';
        echo  '<h2>&#8377; '.$grand_total.'.00</h2>';
        // echo '<img src="Images/earnings1.png">';
      ?>


<section class="display-feedback-table">
    <h3>Last 3 Orders...</h3>
   <table>
      <thead>
         
         <th>Order Id</th>
         <th>Ordered Items</th>
         <th>Amount</th>
         <!-- <th>Mobile No.</th>
         <th>Message</th>
         <th>Update Feedback</th> -->
      </thead>
      
      <tbody>
         <?php         
            $select_products = mysqli_query($conn, "SELECT * FROM(SELECT * FROM `orders` ORDER BY id desc LIMIT 3)var ORDER BY id ASC ");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>
         <tr>
            
         <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['total_product']; ?></td>
            <td><?php echo $row['total_price']; ?></td>
           
         </tr>
         <?php
            };    
            }else{
               echo "<div class='empty'>There are no recent earnings <br>BookEat <a href='index.php'>Now</a></div>";
            };
            
         ?>
         </a>
      </tbody>
   </table>
</section>


      
            </a>

        </div>

    </div>

</div>
 

    
</body>
</html>