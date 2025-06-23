<?php
// Include the config file for database connection
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form input
    $username = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Check if email and password are provided
    if (!empty($username) && !empty($password)) {
        try {
            // Use prepared statements to avoid SQL injection
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            // Execute the statement and redirect if successful
            $stmt->execute();

            echo "User added successfully";
            header('Location: openai.php');
            exit();
        } catch (Exception $e) {
            // Handle any exceptions
            error_log($e->getMessage());
            echo "Error, try again later.";
        }
    } else {
        echo "Please provide both email and password.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create an Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder">
                <img src="image1_0.jpg" alt="Registration Image" class="img-fluid">
            </div>
            <form method="post" action="index.php">
                <img src="../Blingual/logo.png" style="filter: invert(1); width:330px;">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group">
                    <input class="form-control" type="text" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" required> I agree to the license terms.
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
