<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <?php
         include('../includes/connect.php');
         ?>
    </head>
    <title>
        admin panel
      </title>

    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <body class="sb-nav-fixed">

     <!--font awesome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

     





     
        

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">admin panel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <div class="text-end">
          <a href="admin_login.php" class="btn btn-outline-light">Login</a>

          <a href="admin_register.php" class="btn btn-outline-light" style="background-color: purple">Sign-up</a>
          <a href="admin_logout.php" class="btn btn-outline-light">Logout</a>
        </div>
            </ul>
            

            

        </nav>
        <br>
        <?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); // Redirect to login page if not logged in
    exit();
}

// Admin is logged in, display admin panel content
?>
        
      <div class="class row">
        <div class="col-md-2 bg-dark">
            <ul>
                <br>
                <li class="nav-item bg-dark">
                    <a href="admin.php?insertproducts" class="btn btn-outline-info text-light">insert products</a>
                </li>
                <br>
                <li class="nav-item bg-dark">
                    <a href="admin.php?viewproducts" class="btn btn-outline-info text-light">view products</a>
                </li>
                <br>

                <li class="nav-item bg-dark">
                    <a href="admin.php?insertcat" class="btn btn-outline-info text-light">products cat</a>
                </li>
                <br>

                <!--<li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light">insert prodects</a>
                </li>-->
                <li class="nav-item bg-dark">
                    <a href="admin.php?viewcat" class="btn btn-outline-info text-light">view cat.</a>
                </li>
                <br>

                <li class="nav-item bg-dark">
                    <a href="admin.php?insertskintypes" class="btn btn-outline-info text-light">skin types</a>
                </li>
                <br>

                <li class="nav-item bg-dark">
                    <a href="admin.php?viewskin" class="btn btn-outline-info text-light">view skin types</a>
                </li>
                <br>

                <li class="nav-item bg-dark">
                    <a href="admin.php?viewusers" class="btn btn-outline-info text-light">view users</a>
                </li>
                <br>
            
            </ul>
        </div>
            <div class="class col-md-10">
              <?php
              if(isset($_GET['insertcat'])){
               include('product cat.php');
              } 
               ?>
               <?php
              if(isset($_GET['insertskintypes'])){
               include('skintypes.php');
              } 
               ?>

               <?php
              if(isset($_GET['insertproducts'])){
               include('insert_products.php');
              } 
               ?>


              <?php
              if(isset($_GET['viewproducts'])){
               include('view_products.php');
              } 
               ?>

              <?php
              if(isset($_GET['viewusers'])){
               include('view_users.php');
              } 
               ?>


              <?php
              if(isset($_GET['viewskin'])){
               include('view_skintypes.php');
              } 
               ?>

              <?php
              if(isset($_GET['viewcat'])){
               include('view_categories.php');
              } 
               ?>
               
               <?php
              if(isset($_GET['editproduct'])){
               include('edit_product.php');
              } 
               ?>
               
               <?php
              if(isset($_GET['deleteproduct'])){
               include('delete_product.php');
              } 
               ?>



            </div>

            
          

        
       
        
        






     </body>
    

</html>