
<?php
include('config.php');
session_start();


$count=0;
if(isset($_SESSION['cart']))
{
 $count = count($_SESSION['cart']);
}
?>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HardwareHome</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
  <header class="header">
    <div>
    <a href="#"> <i class="fa fa-home" aria-hidden="true"> </i>HardwareHome</a>
    </div>
    <nav class="navbar">
      <a href="#home" class="nav"> Home</a>
      <a href="#product" class="nav">Product </a>
      <a href="#about-us" class="nav"> About Us</a>
      <a href="#contact" class="nav"> Contacts</a>
    </nav>

    <div class="icons">
      <div class="fa fa-bars" id="menu-btn"></div>
      <div class="fa fa-search" id="search-btn"></div>
      <a href="cart.php"><div class="fa fa-shopping-cart" id="cart-btn"><span><?php echo $count?></span></div></a>
      <div class="fa fa-user" id="login-btn"></div>
    </div>

    <form class="search">
      <input type="text" placeholder="search" id="searchbox" onkeyup="search()">
      <label for="searchbox" class="fa fa-search" id="s-btn"></label>
    </form>

    <form class="log">
        <?php 
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
          {
            echo"
            <h4 style='text-align:center; padding:1rem;'>Hello,  $_SESSION[name] </h4>
            <a href='logout.php' class='btn'>Logout</a>
          ";

          }
          else{
            echo"
                <a href='login.php'  class='btn'>Login</a>
                <a href='register.php' class='btn'>Register</a>
            ";
          }
        ?>
    </form>



  </header>

  <div class="slideshow-container" id="home">

    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="image/bathroom.jpg">
      <div class="text">Get the best quality product</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src='image/room.jpg'>
      <div class="text">Paint your dream</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

  </div>

  
  <section class="section" id="product">
    <h1 class="heading">Buy <span>now</span></h1>
    <div class="list">
        <?php
         $conn =mysqli_connect('localhost','root','','hardwarehome');
          $Record = mysqli_query($conn, "SELECT * FROM `product`");
          while ($productsdata = mysqli_fetch_array($Record))

            echo "
            <form action='manage_cart.php' method='post'>
              <div class='item'>
                <img src='../admin/$productsdata[product_image]' alt='image'>
                <h1 class='title'>$productsdata[product_name]</h1>
                <div class='price'>$productsdata[product_price]</div>
                <button type='submit' class='addtocart' name='add_to_cart' data-product-id='$productsdata[product_id]'>Add To Cart</button>
                <input type='hidden' name='product_name' value='$productsdata[product_name]'>
                <input type='hidden' name='product_price' value='$productsdata[product_price]'>  
              </div>
            </form>
            ";
        ?>
    </div>
  </section>

  <section class="aboutus" id="about-us">
    <h1 class="heading">About <span>Us</span></h1>
    <p>Welcome to HardwareHome, your premier destination for all your hardware ordering needs. We are a trusted online
      platform that provides a wide range of high-quality hardware products to individuals and businesses alike. Whether
      you're a DIY enthusiast, a professional contractor, or a business owner, we've got you covered with our extensive
      selection of top-notch hardware items.At HardwareHome, we understand the importance of reliable and durable
      hardware for any project, big or small. That's why we have carefully curated our inventory to include only the
      best brands and products in the industry. From power tools and fasteners to plumbing supplies , we offer everything you need to tackle any project with confidence.<br> For <span><a
          href="#contact">More Info</a></span></p>
  </section>

  <section class="contacts" id="contact">
    <h1 class="heading"> More<span> Info </span></h1>
    <div class="box-container">
      <div class="contactLink">
        <h3>HardwareHome</h3>
        <p>Feel Free To Contact Us On The Given Social Media.</p>
        <div class="icon">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-instagram"></a>
        </div>
      </div>
      <div class="contactLink">
        <h3>Contact Info</h3>

        <a href="#" class="ico"> <i class="fa fa-phone"></i> +977 9814526332</a>
        <a href="#" class="ico"> <i class="fa fa-phone"></i> +977 9841958862</a>
        <a href="#" class="ico"> <i class="fa fa-envelope"></i> hardwarehome@gmail.com</a>
        <a href="#" class="ico"> <i class="fa fa-map-marker"></i> Bhaktapur, Nepal</a>

      </div>
      <div class="contactLink">
        <h3>Quick Link</h3>

        <a href="#home" class="ico"> <i class="fa fa-arrow-right"></i> Home</a>
        <a href="#product" class="ico"> <i class="fa fa-arrow-right"></i> Products</a>
        <a href="#about-us" class="ico"> <i class="fa fa-arrow-right"></i> About Us</a>

      </div>
    </div>
    <div class="footer">Thanks For Visiting</div>
  </section>

  <aside class="aside">
    <div class="cart">
      <h1>cart</h1>
      <div class="fa fa-times" id="xmark-btn"></div>
      <div class="list">
        <ul class="listcard"></ul>
      </div>
      <div class="checkout">
        <div class="total">Rs.0</div>
        <a href="shipping.php"><div class="buy">Buy</div> </a>
      </div>
    </div>
  </aside>







  <script src="js/script.js"></script>
</body>

</html>