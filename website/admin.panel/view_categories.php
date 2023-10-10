<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

<h1 class="class text-center">All products categories</h1>
<table class="table table-bordered mt-5">
   <thead class="class bg-secondary text-light">
       <tr class="text-center">
         <th>category_ID</th>
         <th>category</th>
        
        </tr>
   
    </thead>
    
    <tbody class="bg-light text-dark">

       
       <?php
       $get_products="Select * from `products cat`";
       $result=mysqli_query($con,$get_products);
       while($row=mysqli_fetch_assoc($result)){
        $cat_id=$row['cat_id'];
        $cat_name=$row['cat_name'];




        echo "
        <tr class='text-center'>
            <td>$cat_id</td>
            <td>$cat_name</td>
            
        </tr>
    ";
    

       }
       ?>


     </tbody>

</table>