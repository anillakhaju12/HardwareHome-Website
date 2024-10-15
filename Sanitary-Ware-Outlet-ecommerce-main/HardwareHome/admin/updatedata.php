<?php
include("config.php");

// for upload data 


if (isset($_POST['Upload'])) {

   $Product_Name = $_POST['product_name'];
   $Product_Price = $_POST['product_price'];
   $Product_Image = $_FILES['product_image'];
   $Image_Location = $_FILES['product_image']['tmp_name'];
   $Image_Name = $_FILES['product_image']['name'];
   $Image_Destination = "image/" . $Image_Name;
   move_uploaded_file($Image_Location, "image/" . $Image_Name);
   
   
   //insert product in the admin product list
   mysqli_query($conn, "INSERT INTO `product`(`product_name`, `product_image`, `product_price`) VALUES ('$Product_Name','$Image_Destination','$Product_Price')");
   header("location:update.php");
}






// for update data 


if (isset($_POST['Update']))
 {
      $id = $_POST['product_id'];
      $name = $_POST['product_name'];
      $price = $_POST['product_price'];



      $update_product = $conn->prepare("UPDATE `product` SET product_name = ?, product_price = ? WHERE product_id = ?");
      $update_product->execute([$name, $price, $id]);



      $old_image = $_POST['product_image_old'];
      $image = $_FILES['product_image']['name'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $image_size = $_FILES['product_image']['size'];
      $image_tmp_name = $_FILES['product_image']['tmp_name'];
      $image_folder = "image/".$image;

      if(!empty($image)){
         $update_image = $conn->prepare("UPDATE `product` SET product_image = ? WHERE product_id = ?");
         $update_image->execute([$image_folder, $id]);
         move_uploaded_file($image_tmp_name, $image_folder);
         unlink($old_image);
         echo "
            <script>
               alert('Uploaded successfully');
               window.location.href = 'update.php';
            </script>
         ";
         
      }else{
            echo "
               <script>
                  alert('Uploaded successfully');
                  window.location.href = 'update.php';
               </script>
            ";             
         }
   }


?>












