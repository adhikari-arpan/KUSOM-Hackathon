<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Validate and sanitize input (optional, but recommended)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Database connection details
    $host = "localhost";
    $db_username = "root"; // Your database username
    $db_password = ""; // Your database password
    $dbname = "authlogin";

    // Create connection
    $conn = new mysqli($host, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash password (for security)
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $sql = "INSERT INTO authlogin (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email,$password );

    // Execute statement
    if ($stmt->execute()) {
        // Redirect to success page
        header("Location: modi_login.php");
        exit();
    } else {
        // Display error if unable to execute SQL
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <div class="signup-form">
            <h2>Create Account</h2>
            <form action="SIgn _up.php" method="post">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="username" required>
                </div>
                <div>
                    <label for="password">Confirmed Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>
        <div class="login-link">
            <p>Already have an account? <a href="mod_login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
