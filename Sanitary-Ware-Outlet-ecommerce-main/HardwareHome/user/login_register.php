<?php


require('config.php');
session_start();

if(isset($_POST['register']))
{
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name']))
    {
       echo "
       <script>
           alert('Only letters and white space allowed');
           window.location.href = 'register.php';
       </script>
   ";
   exit();
    }


    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
        echo "
        <script>
            alert('Inalid e-mail format');
            window.location.href = 'register.php';
        </script>
    ";
    exit();
    }


    if($_POST['password'] == $_POST['cpassword'])
    {
        
   
        $user_exist_query = "SELECT * FROM `credential` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
        $result = mysqli_query($conn,$user_exist_query);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['username']==$_POST['username'])
                {
                    echo"
                    <script>
                        alert('$result_fetch[username]-Username exists.');
                        window.location.href='index.php';
                    </script>        
                    "; 
                }
                else
                {
                    echo"
                    <script>
                        alert('$result_fetch[email]-email exists.');
                        window.location.href='register.php';
                    </script>        
                    "; 
                }
            }
            else
            {   
                $query = "INSERT INTO `credential`(`name`, `username`, `email`, `password`) VALUES ('$_POST[name]','$_POST[username]','$_POST[email]','$_POST[password]')";
                if(mysqli_query($conn,$query))
                {
                        echo"
                        <script>
                            alert('Registration Successfull');
                            window.location.href='index.php';
                        </script>        
                        "; 
                }
                else
                {
                        echo"
                        <script>
                            alert('Please try again');
                            window.location.href='register.php';
                        </script>        
                        "; 
                }
            }
        }
        else
        {
            echo"
            <script>
                alert('Cannot run query');
                window.location.href='register.php';
            </script>        
            ";
        }
    }
    else
    {
        echo"
        <script>
            alert('Your password doesnot match');
            window.location.href='register.php';
        </script>        
        "; 
    }
}


if(isset($_POST['login']))
{
    $query = "SELECT * FROM `credential` WHERE `username`='$_POST[username_email]' OR `email`='$_POST[username_email]'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            if($_POST['password']==$result_fetch['password'])
            {
                $_SESSION['logged_in'] = true;
                $_SESSION['name'] = $result_fetch['name'];
                header("location:index.php");
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


