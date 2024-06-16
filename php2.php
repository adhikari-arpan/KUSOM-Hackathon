
<?php
// Set connection variables
$insert=false;
$server = "localhost";
$username = "root";
$password = "";
$database = "resume"; // Ensure this is your database name

// Create a database connection
$con = mysqli_connect($server, $username, $password, $database);

// Check for connection success
if (!$con) {
    die("connection to this database failed due to " . mysqli_connect_error());
}
// echo "Success connecting to the db<br>";

// Collect post variables
if (isset($_POST['submit'])) {
    $file_name = $_FILES['documents']['name'];
    $tempname = $_FILES['documents']['tmp_name'];
    $folder = 'cvs/' . $file_name;

    // Insert file name into database
    $sql = "INSERT INTO resumestore (resume) VALUES ('$file_name')";
    
    if (mysqli_query($con, $sql)) {
        if (move_uploaded_file($tempname, $folder)) {
            // echo "<p style=color:red>Uploaded successfully</p>";
            $insert=true;
        } else {
            echo "Failed to upload file";
        }
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
}
// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CV</title>
  <style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 0;
    background-image:url('image3.webp');
    background-repeat:no-repeat;
    background-size:100%;
}

.container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
    color:black;
    
}

h1 {
    margin-bottom: 20px;
    color:black;

}

form {
    display: flex;
    flex-direction: column;
    
}

label {
    margin-bottom: 10px;
    font-weight: bold;
    color: black;
}

input[type="file"] {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="file"]::file-selector-button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
}

input[type="file"]::file-selector-button:hover {
    background-color: #0056b3;
}
button.btn {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    height: 39px;
    width: 112px;
    margin: 0 auto; /* Center the button horizontally */
}

button.btn:hover {
    background-color: #218838;
}
button.btn a{
    text-decoration:none;
    color:white;
}
button.btn2 {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    height: 39px;
    width: 112px;
    align:center;
}

button.btn2:hover {
    background-color: #218838;
}
button.btn2 a{
    text-decoration:none;
    color:white;
}
/* Navigation styles */
.main-nav {
    background-color: #3C3C3C; /* Dark gray for navigation */
    color: #FFFFFF;
    padding: 10px 0;
    position: fixed; /* Make the navigation bar fixed */
    top: 0; /* Stick to the top */
    width: 100%; /* Full width */
    z-index: 1000;
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
    <div class="container">
        <h1>RESUME</h1>
        <form method="POST" action="php2.php" enctype="multipart/form-data">
            <label for="resume">Please upload resume:</label>
            <input type="file" name="documents" id="documents" accept=".jpg, .png, .pdf" required>
            <pre><i>(Accepted formats: jpg, png, pdf)</i></p>
            <button type="submit" name="submit" class="btn">Submit

            </button>
            <br><br>
            <?php
            if($insert==true)
            {
                echo "<P>Resume Uploaded successfully</p>";
                echo "<button class='btn2'><a href='home.html'>Back to Home</a></button>";
            }
            ?>
        </form>

    </div>
</body>
</html>
