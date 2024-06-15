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
            background-color: #F0F0F0; /* Light background */
    font-family: Arial, sans-serif;
    margin: 0;
    padding-top: 60px;
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
/* Navigation styles */
.main-nav {
    background-color: #3C3C3C; /* Dark gray for navigation */
    color: #FFFFFF;
    padding: 10px 0;
    position: fixed; /* Make the navigation bar fixed */
    top: 0; /* Stick to the top */
    width: 100%; /* Full width */
    z-index: 1000; /* Ensure it stays on top of other elements */
}

.main-nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    padding: 0;
    margin: 0;
}

.main-nav ul li {
    position: relative;
    margin: 0 15px;
}

.nav-link {
    color: #FFFFFF;
    text-decoration: none;
    font-weight: bold;
}

.nav-link:hover {
    text-decoration: underline;
}

/* Dropdown Menu */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #1E1E1E; /* Dark background */
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: #FFFFFF;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #3600B4; /* Vivid violet-blue for hover */
}

.dropdown:hover .dropdown-content {
    display: block;
}
header img {
    display: block;
    margin: 20px auto;
    max-width: 100px; /* Adjust as needed */
}

.profile-container {
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 50px auto;
    max-width: 800px;
    text-align: center;
}

.profile-container h1 {
    color: #333333;
}

.profile-info, .profile-details {
    margin-bottom: 20px;
    text-align: left;
}

.profile-info h2, .profile-details h2 {
    color: #666666;
}

.profile-info p, .profile-details ul {
    color: #444444;
}

.profile-details ul {
    list-style: none;
    padding: 0;
}

.profile-details ul li {
    background-color: #E0E0E0;
    border-radius: 5px;
    display: inline-block;
    margin: 5px;
    padding: 5px 10px;
}

footer {
    background-color: #3C3C3C;
    color: #FFFFFF;
    padding: 10px 0;
    text-align: center;
    position: fixed;
    width: 100%;
    bottom: 0;
}

    </style>
</head>
<body>
<nav class="main-nav">
        <ul>
            <li class="dropdown">
                <a href="#" class="nav-link">Jobs</a>
                <div class="dropdown-content">
                    <a href="Brousejob.php">Browse job</a>
                    <a href="jobpost.php">Post job</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link">Resources</a>
                <div class="dropdown-content">
                    <a href="html.html">HTML</a>
                    <a href="css.html">CSS</a>
                    <a href="javascript.html">JavaScript</a>
                    <a href="python.html">Python</a>
                    <a href="c.html">C-Programming</a>
                    <a href="php.html">PHP</a>
                    <a href="wordpress.html">WordPress</a>
                    <a href="java.html">Java</a>
                    <a href="mongodb.html">MongoDB</a>
                    <a href="Linux.html">Linux</a>
                    <a href="Github.html">Git and GitHub</a>
                    <a href="Android.html">Android Development</a>
                    <a href="Angular.html">Angular</a>
                    <a href="Practice.html">Practice Sites</a>
                </div>
            </li>
            <li><a href="professionals.html" class="nav-link">Hear from the Professionals</a></li>
            <li><a href="Progress.html" class="nav-link">Your Progress</a></li>
        </ul>
    </nav>
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
