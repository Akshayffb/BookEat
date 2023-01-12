<?php

@include 'config.php';

@include 'cartconfig.php';
session_start();


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_category = $_POST['product_category'];
   $product_descr = $_POST['product_descr'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'This item already exist in your cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, category, descr, price, image, quantity) VALUES('$product_name', '$product_category', '$product_descr', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'New food added to your cart';
   }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="cartstyle.css">
        <link rel="stylesheet" href="waves.css">

        <!-- <link rel="stylesheet" href="BookEatheader.css"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7f8d1dd8b4.js"></script>
        <script src="aside.js"></script>
        <link rel="icon" href="Images/logo1.png">
         <title>BookEat - Grab A Bite</title>
    </head>
<body>

    <?php include 'BookEatheader.php'; ?>



    <div class="headingggg">
      <img src="img/food51.jpg" alt="">
      <!-- <img src="https://images.pexels.com/photos/1058277/pexels-photo-1058277.jpeg?cs=srgb&dl=pexels-marcus-herzberg-1058277.jpg&fm=jpg&_gl=1*19mmfmv*_ga*OTQ0NjcxNDYxLjE2Njc1Njc3MDI.*_ga_8JE65Q40S6*MTY2NzY3MDkyOC4zLjEuMTY2NzY3MDk2My4wLjAuMA.." alt=""> -->
      <div class="haaa">
      <h2>grab a delicious meal today</h2>
      <h4>" at your doorstep "</h4>
      <div class="buttt">
        <a href="#ordernow"><button>Order now</button></a>
        <a href="contact.php"><button>Need help?</button></a>
      </div>
      </div>
  
    </div>

    <!-- slides -->

    <div class="headtext">
    <h1>Variety of <span style="color: yellowgreen; font-family: 'Times New Roman', Times, serif; letter-spacing: 0.2vh;"> Food </span><span style="color:#e0501b; font-family: 'Times New Roman', Times, serif; letter-spacing: 0.2vh;">We Offer</span> </h1>
<br><h3>( Veg, Non-Veg, Desi Thali, Veg-Rolls, Non-Veg Rolls etc...... )</h3>
    </div>

    <div class="wrapper">
  <!-- Images Area -->
  <div class="images-area">


    <img src="img/food1.jpg" alt="image" class="firstImage">
    <img src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1371&q=80">
    <img src="img/food6.jpg" alt="image">
    <img src="https://images.unsplash.com/photo-1565280654386-36c3ea205191?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="">
    <img src="img/food2.jpg" alt="image">
    <img src="https://images.unsplash.com/photo-1624374053855-39a5a1a41402?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
    <img src="img/food3.jpg" alt="image">
    <img src="https://images.unsplash.com/photo-1633383718081-22ac93e3db65?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=758&q=80" alt="">
    <img src="img/food4.jpg" alt="image">
    <img src="https://images.unsplash.com/photo-1631515242808-497c3fbd3972?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1232&q=80" alt="">
  </div>
  <!-- Buttons Area -->
  <div class="buttons-area">
    <div class="previous-btn">
      <i class='bx bx-chevron-left'></i>
    </div>
    <div class="next-btn">
      <i class='bx bx-chevron-right'></i>
    </div>
  </div>
  <!-- Pagination Area -->
  <div class="pagination-area">
  </div>
</div>


<!-- slides end here -->


      <!-- Restaurants -->
      
      <aside>
        <h3>Restaurants</h3>
        <!-- <a ><i class="fa-solid fa-bars" aria-hidden="true"></i>Charts</a> 
        <a class="tablinks"  onclick="divVisibility('Div4');"><i class="fa-" aria-hidden="true"></i>Desert</a>  -->
        <a class="tablinks" href="Contact.php"  onclick="divVisibility('Div3');"><i class="fa fa-user-o" aria-hidden="true"></i>Special Request</a> 
        <a class="tablinks" href="#order1" onclick="divVisibility('Div2');"><i class="fa-regular fa-face-laugh-beam" aria-hidden="true"></i>Non-Vegetarian</a>
        <a class="tablinks" href="#ordernow" onclick="divVisibility('Div1');"><i  class="fa-regular fa-pot-food" aria-hidden="true"></i>All food</a> 
       
    </aside>

    <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message1"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>





<div id="mainaside" class="mainaside">


    <div class="container">

    <section class="products">

   <!-- <h1 class="heading">Veg Items</h1> -->



   <!-- <div class="subaside1"> -->
   <!-- <div class="subaside1" id="image1"> -->

   <div class="subaside1" id="ordernow">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="subasideimg">
            <img src="addedimages/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <p><?php echo $fetch_product['category'];?></p>
            <p><?php echo $fetch_product['descr'];?></p>
            <div id="order1" class="price">&#8377;:- <?php echo $fetch_product['price']; ?>/- only</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_category" value="<?php echo $fetch_product['category']; ?>">
            <input id="orderveg" type="hidden" name="product_descr" value="<?php echo $fetch_product['descr']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>
   </div>

   
   </div>
   </div> 

  

</section>
    </div>

    


<!-- feedback slides -->

<div class="feedback">

<div class="feed">
<h2>Our Happy Customers says</h2>

</div>

<div id="slider">

<ul>
  <li>
  <div class="slider-container">
    <h1 style="color: blue; font-size: 5rem;">	&ldquo;	</h1>
    <p>“Went with my wife, absolutely brilliant restaurant, the food tasted beautiful, so much depth and very well presented.
       As good if not better than any in the city centre.” <br> <span style="color: #0F52BA;"> Nathaniel Harwood – User</span></p>
  </div>
  </li>
  
  
    <li>
    <div class="slider-container">
    <p>“Great friendly service, the staff don't make you feel rushed, but are also very attentive, best Thai food I have had in years, 
      flavours are out of this world, and extremely good prices for the quality you get is top notch!!!!!! Love it” <br><span style="color: #0F52BA;"> Nathaniel Harwood – User</span></p>
  </div>
  </li>
    <li>
    <div class="slider-container">
    <p>“Possibly one of the best in Manchester. A menu designed and prepared by a very skilled chef, ably assisted by his wife who provides a friendly welcome. 
      Always consistent and of high quality.” <br><span style="color: #0F52BA;"> Nathaniel Harwood – User</span></p>
  </div>
  </li>
    <li>
    <div class="slider-container">
    <p>“Food was amazing and service could not have been better...we went for a quick lunch as our office is opposite the restaurant...very 
      quick service...I am highly recommending this restaurant to all my family and friends...” <br><span style="color: #0F52BA;"> Nathaniel Harwood – User</span></p>
  </div>
  </li>
   <li>
    <div class="slider-container">
    <p>“Went for the first time last night for my Husbands Birthday, friendly staff, very tasty food, would highly recommend, we will be back.” <br><span style="color: #0F52BA;"> Nathaniel Harwood – User</span></p>
  </div>
  </li>
   <li>
    <div class="slider-container">
    <p>“A lovely, well decorated restaurant, where great food is served by very friendly staff for a bargain price. The food is authentic and delicious. We'll definitely be returning.”<br><span style="color: #0F52BA;"> Nathaniel Harwood – User</span></p>
  </div>
  </li>
</ul>
</div>

</div>

<!-- slides end here -->




<!-- reach out to us -->

<div class="reach">




<aside class="sidebar">
    <h4>Office</h4> <br>
    <h3 style="color: #5161ce;">BookEat Private Ltd.</h3>
              <p>OMBR Layout<br>
                 Bangalore - 560043<br>
                  Karnataka
              </p>   
              <p>Call us on: <br> 
            +91 1234567890 <br>
            Mail : info@bookeat.in
            </p>
            <p>Timings: <br>
            Wednesday - Monday <br>
            Tuesday Holiday <br>
          8 am - 10 pm <br>

          </p>
  </aside>


  <div class="map">
<div class="mapouter" style="right: 70px; margin-top: 75px;"><div class="gmap_canvas">
<iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=690&amp;height=360&amp;hl=en&amp;q=st george college&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
</iframe><a href="https://piratebay-proxys.com/">Piratebay</a>
</div>
<style>.mapouter{position:relative;text-align:right;width:100%;height:360px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:360px;}.gmap_iframe {height:360px!important;}</style></div>
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



<!-- onclick switch  -->

<!-- <script>
  function kaamkar()
{
var imageOne=document.getElementById("image1").style;
var imageTwo=document.getElementById("mainaside1").style;
if(imageOne.visibility=="visible")
{
imageOne.visibility="hidden";
imageTwo.visibility="visible";
}
else
{
imageOne.visibility="visible";
imageTwo.visibility="hidden";
} }
</script>
 -->
<script>
function kaamkar()
var divs = ["Div1", "Div2", "Div3", "Div4"];
    var visibleDivId = null;
    function divVisibility(divId) {
      if(visibleDivId === divId) {
        visibleDivId = null;
      } else {
        visibleDivId = divId;
      }
      kaamkar();
    }
    function kaamkar() {
      var i, divId, div;
      for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if(visibleDivId === divId) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }
    }
</script>




<script src="slides.js"></script>


    </body>
</html>

