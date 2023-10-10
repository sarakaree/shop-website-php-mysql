<?php
if (isset($_POST['register'])) {
    $user_name = isset($_POST['username']) ? $_POST['username'] : '';
    $user_password = isset($_POST['userpassword']) ? $_POST['userpassword'] : '';

    // Validate input
    if (empty($user_name) || empty($user_password)) {
        echo "<script>alert('Please fill in all fields')</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        // Establish a database connection
        $con = mysqli_connect('localhost', 'root', '', 'glowy');

        // Check if the user already exists
        $check_user = "SELECT * FROM users WHERE user_name = ?";
        $stmt_check = mysqli_prepare($con, $check_user);
        mysqli_stmt_bind_param($stmt_check, 's', $user_name);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);

        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            echo "<script>alert('User already exists. Please log in.')</script>";
        } else {
            // Use a prepared statement to insert data safely
            $insert_user = "INSERT INTO users (user_name, user_password) VALUES (?, ?)";
            $stmt_insert = mysqli_prepare($con, $insert_user);
            mysqli_stmt_bind_param($stmt_insert, 'ss', $user_name, $hashed_password);

            if (mysqli_stmt_execute($stmt_insert)) {
                echo "<script>alert('User registered successfully. Please log in.')</script>";
                // Redirect to the home page
                header('Location: index.php');
                exit; // Make sure to exit to prevent further code execution
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
            }

            // Close the statement for insertion
            mysqli_stmt_close($stmt_insert);
        }

        // Close the statement for checking
        mysqli_stmt_close($stmt_check);

        // Close the database connection
        mysqli_close($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="sb-nav-fixed bg-dark">
    <div class="container mt-2">
        <h1 class="text-center text-light">SIGN UP</h1>
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
                <input type="submit" name="register" class="btn btn-outline-info mt-3" value="SIGN UP">
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
