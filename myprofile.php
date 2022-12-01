<?php 
@include 'config.php';
session_start();

if(!isset($_SESSION['email'])){
   header("location: userlogin.php");
}




if(isset($_POST['update_details'])){
  $update_p_id = $_POST['update_p_id'];
  $name = $_POST['name'];
  $Pnumber= $_POST['Pnumber'];
  $house = $_POST['house'];
  $road = $_POST['road'];
  $areaname = $_POST['areaname'];
  $pincode = $_POST['pincode'];
  $password=$_POST['password'];

  $p_image = $_FILES['profilepic']['name'];
   $p_image_tmp_name = $_FILES['profilepic']['tmp_name'];
   $p_image_folder = 'profilepic/'.$p_image;

  $update_query = mysqli_query($conn1, "UPDATE `userregister` SET user = '$name',Phnumber = '$Pnumber', house = '$house', road = '$road', areaname = '$areaname', pincode='$pincode', profilepic='$p_image' WHERE id = '$update_p_id'");


  
  if($insert_query){
   move_uploaded_file($p_image_tmp_name, $p_image_folder);
   $message[] = 'New Food item added';
}else{
   $message[] = 'could not add the item';
}

  if($update_query){
     $message[] = 'product updated succesfully';
     header('location: myprofile.php');
  }else{
     $message[] = 'product could not be updated';
     header('location: myprofile.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BookEat - Profile</title>
  <link rel="stylesheet" href="myprofile.css">
  
  <link rel="icon" href="Images/logo1.png">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
</head>
<body>
<?php include 'BookEatheader.php'; ?>

<div class="mainpro">

<div class="profile">


<?php
      
      $select_products = mysqli_query($conn1, "SELECT * FROM `userregister`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>


<img src="profilepic/<?php echo $fetch_product['profilepic']; ?>" alt="">
         
<?php
         };
      };
      ?>


<form action="" method="post" class="profile1" enctype="multipart/form-data">
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
    <h3>My Profile</h3>
    <!-- <label for="">Name:</label> -->
    <input type="hidden"  name="update_p_id" value="<?php echo $rows['id']; ?>" >
   <div class="center">
    <input type="text" id="full_name" name="name" value="<?php echo $rows['user']; ?>" disabled required>
   </div>
   <!-- <label for="">Email:</label> -->
   <div class="center">
    <input type="email" id="email" name="email" value="<?php echo $rows['email']; ?>" disabled required>
   </div>
   <!-- <label for="">Mobile Number:</label> -->
   <div class="center">
   <input type="tel" id="Pnumber" name="Pnumber" value="<?php echo $rows['Phnumber']; ?>" required>
   </div>
   <label for="">Address:</label>
   <div class="center1">
   <input type="text" id="address1" placeholder="House no & Name" value="<?php echo $rows['house']; ?>" name="house" required> <br>
   <input type="text" id="address1" placeholder="Lane 1"  value="<?php echo $rows['road']; ?>" name="road" required> <br>
   <input type="text" id="address1" placeholder="Area" value="<?php echo $rows['areaname']; ?>" name="areaname" required> <br>
   <input type="text" id="address1" placeholder="Your Pincode" maxlength="6" maxlength="6" onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="<?php echo $rows['pincode']; ?>" name="pincode" required>

   </div>
   
   <div class="btnn">
   <input type="submit" id="btnn1" value="Update" name="update_details" class="btn">
      </div>
<?php } } } ?>
</form>


      </div>

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

          <h2 style="font-size: 20px; ">&reg; <a href="index.php" style="text-decoration: none;"> BookEat</a></h2>

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





<script src="Admin.js"></script> 
</body>
</html>
