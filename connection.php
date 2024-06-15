<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}
else{
  // echo "successful";
   
}
$username = $_POST['username'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_BCRYPT);
$sql = "INSERT INTO `login db`.`login db` (username, password,dt) VALUES ('$username', '$password_hash',current_timestamp());";

if (mysqli_query($conn, $sql)) {
  // echo "New user created successfully!";
} else {
  // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
