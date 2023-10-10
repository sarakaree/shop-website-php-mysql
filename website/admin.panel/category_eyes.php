 <!-- bootstrap css-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        
        <title>
            shop
        </title>
        <!-- bootstrap css-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    </head>

    <body>

   


        <!-- bootstrap js-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
     
     <header class="p-3 bg-dark text-white">
     <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li ><a href="index.php" class="nav-link px-2 text-white">Home</a></li>

          

         

          

          <!-- to display cat. in the navbar-->
          <?php
            $con = mysqli_connect('localhost', 'root', '', 'glowy');
            $select_query = "SELECT * FROM `products cat`";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
               $cat_name = $row['cat_name'];
               $cat_id = $row['cat_id'];

               // Create a URL-friendly version of the category name (e.g., convert spaces to underscores)
               $category_slug = strtolower(str_replace(' ', '_', $cat_name));

              

               // Generate the category link with the category parameter
               echo "<li class='nav-item'><a class='nav-link px-2 text-white' href='category_template.php?cat_id=" . urlencode($cat_id) . "&cat_name=" . urlencode($cat_name) . "'>$cat_name</a></li>";



              }
          ?>

          
          <li><a href="#4" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#5" class="nav-link px-2 text-white">About</a></li>
          <li><a href="#5" class="nav-link px-2 text-white">Cart <i class="fa-sharp fa-regular fa-cart-arrow-down" style="color: #ca126b;"></i></a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <a href="user_login.php" class="btn btn-outline-light">Login</a>

          <a href="registration.php" class="btn btn-outline-light" style="background-color: purple">Sign-up</a>
        </div>
      </div>

    
     </div>
     </header>
     

     

     <div class="container">
     <div class="row">
        <!-- display products in the home page -->
        <?php
       $con = mysqli_connect('localhost', 'root', '', 'glowy');

       // Check if a category ID is provided in the URL
       if (isset($_GET['cat_id']) && isset($_GET['cat_name'])) {
        $cat_id = $_GET['cat_id'];
        $cat_name = $_GET['cat_name'];
        
        
    
        echo "<h3 class='text-center mt-3 mb-5'> $cat_name Products</h3>";
         echo"<br>";
       
           // Query products based on the selected category
           $select_query = "SELECT products.*, `skin types`.skin_type
           FROM products
           INNER JOIN `skin types` ON products.skin_id = `skin types`.skin_id WHERE cat_id='$cat_id';";
       
           $result_query = mysqli_query($con, $select_query);
           
       
           while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_desc = $row['Product_Description'];
            $product_image = $row['product_image'];
            $product_status = $row['product_status'];
            $skin_type = $row['skin_type'];
            

            // now we will display the product information the we fetch from db into the card
            echo "
            <div class='col-md-3 mb-2'>
                <div class='card' style='width: 15rem;'>
                    <img src='admin.panel/productimages/$product_image' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name $product_price</h5>
                        <h6 class='card-text'>$skin_type</h6>
                        <p class='card-text'>$product_desc</p>
                        
                        <a href='#' class='btn btn-outline-light' style='background-color: purple;'>add to cart</a>
                        <a href='#' class='btn btn-dark' style='color: white;'>info</a>
                    </div>
                </div>
            </div>";
        }
    }
    
        ?>
    </div>
</div>
