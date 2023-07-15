<?php
    include 'connection.php';

    // Checks if form is submitted. Only run this code if form is submitted.
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Binary keyword to check case sensitivity
        $query = "SELECT * FROM login_account WHERE BINARY user_name = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        // Checks if an account exists in the database.
        if (mysqli_num_rows($result) == 1) {

            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php'); // Redirects user to home page if successfully logged in.
        } else {
            $error = "Invalid username or password.";
        }
    }
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <title>Log-in</title>
        <link rel = "stylesheet" href = "css/login.css"> 
        <script src = "https://kit.fontawesome.com/41ae3c1b81.js" crossorigin = "anonymous"></script>
    </head>
    <body>
        <!-- Login form -->
        <div class = "container">
            <form action = "login.php" method = "POST" style = "height: 460px;">

                <h3>Login Here</h3>
                <label for = "username">Username</label>
                <input type = "text" placeholder = "Username" id = "username" name = "username" required>

                <label for = "password">Password</label>
                <input type = "password" placeholder = "Password" id = "password" name = "password" required>

                <button>Log In</button>

                <!-- Display error message if login credentials are invalid -->
                <?php if (isset($error)): ?>
                    <p style = "color: #ffb3b3;" class = "error"><?php echo $error; ?></p>
                <?php endif; ?>
            </form>
    </body>
</html>