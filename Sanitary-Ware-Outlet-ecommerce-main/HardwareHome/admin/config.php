



<?php


// Create connection
$conn =mysqli_connect('localhost','root','','hardwarehome');
if(mysqli_connect_error()){
    echo"
   <script>
        alert('Cannot connect to database');
   </script>        
    ";
    exit();  
}
?>