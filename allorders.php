<?php
@include 'config.php';
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `orders` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: allorders.php');
      $message[] = 'product has been deleted';
   }else{
      header('location: allorders.php');
      $message[] = 'product could not be deleted';
   };
};
if(isset($_POST['update_product'])){
  $update_p_id = $_POST['update_p_id'];
  $update_p_name = $_POST['update_p_name'];
  $update_p_num = $_POST['update_p_num'];
  $update_p_email = $_POST['update_p_email'];
  $update_p_flat = $_POST['update_p_flat'];
  $update_p_street = $_POST['update_p_street'];
  $update_p_city = $_POST['update_p_city'];
  $update_p_pincode = $_POST['update_p_pincode'];
  $status = $_POST['status'];

  $update_query = mysqli_query($conn, "UPDATE `orders` SET name ='$update_p_name',number='$update_p_num', email='$update_p_email', houseno='$update_p_flat', road='$update_p_street', area='$update_p_city', pincod='$update_p_pincode', status='$status' WHERE id = '$update_p_id'");

  if($update_query){
     $message[] = 'product updated succesfully';
     header('location: allorders.php');
  }else{
     $message[] = 'product could not be updated';
     header('location: allorders.php');
  }
}
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
  <title>BookEat - All Orders</title>
  <link rel="stylesheet" href="allorders.css">
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
<?php include 'Admin.dashboard.php'; ?> 
<section class="display-product-table">
   <table>
      <caption style="font-size: 30px; padding-bottom: 25px; font-weight: 500; text-transform: uppercase;">Ordered Recieved</caption>
      <thead>
         <th>Order id</th>
         <th>Name</th>
         <th>Number</th>
         <th>Email</th>
         <th>Mode of Payment</th>
         <th>House Name & No.</th>
         <th>Road </th> 
         <th>Area Name</th>
         <th>Pin Code</th>
         <th>Products</th>
         <th>Total Price</th>  
         <th>Status</th>       
         <th>Make Changes</th>
      </thead>
      <tbody>
         <?php         
            $select_products = mysqli_query($conn, "SELECT * FROM `orders`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>
         <tr>
         <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['method']; ?></td>
            <td><?php echo $row['houseno']; ?></td>
            <td><?php echo $row['road']; ?></td>
            <td><?php echo $row['area']; ?></td>
            <td><?php echo $row['pincod']; ?></td>
            <td><?php echo $row['total_product']; ?></td>
            <td>&#8377;<?php echo $row['total_price']; ?>/-</td>
            <td><?php echo $row['status']; ?></td>
            <td>
               <a href="allorders.php?edit=<?php echo $row['id']; ?>" class="option-btn"></i> Update </a>
               <a href=" allorders.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to cancel this order?');">Cancel</a>
            </td>
         </tr>
         <?php
            };    
            }else{
               echo '<h1>No</h1>';
               // echo "<h1 style=' top: 15%; right: 48%;' class='empty'>No </h1>";
               // echo "<div class='empty'>No </div>";

            };
         ?>
      </tbody>
   </table>
</section>
<section class="edit-form-container">
   <?php
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>" disabled>
      <input type="text" class="box" required name="update_p_num" value="<?php echo $fetch_edit['number']; ?>">
      <input type="text" class="box" required name="update_p_email" value="<?php echo $fetch_edit['email']; ?>">
      <input type="text" class="box" required name="update_p_flat" value="<?php echo $fetch_edit['houseno']; ?>">
      <input type="text" class="box" required name="update_p_street" value="<?php echo $fetch_edit['road']; ?>">
      <input type="text" class="box" required name="update_p_city" value="<?php echo $fetch_edit['area']; ?>">
      <input type="text" class="box" required name="update_p_pincode" value="<?php echo $fetch_edit['pincod']; ?>">
      <select name="status" id="" class="opt">
      <option value="">Change Status</option>
      <option value="Preparing.....">Preparing</option>
        <option value="Out for Delivery">Out for delivery</option>
        <option value="Delivered">Delivered</option>
      </select>
      
      <input type="submit" value="Update the product" name="update_product" class="btn">
      <input type="reset" value="Cancel" id="close-edit" class="option-btn">
   </form>
   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>
</section>
<script src="Admin.js"></script> 
</body>
</html>
