<?php
session_start();
// session_destroy();
$conn = mysqli_connect("localhost","root","","hardwarehome");


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST['purchase']))
    {
        $name= $_POST['fullname'];
        $address= $_POST['address'];
        $phone= $_POST['phone'];
        $email= $_POST['email'];
        $pay= $_POST['cod'];

        if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
         {
            echo "
            <script>
                alert('Only letters and white space allowed');
                window.location.href = 'cart.php';
            </script>
        ";
        exit();
         }

         if (!preg_match("/^[0-9]*$/",$phone))
         {
            echo "
            <script>
                alert('Only numbers allowed');
                window.location.href = 'cart.php';
            </script>
        ";
        exit();
         }


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            echo "
            <script>
                alert('inalid email format');
                window.location.href = 'cart.php';
            </script>
        ";
        exit();
        }
            
        $query = "INSERT INTO `order_manage`( `full_name`, `phone`, `address`, `email`, `pay_mode`) VALUES ('$name','$phone','$address','$email','$pay')";
        if(mysqli_query($conn,$query))
        {
            $order_id = mysqli_insert_id($conn);
            $query2 = "INSERT INTO `user_orders`(`order_id`, `product_name`, `product_price`, `quantity`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($conn,$query2);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"isii",$order_id,$product_name,$product_price,$quantity);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $product_name = $values['product_name'];
                    $product_price = $values['product_price'];
                    $quantity = $values['quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "
                <script>
                    alert('Your order has been placed');
                    window.location.href = 'cart.php';
                </script>
            ";
            }
            else
            {
                echo "
                <script>
                    alert('ERROR 404');
                    window.location.href = 'cart.php';
                </script>
            ";

            }


        }
        else
        {
            echo "
            <script>
                alert('sql error');
                window.location.href = 'cart.php';
            </script>
        ";
        }
    }

}
?>