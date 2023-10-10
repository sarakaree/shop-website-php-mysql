<?php

if (isset($_GET['deleteproduct'])){
    $delete_id=$_GET['deleteproduct'];

    $delete_query="delete from `products` where product_id=$delete_id";
    $delete_result=mysqli_query($con, $delete_query);
    if($delete_result){
        echo "<script>alert('deletedddd')</script>";
    }
}
?>