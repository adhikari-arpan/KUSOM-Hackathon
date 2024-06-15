<?php
// Include your database connection file
include('sandeshdbconn.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch posts from the database
$sql = "SELECT * FROM jobpost";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Job Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width:100%;
            margin: 20px;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 50px;
            font-size: 36px;
        }
        .job-post {
            margin-bottom: 40px;
            padding: 30px;
            border-bottom: 1px solid #eee;
        }
        .job-post:last-child {
            border-bottom: none;
        }
        .job-post h2 {
            margin-top: 0;
            color: #007BFF;
            font-size: 28px;
        }
        .job-post p {
            color: #555;
            font-size: 18px;
            line-height: 1.8;
        }
        .job-post .date {
            font-size: 1em;
            color: #999;
            text-align: right;
        }
        .browse-button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 20px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            box-shadow: 0 5px #0056b3;
            margin-top: 30px;
            transition: background-color 0.3s ease;
        }
        .browse-button:hover {
            background-color: #0056b3;
        }
        .browse-button:active {
            background-color: #004080;
            box-shadow: 0 2px #003060;
            transform: translateY(2px);
        }
        .browse-button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Job Posts</h1>
        <?php
        // Display posts
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='job-post'>";
                echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
                echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
                echo "<p class='date'>Posted on: " . htmlspecialchars($row["dt"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No posts found</p>";
        }
        $con->close();
        ?>
        <div class="browse-button">
            <a href="jobpost.php">Submit Another Job Post</a>
        </div>
    </div>
</body>
</html>
