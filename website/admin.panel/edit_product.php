<!-- to display each product previous info into the boses -->

<?php
if (isset($_GET['editproduct'])) {
    $edit_id = $_GET['editproduct'];
    //prevent SQL injection
    $get_productinfo = "SELECT * FROM `products` WHERE product_id=?";
    $stmt = mysqli_prepare($con, $get_productinfo);
    mysqli_stmt_bind_param($stmt, "i", $edit_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_desc = $row['Product_Description'];
        $product_cat = $row['cat_id'];
        $product_skintype = $row['skin_id'];

        // retrieve category name
        $get_cat = "SELECT cat_name FROM `products cat` WHERE cat_id=?";
        $stmt_cat = mysqli_prepare($con, $get_cat);
        mysqli_stmt_bind_param($stmt_cat, "i", $product_cat);
        mysqli_stmt_execute($stmt_cat);
        $cat_result = mysqli_stmt_get_result($stmt_cat);

        if ($cat_row = mysqli_fetch_assoc($cat_result)) {
            $cat_name = $cat_row['cat_name'];
        }

        //retrieve skin type name
        $get_skin = "SELECT skin_type FROM `skin types` WHERE skin_id=?";
        $stmt_skin = mysqli_prepare($con, $get_skin);
        mysqli_stmt_bind_param($stmt_skin, "i", $product_skintype);
        mysqli_stmt_execute($stmt_skin);
        $skin_result = mysqli_stmt_get_result($stmt_skin);

        if ($skin_row = mysqli_fetch_assoc($skin_result)) {
            $skin_name = $skin_row['skin_type'];
        }
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
            <h1 class="class text-center">edit Products</h1>
             
            <form action="" method="post" enctype="multipart/form-data">
                <div class="class form-outline mb-4">
                    <!-- (for ) and (id) should exacly the same-->
                    <label for="product_name" class="form-label">Product Name</label> 
                    <input type ="text" name="productname" id="product_name" VALUE="<?PHP echo $product_name?>" class="form-control bg-light" required>

                    <label for="product_price" class="form-label">Product Price</label> 
                    <input type ="number" name="productprice" id="product_price" VALUE="<?PHP echo $product_price?>"   class="form-control bg-light" required>

                    <label for="product_description" class="form-label">Product Description</label> 
                    <input type ="text" name="productdescription" id="product_description" VALUE="<?PHP echo $product_desc?>" class="form-control bg-light" required>
  



                    <label for="product_category" class="form-label">Product category</label> 
                    <select name="productscat" id=""  class="form-control btn-outline-info bg-light" required>
                    <option value=""><?php echo $cat_name?></option>
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
                    <select name="skintype" id=""  class="form-control btn-outline-info bg-light">
                    <option value=""><?php echo $skin_name?></option>
                       
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
                    

                    <input type="submit" name="update" class="btn-outline-info text-dark mt-3">



                     


                    
                 </div>

             </form>
         
         </div>

        <!-- submitting the update-->
        <?php

        if (isset($_POST['update'])){
            $product_n=$_POST['productname']; // we should write whate we wrote in the input section in name attribute of each box
            $product_pric=$_POST['productprice'];
            $product_des=$_POST['productdescription'];
            $product_ca=$_POST['productscat'];
            $product_sk=$_POST['skintype'];

            $update_query="update `products` set product_name='$product_n',product_price='$product_pric',
            Product_Description='$product_des',cat_id='$product_ca',skin_id='$product_sk'  where  product_id='$edit_id' ";
            $result_update=mysqli_query($con,$update_query);
            if ($result_update){
                echo "<script>alert('updatedddddd')</script>";
            }
        }
        ?>


    
      </body>




</html>
