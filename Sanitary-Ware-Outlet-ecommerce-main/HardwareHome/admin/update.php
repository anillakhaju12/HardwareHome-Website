<?php
session_start();

 require('config.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
            <a href="order.php" class="nav"> view order</a>

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
    <div>
    
        <?php 
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
          {
            echo"
            <h1 class='adminwel'> WELCOME  TO  ADMIN  DASHBOARD,  $_SESSION[username] </h1>
           
          ";

          }
          else{
      
          
            header('location:login.php');
         
          }
        ?>
    </div>

    <section class="update_section">
        <h1 class="heading"> upload<span> Product</span></h1>
        <div class="upload_product">
            <form action="updatedata.php" method="post" class="data" enctype="multipart/form-data">
                <h1>Upload the product here.</h1>
                <label >product name</label>
                <input type="text" name="product_name" id="product_name" placeholder="product name" class="product" required><br>
                <label >product price</label>
                <input type="text" name="product_price" id="product_price" placeholder="product price"
                    class="product" required><br>
                <label >product image</label>
                <input type="file" name="product_image" id="product_image" required>
                <br>
                <input type="submit" name="Upload" value="Upload" class="btn">
            </form>
        </div>
    </section>



    <section class="list_section">
        <h1 class="heading"> Our<span> Product</span></h1>
        <!-- fetch data from the database -->
        <div class="list-container" id="product">
            <table class="productlist">
                <thead class="table_heading">
                    <th class="heading">Id</th>
                    <th class="heading">Product Image</th>
                    <th class="heading">Product Name</th>
                    <th class="heading">Product Price</th>
                    <th class="heading">update</th>
                    <th class="heading">delete</th>
                </thead>
                <tbody class="table_body">
                    <?php


                    include 'config.php';
                    $Record = mysqli_query($conn, "SELECT * FROM `product`");
                    while ($row = mysqli_fetch_array($Record))

                        echo "
                     <tr>
                     <td class='body' style='width:7rem;'>$row[product_id]</td>
                     <td class='body' style='padding: 1rem 0rem; width:32rem;' ><img src='$row[product_image]' alt='image' style='width: 30%'></td>
                     <td class='body'>$row[product_name]</td>
                     <td class='body'>$row[product_price]</td>
                     <td class='body' style='width:10rem;'><a href='updateproduct.php?id=$row[product_id]' ><input type='submit' value='Update' class='btn'> </a></td>
                     <td class='body' style='width:10rem;'><a href='delete.php?id=$row[product_id]' ><input type='submit' name='delete' value='Delete' class='btn' method='post'></a></td>
                 
                     </tr>
                     ";
                    ?>
                </tbody>
            </table>
        </div>
    </section>





    <script src="js/script.js"></script>
</body>

</html>