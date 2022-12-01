<?php


@include 'config.php';
@include 'cartconfig.php';


if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_category = $_POST['p_category'];
   $p_descr = $_POST['p_descr'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'Addedimages/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, category, descr, price, image) VALUES('$p_name', '$p_category', '$p_descr', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'New Food item added';
   }else{
      $message[] = 'could not add the item';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE Id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: adminadditems.php');
      $message[] = 'You deleted one food item';
   }else{
      header('location: adminadditems.php');
      $message[] = 'item could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_category = $_POST['update_p_category'];
   $update_p_category = $_POST['update_p_category'];
   $update_p_descr = $_POST['update_p_descr'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE Id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'You updated one of the food item';
      header('location: adminadditems.php');
   }else{
      $message[] = 'item could not be updated';
      header('location: adminadditems.php');
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
   <title>BookEat - Dashboard add items</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="adminadditems.css">

</head>
<body>

<?php include 'Admin.dashboard.php'; ?>


   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Adding new food item</h3>
   <input type="text" name="p_name" placeholder="Enter the Food name" class="box" required>
   <select  name="p_category">
   <option value="">Select Category</option>
  <option value="veg">Veg</option>
  <option value="non-veg">Non-Veg</option>
  <option value="rolls">Rolls</option>
  <option value="charts">Charts</option>
  <option value="desert">Desert</option>
</select>
   <input type="text" name="p_descr" placeholder="Describe the Food item" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="Enter the food price" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add" name="add_product" id="addbtn" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Food Image</th>
         <th>Food Name</th>
         <th>Category</th>
         <th>Food Description</th>
         <th>Food Price</th>
         <th>Update/Delete</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="Addedimages/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['category'] ?></td>
            <td><?php echo $row['descr'];?></td>
            <td>&#8377;<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="adminadditems.php?delete=<?php echo $row['Id']; ?>" class="delete-btn" onclick="return confirm('Do you really want to delete this food item?')">Delete </a>
               <a href="adminadditems.php?edit=<?php echo $row['Id']; ?>" class="option-btn"> Update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no item added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE Id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
   <h3 id="cancel" onclick="hidd()" style="cursor: pointer; text-align: end; font-size: 20px;" >&#10060;</h3>

      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['Id']; ?>">
      <input type="text" class="box"  name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <iput type="text" class="box"  name="update_p_category" value="<?php echo $fetch_edit['category']; ?>">
      <input type="text" class="box" name="update_p_descr" value="<?php echo $fetch_edit['descr']; ?>">
      <input type="number" min="0" class="box" name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="Update" name="update_product" class="btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>









      <!-- hide -->
      <script>
             function hidd(){
                var a=document.getElementById('show');
                a.style.display='none'
               }

            </script>





<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>