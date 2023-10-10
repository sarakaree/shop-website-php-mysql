
<?php
include('../includes/connect.php');
if(isset($_POST['submit'])){
  $skin_title=$_POST['skin'];
  $insert_query="INSERT INTO  `skin types` (skin_type) VALUE('$skin_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "done";
  }

}

?>



<form action="" method="POST" class="col-md-10">
<div class="input-group mb-3">
  <input type="text" class="form-control" name="skin" placeholder="skin type"  aria-label="skin type" aria-describedby="button-addon2" required>
  
  <input type="submit" class="btn btn-outline-info text-dark" name="submit" value="Submit">
</div> 
</form>

