<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection details
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "authlogin";

    // Establish PDO connection
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
        // Set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully"; // Uncomment for testing
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM authlogin WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Verify password
        if ($password == $row['password']){
            // Login success
            header("Location: homeloggedin.html");
            exit();
        } else {
            // Login failed - redirect to invalid login page
            header("Location: modi_invalid.html");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="loginfirst.css">
</head>
<body>
  <div id="form-container">
    <h1>Login</h1>
    <form name="form"  onsubmit="return isvalid()" method="post">
      <label>Email:</label>
      <input type="text" id="user" name="username"><br><br>
      <label>Password:</label>
      <input type="password" id="pass" name="password"><br><br>
      <input type="submit" id="btn" value="Login" name="submit">
    </form>
  </div>
  <!-- <script>
    function isvalid() {
      // Improved validation logic
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      // ... (validation code)
      return true;
    }
  </script> -->
</body>
</html>
