<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

<h1 class="class text-center">All skin types</h1>
<table class="table table-bordered mt-5">
   <thead class="class bg-secondary text-light">
       <tr class="text-center">
         <th>skin type_ID</th>
         <th>skin type</th>
        
        </tr>
   
    </thead>
    
    <tbody class="bg-light text-dark">

       
       <?php
       $get_products="Select * from `skin types`";
       $result=mysqli_query($con,$get_products);
       while($row=mysqli_fetch_assoc($result)){
        $skintype_id=$row['skin_id'];
        $skin_name=$row['skin_type'];




        echo "
        <tr class='text-center'>
            <td>$skintype_id</td>
            <td>$skin_name</td>
           
        </tr>
    ";
    

       }
       ?>


     </tbody>

</table>