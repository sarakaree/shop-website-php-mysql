<?php
include('../includes/connect.php');




if(isset($_POST['insertcat'])){
  $cat_title=$_POST['productcats'];
  $insert_query="INSERT INTO  products cat (cat_name) VALUE ('$cat_title');";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "done";
  }

}
?>