<?php
session_start();
require('config.php');




if(isset($_POST['login']))
{
    $query = "SELECT * FROM `admin_credential` WHERE `username`='$_POST[username_email]' OR `email`='$_POST[username_email]'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            if($_POST['password']==$result_fetch['password'])
            {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['username'];
                echo"
                <script>
                    alert('login successful');
                    window.location.href='update.php';
                </script>        
                "; 
               
            }
            else
            {
                echo"
                <script>
                    alert('You have enter wrong password');
                    window.location.href='login.php';
                </script>        
                "; 
            }
        }
        else
        {
            echo"
            <script>
                alert('You have enter wrong E-mail or Username');
                window.location.href='login.php';
            </script>        
            "; 
        }
    }
    else
    {
        echo"
        <script>
            alert('Cannot run query');
            window.location.href='login.php';
        </script>        
        "; 

    }
   
}


?>