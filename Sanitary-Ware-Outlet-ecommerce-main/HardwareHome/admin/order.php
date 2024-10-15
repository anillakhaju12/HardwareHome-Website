
<?php
session_start();
 
include "config.php";
?>




<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HardwareHome</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <header class="header">
    <div>
   <a href="#"> <i class="fa fa-home" aria-hidden="true"> </i>HardwareHome</a>
       
     
    </div>
    <nav class="navbar">
      <a href="update.php" class="nav"> Home</a>

    
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


  <section class="order_section" >
    
      <h1 class="heading"> order<span> placed</span></h1>
      <div class="order_container">
        <table class="orderlist">
          <thead >
            <tr>
              <th class="heading">Order Id</th>
              <th class="heading">Customer Name</th>
              <th class="heading">Mobile No.</th>
              <th class="heading">Email</th>
              <th class="heading">Address</th>
              <th class="heading">Pay mode</th>
              <th class="heading">Orders</th>  
            </tr>
          </thead>
          <tbody >
          <?php
           $query = "SELECT * FROM `order_manage`";
           $user_result = mysqli_query($conn,$query);
            while($user_fetch = mysqli_fetch_assoc($user_result))
            {
                echo "
                  <tr>
                    <td class='body'>$user_fetch[order_id]</td>
                    <td class='body'>$user_fetch[full_name]</td>
                    <td class='body'>$user_fetch[phone]</td>
                    <td class='body' style='text-transform:lowercase;'> $user_fetch[email]</td>
                    <td class='body'>$user_fetch[address]</td>
                    <td class='body'>$user_fetch[pay_mode]</td>
                    <td class='body'>
                      <table>
                          <thead style='text-align: center;'>
                            <tr>
                              <th class='heading'>Product Name</th>
                              <th class='heading'>Price</th>
                              <th class='heading'>Quantity</th>  
                            </tr>
                          </thead>
                          <tbody >
                      ";
                          $order_query = "SELECT * FROM `user_orders` WHERE `order_id`= '$user_fetch[order_id]'";
                          $order_result = mysqli_query($conn,$order_query);
                          while($order_fetch = mysqli_fetch_assoc($order_result))
                          {
                          echo"
                            <tr>
                              <td class='body'>$order_fetch[product_name]</td>
                              <td class='body'>$order_fetch[product_price]</td>
                              <td class='body'>$order_fetch[quantity]</td>  
                            </tr>
                        ";
                          }
                        echo "
                          
                          </tbody>
                      </table>
                    </td>
                  </tr>
                ";
              
            }

          ?>

          </tbody>
        </table>              
     
          </div> 
        </form>
      </div>
   
  </section>





  <script src="js/script.js"></script>
</body>

</html>