<?php
if (isset($_POST['login'])) {
    $user_name = isset($_POST['username']) ? $_POST['username'] : '';
    $user_password = isset($_POST['userpassword']) ? $_POST['userpassword'] : '';

    // Validate input
    if (empty($user_name) || empty($user_password)) {
        echo "<script>alert('Please fill in all fields')</script>";
    } else {
        // Establish a database connection
        $con = mysqli_connect('localhost', 'root', '', 'glowy');

        if (!$con) {
            die('Database connection failed: ' . mysqli_connect_error());
        }

        // Check if the user exists
        $check_user = "SELECT * FROM users WHERE user_name = ?";
        $stmt_check = mysqli_prepare($con, $check_user);
        mysqli_stmt_bind_param($stmt_check, 's', $user_name);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);

        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            // User exists, check password
            mysqli_stmt_bind_result($stmt_check, $db_user_id, $db_user_name, $db_user_password);
            mysqli_stmt_fetch($stmt_check);

            if (password_verify($user_password, $db_user_password)) {
                // Password is correct, allow access
                echo "<script>alert('Login successful')</script>";
                 // Redirect to the home page
                 header('Location: index.php');
                 exit; // Make sure to exit to prevent further code execution
            } else {
                // Password is incorrect
                echo "<script>alert('Incorrect password')</script>";
            }
        } else {
            // User does not exist, suggest registration
            echo "<script>alert('User not found. Please sign up.')</script>";
        }

        // Close the statement for checking
        mysqli_stmt_close($stmt_check);

        // Close the database connection
        mysqli_close($con);
    }
}
?>
<!-- Rest of your login form HTML here -->

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="sb-nav-fixed bg-dark">
    <div class="container mt-2">
        <h1 class="text-center text-light">Log In</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <label for="username" class="form-label text-light">User Name</label>
                <input type="text" name="username" id="username" class="form-control bg-light" required>
                <label for="userpassword" class="form-label text-light">User Password</label>
                <div class="input-group">
                    <input type="password" name="userpassword" id="userpassword" class="form-control bg-light" required>
                    <span class="input-group-text">
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">Show</button>
                    </span>
                </div>
                <input type="submit" name="login" class="btn btn-outline-info  mt-3" value="Log In">
                <br>
                <a href="registration.php" class="btn btn-outline-info  mt-3"> you don`t have account?sign-up</a>
            </div>
        </form>
    </div>


    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("userpassword");
            var toggleButton = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                toggleButton.textContent = "Show";
            }
        }
    </script>

</body>
</html>


