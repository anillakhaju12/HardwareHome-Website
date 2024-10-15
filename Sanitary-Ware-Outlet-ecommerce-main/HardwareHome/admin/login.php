<?php
  require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>HardwareHome admin login</title>
</head>
<body>


  <div class="login_container">
    <h1>Login</h1>
  <!-- Modal Content -->
    <form autocomplete="off" action="admin_login.php" method="post">
    
        <input type="text" class="input" placeholder="Username or E-mail" name="username_email" required><br>
        
        <input type="password" class="input" placeholder="Password" name="password" required><br>
        <a href="">Forget Password?</a><br>
        <input type="submit" class="btn" value=" Login " name="login"></input><br>
        <label>
            <input type="checkbox" checked="checked" name="remember" class="remb"> Remember me
        </label><br>
        
   </form>
  </div>
</body>
</html>