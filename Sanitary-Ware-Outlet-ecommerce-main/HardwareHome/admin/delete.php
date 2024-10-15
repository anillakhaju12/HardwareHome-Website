<?php
include("config.php");
$id = $_GET['id'];

$delete_product = $conn->prepare("DELETE FROM `product` WHERE product_id= ?");
$delete_product->execute([$id]);
if($delete_product){
    echo "
        <script>
            alert('Data deleted successfully');
            window.location.href = 'update.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Failed to delete ');
            window.location.href = 'update.php';
        </script>
    ";
    
}

?>
