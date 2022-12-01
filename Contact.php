<?php

@include 'config.php';

session_start();

if(isset($_POST['addfeedback'])){

  $fname = $_POST['fname'];
  $femail = $_POST['femail'];
  $fnumber = $_POST['fnumber'];
  $fmessage = $_POST['fmessage'];
     $insert_product = mysqli_query($conn, "INSERT INTO `feedback`(fname, femail, fnumber, fmessage) VALUES ('$fname','$femail','$fnumber','$fmessage')");
  }

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="contact.css">
        <link rel="stylesheet" href="myprofile.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7f8d1dd8b4.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        
        <script src="aside.js"></script>

        <link rel="icon" href="Images/logo1.png">
    <title>BookEat - Contact us</title>



    <!--Start of Tawk.to Script-->
<script>
  function api()
  {
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f4dcdb54704467e89eb2e91/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
}
</script>
<!--End of Tawk.to Script-->




    </head>
    <body>


 <?php include 'BookEatheader.php'; ?>


        
        <!-- HELP -->

        
  <div class="contact1">
    <h1>Solve all your queries here</h1>
    <h2>We Serve You Better</h2>

    <div class="btn">
        <button><a href="#faq">GoTo FAQ</a></button>
        <div class="dropdown">
          <button class="dropbtn">Talk To Us</button>
          <div class="dropdown-content">
            <a href="tel:123456789">Call: 123456789</a>
            <a href="#" onclick="api()">Real time Chat</a>
            <a href="#" onclick="showDiv();">Help us Improve</a>
          </div>
        </div>


        


    </div>

    
    
    <!-- <li>GoTo</li>
    <li>Talk</li> -->
    
  </div>



  <!-- Contact Form -->

  <div class="contact">
    
    <form class="form" id="show" style="display: none;" action="" method="post" onsubmit="return validateForm()">
      <h3 id="cancel" onclick="hidd()" style="cursor: pointer; text-align: end; font-size: 20px;" >&#10060;</h3>
    <!--<form class="form"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="received()">-->
    <div class="title">
      <h3>What can we Improve? <br> <span style="font-size: 12px;"> Or Make a special request</span> </h3>
    </div>
    <div class="form-items">
    <input type="text" class="input" name="fname" placeholder="Your Name" required>
    <i class="fas fa-user"></i>
    </div>
    <div class="form-items">
    <input type="email" class="input" name="femail" placeholder="Email" required>
    <i class="fas fa-envelope"></i>
    </div>
    <div class="form-items">
      <input type="tel" class="input" name="fnumber" placeholder="Mobile No." maxlength="10" maxlength="10" onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
      <!-- <input type="tel" minlength="10" maxlength="10"  placeholder="Phone number" class="si1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" /> -->
      <i class="fas fa-mobile"></i>
    </div>
    <div class="form-items">
    <textarea class="input message" name="fmessage" cols="30" rows="10"  placeholder="Help us Improve/Request a special dish of your choice....." required></textarea>
    </div>
    <div class="inputBox w100">
      <input type="submit" name="addfeedback">
    </div>
   </form>
  
</div>
</div>



  




























              <!-- FAQ -->
    <section id="faq">
      <h1  class="title">Frequently Asked Questions</h1>
      
      <div class="category">
          <div class="subjects">
              <h2>How do I Claim a Free Coupon?</h2>
  
              <svg width="15" height="10" viewBox="0 0 42 25">
                  <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
              </svg>
  
          </div>
  
          <div class="subans">
            <p>
            Coupons are free to claim, use the search or find somewhere close by using the Google Map View.
Once you've found a great coupon offer, click the day you wish to use it, fill out your details to complete.
You'll instantly receive your free coupon to your email inbox 
To redeem - simply present coupon to staff when paying.
              </p>
          </div>
  
          
  
      </div>
  
      <div class="category">
          <div class="subjects">
              <h2>How do I book a Bookable-Special?</h2>
  
              <svg width="15" height="10" viewBox="0 0 42 25">
                  <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
              </svg>
  
          </div>
          <div class="subans">
        <p>It's quick and easy - once you've found your preferred restaurant special, simply click 'Book Special' then select a date when its available, then the time, and then so long as we have an email address and phone number your booking is instantly confirmed the minute you hit "Book"




          If you still need it <a style="text-decoration: none;" href="contact.php">Request here</a>
        </p>
          </div>
  
          
  
      </div>
  
      <div class="category">
          <div class="subjects">
              <h2>Why do you need my email address?</h2>
  
              <svg width="15" height="10" viewBox="0 0 42 25">
                  <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
              </svg>
  
          </div>
  
          <div class="subans">
              <p>
                
              All Restaurant Hub bookings are automatically confirmed via email. Without an address to send the confirmation to the booking can't be accepted. We'll also use your email address to send reminders for any bookings made more than 24 hours in advance of your dining date. 
              </p>
          
          </div>
  
          
  
      </div>
  
  
  
      <div class="category">
          <div class="subjects">
              <h2>How does a restaurant get into The Good Food Guide?</h2>
  
              <svg width="15" height="10" viewBox="0 0 42 25">
                  <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
              </svg>
  
          </div>
  
          <div class="subans">
              <p>The long-list for potential entries is created from the huge volume of feedback that we receive from members of the public. We collect comments and recommendations throughout the year from diners across the UK. The Good Food Guide team then assesses the recommendations to create a long-list of potential inclusions before sending our anonymous inspectors to visit the restaurants in question.
              </p>
          
          </div>
  
          
  
      </div>
  
  
  
      
      <div class="category">
          <div class="subjects">
              <h2>Why do you choose our Service?</h2>
  
              <svg width="15" height="10" viewBox="0 0 42 25">
                  <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
              </svg>
  
          </div>
  
          <div class="subans">
              <p>The long-list for potential entries is created from the huge volume of feedback that we receive from members of the public. We collect comments and recommendations throughout the year from diners across the UK. The Good Food Guide team then assesses the recommendations to create a long-list of potential inclusions before sending our anonymous inspectors to visit the restaurants in question.
              </p>
          
          </div>
  
          
  
      </div>
  
  
  </section>

  












 
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


              <!-- show/hide -->

              <script>
                function showDiv(){
                  document.getElementById('show').style.display="block";
                }
              </script>


              <!-- onsubmitclose -->

              <script>
                function validateForm() {
               if(confirm('Are you sure you want to submit the feedback?'))
              {
              $("myform").submit();
      
               }
                 else{
                   alert("Invalid");
                    return false;
                     }
                  }
              </script>




               <!-- hide -->
              <script>
             function hidd(){
                var a=document.getElementById('show');
                a.style.display='none'
               }

            </script>

  
              <!-- <script src="show"></script> -->
              <script src="contact.js"></script>
        
      </body>
  </html>
  
  