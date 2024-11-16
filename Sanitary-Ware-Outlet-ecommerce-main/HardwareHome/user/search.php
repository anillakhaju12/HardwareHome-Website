<?php
include('config.php'); // Database connection

session_start();


$query = isset($_GET['query']) ? trim($_GET['query']) : '';

// Use a prepared statement to avoid SQL injection
$stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE ?");
$searchTerm = "%" . $query . "%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
?>

<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>


<body>
    <header class="header">
        <div>
            <a href="#"> <i class="fa fa-home" aria-hidden="true"> </i>HardwareHome</a>
        </div>
        <nav class="navbar">
            <a href="index.php#home" class="nav"> Home</a>
            <a href="#product" class="nav">Product </a>
            <a href="index.php#about-us" class="nav"> About Us</a>
            <a href="#contact" class="nav"> Contacts</a>
        </nav>

        <div class="icons">
            <div class="fa fa-bars" id="menu-btn"></div>
            <div class="fa fa-search" id="search-btn"></div>
            <a href="cart.php">
                <div class="fa fa-shopping-cart" id="cart-btn"><span><?php echo $count ?></span></div>
            </a>
            <div class="fa fa-user" id="login-btn"></div>
        </div>

        <form class="search" action="search.php" method="GET">
            <input type="text" placeholder="search" name="query" id="searchbox" onkeyup="search()">
            <Button type="submit" class="fa fa-search" id="s-btn"></Button>
        </form>

        <form class="log">
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                echo "
            <h4 style='text-align:center; padding:1rem;'>Hello,  $_SESSION[name] </h4>
            <a href='logout.php' class='btn'>Logout</a>
          ";

            } else {
                echo "
                <a href='login.php'  class='btn'>Login</a>
                <a href='register.php' class='btn'>Register</a>
            ";
            }
            ?>
        </form>



    </header>
    <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
    <section class="section" id="product">

        <div class="list">
            <?php
            if ($result->num_rows > 0) {
                while ($product = $result->fetch_assoc()): ?>

                    <form action='manage_cart.php' method='post'>
                        <div class='item'>
                            <img src='../admin/<?php echo $product['product_image']; ?>' alt='image'>
                            <h1 class='title'><?php echo $product['product_name']; ?></h1>
                            <div class='price'>Rs.<?php echo $product['product_price']; ?></div>
                            <button type='submit' class='addtocart' name='add_to_cart'
                                data-product-id='$product[product_id]'>Add To
                                Cart</button>
                            <input type='hidden' name='product_name' value='$product[product_name]'>
                            <input type='hidden' name='product_price' value='$product[product_price]'>
                        </div>
                    </form>

                <?php endwhile;
            } else {
                echo "<p style='font-size: 2rem; text-align: center;'>No products found for '$query'</p>";
            }
            ?>
        </div>
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
                <a href="shipping.php">
                    <div class="buy">Buy</div>
                </a>
            </div>
        </div>
    </aside>







    <script src="js/script.js"></script>

</body>

</html>