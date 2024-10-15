
<?php
session_start();

 require('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updateproduct</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header class="header">
        <div>
            <a href="#"> <i class="fa fa-home" aria-hidden="true"> </i>HardwareHome</a>


        </div>
        <nav class="navbar">
            <a href="update.php" class="nav"> update</a>
            <a href="#product" class="nav">Product </a>
            <a href="#about-us" class="nav"> view order</a>

        </nav>

        <div class="icons">
            <div class="fa fa-bars" id="menu-btn"></div>

            <div class="fa fa-user" id="login-btn"></div>
        </div>

    
        <form class="log">
         
         <?php 
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
           {
             echo"
             <h4 style='text-align:center; padding:1rem;'>Hello,  $_SESSION[username] </h4>
             <a href='logout.php' class='btn'>Logout</a>
           ";
 
           }
           else{
       
           
             header('location:login.php');
          
           }
         ?>
     </form>


    </header>

    <div class="banner">
        <img src="../blue.gif">
    </div>

    <section class="update_section">
        <h1 class="heading"> update<span> Product</span></h1>
        <div class="upload_product">

            <?php
            include 'config.php';
            $id = $_GET['id'];
            $Record = mysqli_query($conn, "SELECT * FROM `product` where product_id = '$id'");
            $row = mysqli_fetch_array($Record);
            ?>



            <form action="updatedata.php" method="post" class="data" enctype="multipart/form-data">
                <h1>Update the product here.</h1>
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                <label for="product_name">product name</label>
                <input type="text" name="product_name" id="product_name" value="<?php echo $row['product_name']; ?>"
                    class="product" required><br>
                <label for="product_price">product price</label>
                <input type="text" name="product_price" id="product_price" value="<?php echo $row['product_price']; ?>"
                    class="product" required><br>
                <label for="product_image">product image</label>
                <input type="file" name="product_image" id="product_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                <input type="hidden" name="product_image_old" value="<?php echo $row['product_image']; ?>">
                <br>
                <input type="submit" name="Update" value="Update" class="btn" >
            </form>
            <?php
            
            ?>
        </div>
    </section>




    <script src="js/script.js"></script>
</body>

</html>