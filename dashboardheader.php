<?php

// @include 'config.php';

@include 'adminconfig.php';
 session_start();

 if(!isset($_SESSION['email'])){
    header("location: adminlogin.html");
 }



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="adminheaderstyle.css">

    <link rel="icon" href="logo1.png">
    <title>BookEat - Admin Dashboard</title>
</head>

<body>
    <nav>
        <div class="logo">
            <div class="logo-image">
                <!-- <img src="./logo.png" alt=""> -->
            </div>
            <div class="logo-name">
                <?php
              if(!isset($_SESSION['email'])){
               ?>
               
               <!-- <a href="login.html" class="lo">Sign in</a>  -->
               <?php
              }else{
              $sql = "SELECT * from adminregister where email='{$_SESSION['email']}'";
              $result1 = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result1)>0){
                while($rows = mysqli_fetch_assoc($result1)){
                    echo '<h4>Admin</h4>';
                  echo $rows['user'];
              
              } } }
               ?>
              </div>

             
            </div>
        </div>

        <div class="menu-items">
            <ul class="navLinks">
                <li class="navList active">
                    <a href="admindashboard.php">
                        <ion-icon name="home-outline"></ion-icon>
                        <span class="links">Dashboard</span>
                    </a>
                </li>
                <li class="navList">
                    <a class="tablinks" onclick="Open(event, 'mainaside')">
                        <ion-icon name="folder-outline"></ion-icon>
                        <span class="links">All Orders</span>
                    </a>
                </li>
                <li class="navList">
                    <a href="adminadditems.php" class="tablinks" onclick="Open(event, 'mainaside1')">
                        <ion-icon name="analytics-outline"></ion-icon>
                        <span class="links">Add New Food</span>
                    </a>
                </li>
                <!-- <li class="navList">
                    <a href="#">
                        <ion-icon name="heart-outline"></ion-icon>
                        <span class="links">Complaints</span>
                    </a>
                </li> -->
                <li class="navList">
                    <a class="tablinks" onclick="Open(event, 'mainaside2')">
                        <ion-icon name="mail-outline"></ion-icon>
                        <span class="links">Complaints</span>
                    </a>
                </li>
            </ul>
            <ul class="bottom-link">
                <li>
                    <a href="adminlogout.php">
                        <ion-icon name="log-out-outline"></ion-icon>
                        <span class="links">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <a href="#">
                        <ion-icon name="moon-outline"></ion-icon>
                        <span class="links">Dark Mode</span>
                        <div class="darkToggle">
                            <span class="switch"></span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- <section class="dashboard">
        <div class="top">
            <ion-icon class="navToggle" name="menu-outline"></ion-icon>
             <div class="searchBox">
                <ion-icon name="search-outline"></ion-icon>
                <input type="text" placeholder="Search"> 
            </div> 
            <img src="logo1.png" alt="BookEat" title="BookEat official logo">
        </div>
        <div class="container">


        <div id="openn" class="open">

        </div>



         <div id="mainaside" class="mainaside">



              <h4>I'm order page yet to be added</h4>
            </div>


            <div style="display: none;" id="mainaside1" class="mainaside">
            <iframe src="adminadditems.php" frameBorder="0" title="description"></iframe>

            </div>



            <div style="display: none;" id="mainaside2" class="mainaside">

            <h4>I'm complaint and feedback page yet to be added</h4>
            </div>



            <div style="display: none;" id="mainaside3" class="mainaside">

            <h4>4444444444</h4>
            </div>
        




        </div> 
    </section> -->


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="admincall.js"></script>
    <!-- <script src="adminswitch.js"></script> -->

     <script>
            function Open(evt, Name) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("mainaside");
             for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
             }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                 tablinks[i].classList.remove("active");
                }
                    document.getElementById(Name).style.display = "block";
                    if (evt) {
                        evt.currentTarget.classList.add("active");
                             } 
                        }
    </script>

</body>

</html>