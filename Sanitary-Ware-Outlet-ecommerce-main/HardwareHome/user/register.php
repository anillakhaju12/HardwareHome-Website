<?php
  require('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>HardwareHome login</title>
</head>
<body>


  <div class="register_container">
    <h1>Register</h1>
  <!-- Modal Content -->
    <form action="login_register.php" method="post">
        <input type="text" class="input" placeholder="Name" name="name" required><br>
        <input type="text" class="input" placeholder="Username" name="username" required><br>
        <input type="text" class="input" placeholder="Email" name="email" required><br>
        <input type="password" class="input" placeholder="Password" name="password" required><br>
        <input type="password" class="input" placeholder="Confirm Password" name="cpassword" required><br>
        
        <input type="submit" class="btn" name="register" value=" Register "></input><br>
        
       <span class="span">Already have an account? <a href="login.php">Login</a></span> 
   </form>
  </div>
</body>
</html>