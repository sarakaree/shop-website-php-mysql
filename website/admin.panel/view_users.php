<h1 class="class text-center">All users</h1>
<table class="table table-bordered mt-5">
   <thead class="class bg-secondary text-light">
       <tr class="text-center" >
         <th>user ID</th>
         <th>user name</th>
         <th>user password</th>
        </tr>
   
    </thead>
    
    <tbody class="bg-light text-dark">

       
       <?php
       $get_products="Select * from `users`";
       $result=mysqli_query($con,$get_products);
       while($row=mysqli_fetch_assoc($result)){
        $user_id=$row['user_id'];
        $user_name=$row['user_name'];
        $user_password=$row['user_password'];
       
        




        echo "
        <tr class='text-center'>
            <td>$user_id</td>
            <td>$user_name</td>
            <td>$user_password</td>
   
        </tr>
    ";
    

       }
       ?>







    

     </tbody>

</table>