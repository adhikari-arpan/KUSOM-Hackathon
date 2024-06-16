<?php
$insert=false;
if(isset($_POST['title'])){

    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "jobpost"; // Add your database name

    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Get form data
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert into database
    $sql = "INSERT INTO `jobpost` (title, content) VALUES ('$title', '$content')";

    // Execute the query
    if ($con->query($sql) === true) {
        $insert=true;
    } 
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            background-image:url('image1.avif');
            background-repeat:no-repeat;
            background-size:100%;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="submit"]:active {
            background-color: #3e8e41;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #008CBA;
            border: none;
            border-radius: 5px;
            box-shadow: 0 5px #999;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #007B9A;
        }
        .btn:active {
            background-color: #00688E;
            box-shadow: 0 2px #666;
            transform: translateY(2px);
        }
        .btn a {
            color: white;
            text-decoration: none;
        }
        .success-message {
            max-width: 500px;
            margin: 20px auto;
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            border: 1px solid #d6e9c6;
            border-radius: 5px;
            text-align: center;
        }
        .success-message p {
            margin: 10px 0;
        }
        /* Navigation styles */
.main-nav {
    background-color: #3C3C3C; /* Dark gray for navigation */
    color: #FFFFFF;
    padding: 10px 0;
}

.main-nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
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
form{
    max-width: 530px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 400px;
    padding-top: 90px;
    box-sizing: border-box;
}


</style>
</head>
<body>

<nav class="main-nav">
        <ul>
        <li><a href="home.html" class="nav-link">Home</a></li>
        <li><a href="php2.php" class="nav-link">Upload Resume</a></li>
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
    <form action="jobpost.php" method="POST">
    <h1>Post Your Job:</h1>
        <input type="text" name="title" placeholder="Enter title"><br>
        <textarea name="content" placeholder="Enter content"></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <?php
        if($insert == true){
            echo "<div class='success-message'>";
            echo "<p>New post created successfully!</p>";
            echo "<p>Click here to show your job information in the Browse job section:</p>";
            echo "<button class='btn'><a href='Brousejob.php'>Browsejob</a></button>";
            echo "</div>";
        }
    ?>
</body>
</html>
