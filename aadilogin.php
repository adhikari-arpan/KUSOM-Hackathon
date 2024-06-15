<?php
include("connection.php"); // Include connection details

// Get form data
$username = $_POST["email"];
$password = $_POST["Password"];

// **Secure password hashing (replace with your actual hashing logic)**
$password_hash = password_hash($password, PASSWORD_BCRYPT);

// SQL query to insert data (replace with your actual logic)
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";

if (mysqli_query($conn, $sql)) {
  echo "New user created successfully!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Business Login</title>
  <link rel="stylesheet" href="loginfirst.css">
</head>
<body>
  <div id="form-container">
    <h1>Business Login</h1>
    <form name="form" action="login.php" onsubmit="return isvalid()" method="post">
      <label>Email:</label>
      <input type="text" id="user" name="email"><br><br>
      <label>Password:</label>
      <input type="password" id="pass" name="Password"><br><br>
      <input type="submit" id="btn" value="Login" name="submit">
    </form>
  </div>
  <script>
    function isvalid(){
      // Your form validation logic here
      // - Check if username and password fields are empty
      // - You can add more validations like email format check
      return true; // Replace with your actual validation logic
    }
  </script>
</body>
</html>
