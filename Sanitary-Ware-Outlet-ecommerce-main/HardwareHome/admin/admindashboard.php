
<?php
session_start();

 require('config.php');
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
      <a href="update.php" class="nav"> update</a>
      <a href="#product" class="nav">Product </a>
      <a href="order.php" class="nav"> orders </a>
    
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



  <div>
    <h1>welcome to admindashboard</h1>
  </div>







  <script src="js/script.js"></script>
</body>

</html>