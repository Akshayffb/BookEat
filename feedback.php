<?php

@include 'adminconfig.php';
@include 'config.php';


if(!isset($_SESSION['emailaddress'])){
    header("location: adminlogin.html");
 }


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `feedback` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: feedback.php');
      $message[] = 'Feedback Deleted';
   }else{
      header('location: feedback.php');
      $message[] = 'Feedback could not be deleted';
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
  <title>BookEat - All Feedbacks</title>
  <link rel="stylesheet" href="feedback.css">
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
<section class="display-feedback-table">
<h2>Feedback from Customers</h2>
   <table>
      <thead>
         
         <th>Feedback Id</th>
         <th>Username</th>
         <th>Email</th>
         <th>Mobile No.</th>
         <th>Message</th>
         <th>Delete Message</th>
      </thead>
      <tbody>
         <?php         
            $select_products = mysqli_query($conn, "SELECT * FROM `feedback`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>
         <tr>
            
         <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['femail']; ?></td>
            <td><?php echo $row['fnumber']; ?></td>
            <td><?php echo $row['fmessage']; ?></td>
            <td>
               <a href="feedback.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Do you really want to delete this feedback?');">Delete</a>
            </td>
         </tr>
         <?php
            };    
            }else{
               echo "<div class='empty'>There are no feedbacks from customer <br>BookEat <a href='index.php'>Now</a></div>";
            };
         ?>
      </tbody>
   </table>
</section>
</body>
</html>
