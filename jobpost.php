<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jobpost</title>
</head>
<body>
<form  method="post">
    <input type="text" name="title" placeholder="Enter title"><br>
    <textarea name="content" placeholder="Enter content"></textarea><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
<!-- inserting data  -->
<?php
$insert = false;
if(isset($_POST['name'])){

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobpost";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$title = $_POST['title'];
$content = $_POST['content'];

// Insert into database
$sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "New post created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
<!-- fetching data base and displaying it -->


<?php
$insert = false;
if(isset($_POST['name'])){
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobpost";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch posts from database
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

// Display posts
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "<p>Posted on: " . $row["created_at"] . "</p>";
    }
} else {
    echo "No posts found";
}

$conn->close();
}
?>
