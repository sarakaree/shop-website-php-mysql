<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

<h1 class="class text-center">All products</h1>
<table class="table table-bordered mt-5">
   <thead class="class bg-secondary text-light">
       <tr >
         <th>product ID</th>
         <th>product name</th>
         <th>product price</th>
         <th>Product_Description</th>
         <th>category_ID</th>
         <th>skin_ID</th>
         <th>product image</th>
         <th>quantity</th>
         <th>status</th>
         <th>orders</th>
         <th>Edit</th>
         <th>Delete</th>
        </tr>
   
    </thead>
    
    <tbody class="bg-light text-dark">

       
    <?php
$get_products = "Select * from `products`";
$result = mysqli_query($con, $get_products);
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $product_name = $row['product_name'];
    $product_price = $row['product_price'];
    $product_desc = $row['Product_Description'];
    $cat_id = $row['cat_id'];
    $skin_id = $row['skin_id'];
    $product_image = $row['product_image'];
    $product_quantity=$row['quantity'];
    $product_stauts = $row['product_status'];

    // To count the number of orders for each product (how many orders this product was in)
    $get_orders = "select * from `orders` where product_id=$product_id";
    $result_orders = mysqli_query($con, $get_orders);
    $row_orders = mysqli_fetch_assoc($result_orders);

    ?>

    
    <tr class='text-center'>
    <td><?php echo $product_id; ?></td>
    <td><?php echo $product_name; ?></td>
    <td><?php echo $product_price; ?></td>
    <td><?php echo $product_desc; ?></td>
    <td><?php echo $cat_id; ?></td>
    <td><?php echo $skin_id; ?></td>
    <td><img src='./productimages/<?php echo $product_image; ?>' class='image' width='100' height='100'></td>
    <td><?php echo $product_quantity ?></td>
    <td><?php echo $product_stauts; ?></td>
    <td><?php echo $row_orders; ?></td>
    <td><a href='admin.php?editproduct=<?php echo  $product_id?>' class='text-dark'><i class='fas fa-edit'></i></a></td>
    <td><a href='admin.php?deleteproduct=<?php echo  $product_id?>' class='text-dark'><i class='fa-solid fa-square-minus'></i></a></td>
    </tr>

    
<?php
}
?>








       <!-- <tr class="text-center" >
            <td>hiiiiii</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="" class="text-dark"><i class="fas fa-edit"></i></a></td>
            <td><a href="" class="text-dark"><i class="fa-solid fa-square-minus"></i></i></a></td>

         </tr> -->

     </tbody>

</table>