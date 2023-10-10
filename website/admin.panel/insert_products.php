<?php
include('../includes/connect.php');
if (isset($_POST['insert'])){
    $product_name=$_POST['productname'];
    $product_price=$_POST['productprice'];
    $product_desc=$_POST['productdescription'];
    $product_cat=$_POST['productscat'];
    $product_skintype=$_POST['skintype'];
    $product_image=$_FILES['productimage']['name'];
    $tmp_image=$_FILES['productimage']['tmp_name']; //to access the tmp name of the 
    $product_quantity=$_POST['productquantity'];
    $product_status='true';
    
    

        move_uploaded_file($tmp_image,"./productimages/$product_image");
        $insert_products="INSERT INTO products (product_name,product_price,Product_Description,cat_id,skin_id,product_image,quantity,product_status)
        VALUES ('$product_name',  '$product_price', '$product_desc', '$product_cat', '$product_skintype', '$product_image','$product_quantity','$product_status') ";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('yeahhhhhhhhhh')</script>";
        }
    

    
}
?>


<html>
    <head>
        <!--bootstrap css-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <body class="sb-nav-fixed"> 
        <link rel="stylesheet" href="style.css">
   </head>

    <body>
        <div class="class container mt-2">
            <h1 class="class text-center">Insert Products</h1>
             
            <form action="" method="post" enctype="multipart/form-data">
                <div class="class form-outline mb-4">
                    <!-- (for ) and (id) should exacly the same-->
                    <label for="product_name" class="form-label">Product Name</label> 
                    <input type ="text" name="productname" id="product_name" class="form-control bg-light" required>

                    <label for="product_price" class="form-label">Product Price</label> 
                    <input type ="number" name="productprice" id="product_price" class="form-control bg-light" required>

                    <label for="product_description" class="form-label">Product Description</label> 
                    <input type ="text" name="productdescription" id="product_description" class="form-control bg-light" required >
  



                    <label for="product_category" class="form-label">Product category</label> 
                    <select name="productscat" id="" class="form-control btn-outline-info bg-light" required>
                        <?php
                        $select_query="Select * from `products cat`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $cat_name=$row['cat_name'];
                            $cat_id=$row['cat_id'];
                            echo"<option value='$cat_id'>$cat_name</option>";
                        }
                        ?>  
                    </select>



                    <label for="product_skintype" class="form-label">Skin type</label> 
                    <select name="skintype" id="" class="form-control btn-outline-info bg-light">
                       
                        <?php
                        $select_query="Select * from `skin types`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $skin_name=$row['skin_type'];
                            $skin_id=$row['skin_id'];
                            echo"<option value='$skin_id'>$skin_name</option>";
                        }
                        ?>  
                    </select>
            




                    <label for="product_image" class="form-label">Product Image</label> 
                    <input type ="file" name="productimage" id="product_image" class="form-control btn-outline-info bg-light" required>

                    <label for="product_price" class="form-label">Product Quantity</label> 
                    <input type ="number" name="productquantity" id="product_quantity" class="form-control bg-light" required>
                    

                    <input type="submit" name="insert" class="btn-outline-info text-dark mt-3">



                     


                    
                 </div>

             </form>
         
         </div>

    
      </body>




</html>
