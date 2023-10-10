<?php
include('../includes/connect.php');

if(isset($_POST['insertcat'])){
    $cat_title = $_POST['productcats'];
    $insert_query = "INSERT INTO `products cat` (cat_name) VALUES ('$cat_title')";
    $result = mysqli_query($con, $insert_query);
    if($result){
        

        // Create a new category page based on the template
        $category_id = mysqli_insert_id($con); // Get the auto-generated category ID
        $category_page_content = file_get_contents('../category_template.php');



        // Replace placeholders in the template with actual content
        $category_page_content = str_replace('{{category_name}}', $cat_title, $category_page_content);

        // Save the content to a new PHP file (e.g., category_electronics.php)
        $category_page_filename = 'category_' . strtolower(str_replace(' ', '_', $cat_title)) . '.php';
        file_put_contents($category_page_filename, $category_page_content);
    }
}
?>


<form action="" method="POST" class="col-md-10">
<div class="input-group mb-3">
  <input type="text" class="form-control" name="productcats" placeholder="prodect cat"  aria-label="prodect cat" aria-describedby="button-addon2" required>
  <input type="submit" class="btn btn-outline-info text-dark" name="insertcat" value="insert">
</div> 
</form>