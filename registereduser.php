<?php

@include 'adminconfig.php';
@include 'config.php';


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
   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/logo1.png">
  <title>BookEat - Registered Users</title>
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
<h2>Registered Users</h2>
   <table>
      <thead>
         
         <th>Feedback Id</th>
         <th>Username</th>
         <th>Email</th>
         <th>Mobile No.</th>
      </thead>
      <tbody>
         <?php         
            $select_products = mysqli_query($conn1, "SELECT * FROM `userregister` ");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>
         <tr>
            
         <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['user']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['Phnumber']; ?></td>
            </td>
         </tr>
         <?php
            };    
            }else{
               echo "<div class='empty'>There are no Registered users <br>BookEat <a href='index.php'>Now</a></div>";
            };
         ?>
      </tbody>
   </table>
</section>
</body>
</html>
