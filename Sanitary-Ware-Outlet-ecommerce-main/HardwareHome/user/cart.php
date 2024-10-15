
<?php session_start(); 

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
      <h1>HardwareHome</h1>
    </div>
    <nav class="navbar">
      <a href="index.php" class="nav"> Home</a>
      <a href="index.php#product" class="nav">Product </a>
      <a href="index.php#about-us" class="nav"> About Us</a>
      <a href="index.php#contact" class="nav"> Contacts</a>
    </nav>

    <div class="icons">
      <div class="fa fa-bars" id="menu-btn"></div>
      <div class="fa fa-shopping-cart" id="cart-btn"><span ><?php echo $count?></span></div>
      <div class="fa fa-user" id="login-btn"></div>
    </div>

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

  
  <section class="cart_section" >
    
      <h1 class="heading"> My<span> Cart</span></h1>
      <div class="cart_container">
        <table class="cart_list">
          <thead class="table_heading">
            <tr>
              <th class="heading" >List No.</th>
              <th class="heading" >Product Name</th>
              <th class="heading" >Price</th>
              <th class="heading" >Quantity</th>
              <th class="heading" >total</th>
              <th class="heading" ></th>  
            </tr>
          </thead>
          <tbody class="table_body">
          <?php
           
            if(isset($_SESSION['cart']))
            {
              foreach($_SESSION['cart'] as $key => $value)
              {
                $sr = $key +1;
                
                echo "
                  <tr>
                    <td class='body'>$sr</td>
                    <td class='body'>$value[product_name]</td>
                    <td class='body'>$value[product_price]<input type='hidden' class = 'iprice' value='$value[product_price]'></td>
                    <td class='body'>
                      <form action='manage_cart.php' method='post'>
                        <input type='number' class='iquantity' name='mod_quantity' onchange='this.form.submit()' value='$value[quantity]' min='1' max='99'>
                        <input type='hidden' name='product_name' value='$value[product_name]'>
                      </form>
                    </td>
                    <td class ='itotal body'></td>
                    <td class='body'>
                      <form action='manage_cart.php' method='post'>
                        <button type='submit' name='remove' class='btn' >remove</button>
                        <input type='hidden' name='product_name' value='$value[product_name]'>
                      </form>
                    </td>
                  </tr>
                ";
              }
            }

          ?>

          </tbody>
        </table>              

        </form>
      </div>
    
  </section>

  <section class="purchase_section">
          
    <?php 
      if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
      {
    ?>

      <h1 class="heading"> Shipping<span> Address</span></h1>
      <div class="purchase_container" >
        <div style=" text-align: center; color:black;">
          <h1 style=" display: inline-block; font-size:2rem; ">Grand total: </h1>
          <span style="font-size:2rem;  padding: 1rem; font-weight: bolder;">Rs.<h3 id="gtotal" style=" font-size:2rem; display: inline-block;"></h3></span>
        </div>
        <form action="purchase.php " method="post" class="data">
          <h1 style=" text-align: center; color:black;">Please enter the correct detail.</h1>
          <label class="info_heading">name</label>
          <input type="text"  name="fullname" id="fullname" placeholder="Enter your name" class="info" required><br>
          <label class="info_heading">Mobile No.</label>
          <input type="text" name="phone" id="user_number" placeholder="Enter your mobile no." class="info" required><br>
          <label class="info_heading">address</label>
          <input type="text"  name="address" id="user_address" placeholder="Enter your address" class="info" required><br>
          <label class="info_heading">E-mail</label>
          <input type="text" style=" text-transform:lowercase;" name="email" placeholder="Enter your E-mail" class="info" required><br>
          <div style="align-item:center; margin-bottom: 1rem;">
            <input type="radio"  name="cod" value="cash" required>
            <label style="text-align:center; margin:1rem; font-size:1.3rem;">cash on delivery</label><br>
          </div>
          <input type="submit" name="purchase" value="Purchase" class="btn"> 
        </form>
      </div>
    <?php 
      }
    ?>
  </section>



<script>
    var gt=0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');
    function subtotal()
    {
        gt=0;
        for(i=0; i<iprice.length; i++)
        {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
            gt = gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
    }

    subtotal();



let navbar = document.querySelector('.navbar');

document.querySelector(`#menu-btn`).onclick = () => {
    navbar.classList.toggle('active');
    userlog.classList.remove('active');

}

// this is for navigation bar
let userlog = document.querySelector('.log');

document.querySelector(`#login-btn`).onclick = () => {
  
    navbar.classList.remove('active');
    userlog.classList.toggle('active');

}
</script>


<script src="js/script.js"></script>
</body>

</html>