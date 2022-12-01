<?php

@include ('config.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id"content="************">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7f8d1dd8b4.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="userlogin.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="myprofile.css">
    <link rel="icon" href="Images/logo1.png">

    <title>BookEat - Login</title>
</head>
<body>

<?php include 'BookEatheader.php'; ?>

  
<!-- <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a> -->




  <div class="forms">
    <form class="form1" method="post" action="userloginpost.php">
      <!-- <?php include('errors.php'); ?> -->
        <h3>Sign in</h3>

        <div class="input-field">
        <label for="username">E-mail</label>
        <input type="email" name="email" class="input" placeholder="Enter your Email" id="username" required>
        <i class="fas fa-user"></i>
      </div>

      <div class="input-field">
            <i class="fas fa-lock"></i>
        <label for="password">Password</label>
        <input type="password" name="password" class="input" placeholder="Password" id="password" required>
</div>
        <div class="inputBox w100">
            <button type="submit">Login</button>
          </div>

          <h5 id="signup"><a href="userregister.php">Sign up </a>if you don't have an account</h5> <br>
          <h5>Admin Login<a href="adminlogin.html"> here</a></h5>

          <!-- <h4 id="slogin">or <br> Login with Social account</h4>

        <div class="social">
          <div class="go"><i class="fab fa-google" title="Google"></i></div>
          <div class="fb"><i class="fab fa-facebook" title="Facebook"></i></div>
        </div> -->

    </form>



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





        <!-- footer -->
        <!-- <div class="footer">
            <h1>
                &copy; Copyrights are reserved
            </h1>
            <h1>
                &reg; Registered site
            </h1>
            <div class="icons">
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram-square"></i></a>
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-square"></i></a>
                <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter-square"></i></a>
            </div>
        </div> -->


    

          <script>
            function myFunction() {
              var x = document.getElementById("myLinks");
              if (x.style.display === "block") {
                x.style.display = "none";
              } else {
                x.style.display = "block";
              }
            }
            </script>



       <script src="slide1.js"></script>
       <script src="abs.js"></script>
       <!-- <script src="slide2.js"></script> -->
       <!-- <script src="rest.js"></script> -->



       <!-- user account -->

       <script>
        let sabMenu = document.getElementById("sabMenu");

        function toggleMenu(){
          sabMenu.classList.toggle("open-menu");
        }
       </script>









    </body>
</html>

