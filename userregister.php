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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="userregister.css">
    <link rel="icon" href="Images/logo1.png">

    <title>BookEat - Sign up</title>

</head>
<body>

<?php include 'BookEatheader.php'; ?>




  <div class="forms">
    <form class="form1" method="post" action="userregisterpost.php">
        <h4 id="cancel" style="cursor: pointer;"><a href="userlogin.php" style="text-decoration: none; color: #fff; font-size: 14px; font-weight: 100; ">Back</a></h4>

      <!-- <?php include('errors.php'); ?> -->
        <h3>Sign up</h3>

        <div class="input-field">
        <label for="name">Userame</label>
        <input type="text" name="user" onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 97 && event.charCode <= 122))" minlength="4" maxlength="12" placeholder="Enter your Name" required>
        <i class="fas fa-user"></i>
      </div>


      <div class="input-field">
        <label for="username">E-mail</label>
        <input type="email" name="email" placeholder="Enter your Email" id="username" required>
        <i class="fa-solid fa-envelope"></i>      
      </div>

        <div class="input-field">
        <label for="Phnumber">Mobile No</label>
        <!-- <input type="tel" placeholder="Your Mobile Number"> -->
        <!-- number validation -->
        <input type="tel" name="Phnumber" placeholder="Your Mobile Number" minlength="10" maxlength="10" onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
        <i class="fa-solid fa-circle-phone-flip"></i>           
      </div>


        <div class="input-field">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" minlength="4" maxlength="12" required>
        <i class="fas fa-lock"></i>
      </div>


        <div class="input-field">
        <label for="password">Confirm Password</label>
        <input type="password" name="cpassword" placeholder="Comfirm Password" minlength="4" maxlength="12" required>
        <i class="fas fa-lock"></i>
      </div>



        <div class="inputBox w100">
            <button type="submit">Sign up</button>
          </div>

          <h5 id="signup">Already a Member?<a href="userlogin.php"> Sign in</a></h5>

          <!-- <h4 id="slogin">or <br> Login with Social account</h4> -->

        <!-- <div class="social">
          <div class="go"><i class="fab fa-google" title="Google"></i></div>
          <div class="fb"><i class="fab fa-facebook" title="Facebook"></i></div>
        </div> -->

    </form>



    <!-- signup -->
<!-- 
    <form class="signin" id="show" method="post" action="resgister1.php" style="display: none;" data-aos="fade-up" data-aos-duration="1300">
        <h4 id="cancel" onclick="hidd()" style="cursor: pointer; position: absolute;">Back</h4>
        <h5 style="right: 20px; position: absolute;"><a href="" style="text-decoration: none; color: #FFF;">Login</a></h5>

        <h3>Sign Up</h3>
        <label for="name">Userame</label>
        <input type="text" name="user" placeholder="Enter your Name" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Your email address" required>

        <label for="Phnumber">Mobile No</label>
         <input type="tel" placeholder="Your Mobile Number">
         number validation 
        <input type="tel" name="Phnumber" placeholder="Your Mobile Number" maxlength="10" maxlength="10" onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>


        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required>

        <label for="password">Confirm Password</label>
        <input type="password" name="password" placeholder="Comfirm Password" required>

        <div class="sub">
          <button type="submit" name="reg">Signup</button>
        </div>
        <h4 id="slogin">or <br>Sign up with Social account</h4>

        <div class="social">
          <div class="go"><i class="fab fa-google" title="Google"></i></div>
          <div class="fb"><i class="fab fa-facebook" title="Facebook"></i></div>
        </div>
    </form> -->



</div>
    



 <!-- show/hide -->

 <script>
    function showDiv(){
      document.getElementById('show').style.display="block";
    }
  </script>


 <!-- hide -->
 <script>
    function hidd(){
       var a=document.getElementById('show');
       a.style.display='none'
      }

   </script>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>






<footer style="padding-top: 282px;">
  <!-- height only for template remove height from footer inline style while editin actual page -->
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
          <li>About us</li>
          <li>Contact</li>
          <li>Blog</li>
                    
         
        
        </div>

        
        <div class="linkss">
          <h4>Legal</h4>
          <li>Terms & Services</li>
          <li>Privacy Policies</li>
          <li>Refund Policies</li>
          <li>Cookies</li>
                    
         
        
        </div>

    </div>

    <hr>
    <div class="foot2">
      <img src="img/logo1.png" alt="">  

      <h2>&reg; BookEat</h2>

      <ul>
       <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-instagram"></i>
      </ul>


    </div>
    <div class="foot2">

    </div>
  </div>
</footer>



</body>


</html>

