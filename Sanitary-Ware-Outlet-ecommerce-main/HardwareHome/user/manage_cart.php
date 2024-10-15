<?php
session_start();
// session_destroy();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['add_to_cart'])) 
    {
        if (isset($_SESSION['cart'])) 
        {
            $myproduct = array_column($_SESSION['cart'],'product_name');
            if(in_array($_POST['product_name'],$myproduct))
            {
                echo "
                    <script>
                        alert('Already added into cart');
                        window.location.href = 'index.php';
                    </script>
                ";
            }
            else{

                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] =  array('product_name'=>$_POST['product_name'],'product_price'=>$_POST['product_price'],'quantity'=>1);
                    echo "
                        <script>
                            alert('Product Added in cart');
                            window.location.href = 'index.php';
                        </script>
                    ";
            }
        } 
        else 
        {
            $_SESSION['cart'][0] = array('product_name'=>$_POST['product_name'],'product_price'=>$_POST['product_price'],'quantity'=>1);
            echo "
            <script>
                alert('Product Added in cart');
                window.location.href = 'index.php';
            </script>
        ";
        }
    }
    if(isset($_POST['remove']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['product_name'] == $_POST['product_name'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']= array_values($_SESSION['cart']);
                echo "
                <script>
                    alert('Product removed from cart');
                    window.location.href = 'cart.php';
                </script>
            ";
            }
        }
    }
    if(isset($_POST['mod_quantity']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['product_name'] == $_POST['product_name'])
            {
                $_SESSION['cart'][$key]['quantity']=$_POST['mod_quantity'];
                echo "
                <script>
                    window.location.href = 'cart.php';
                </script>
            ";
            }
        }

    }
}

?>