<?php
// Include your database connection file
$servername = "localhost";
$username = "root";
$password = "";
$database = "profileinsert"; // Make sure to include this

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch posts from the database
$sql = "SELECT * FROM profileinsert";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jobxa - User Profile</title>
 <link rel="stylesheet" href="profile.css">
 <style>
  body{
    background-image:('sandesh.png');
    background-repeat:no-repeat;
    background-size:100%;
  }
   .profile-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
    display: inline-block;
    background-color: rebeccapurple;
    width: 700px;
    align-content:center;
}
</style>
</head>

<body>
  <header>
    <img src="logo.png" alt="Job xa Logo"> <nav>
      <ul>
      <nav class="main-nav">
        <ul>
            <li class="dropdown">
                <a href="#" class="nav-link">Jobs</a>
                <div class="dropdown-content">
                    <a href="jobstop.html">Top Jobs</a>
                    <a href="jobshighpaying.html">High Paying Jobs</a>
                    <a href="jobsskillmatching.html">Skill Matching Jobs</a>
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
        <li><a href="#">My Profile</a></li>
        
        <li><a href="#">Logout</a></li>
      </ul>
    </nav>
  </header>
</main>
  <div class="profile-container">
        <h1>Your profile</h1>
        <?php
                  // Display profiles
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<section class='profile-info'>";
                          echo "<h2>Your Profile</h2>";
                          echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
                          echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
                          echo "<p><strong>Phone:</strong> " . $row["phone"] . "</p>";
                          echo "</section>";
          
                          echo "<section class='profile-details'>";
                          echo "<h2>Your Skills & Experience</h2>";
                          echo "<ul>";
                          // Assuming skills are comma-separated in the database
                          $skills = explode(",", $row["skills"]);
                          foreach ($skills as $skill) {
                              echo "<li>" . trim($skill) . "</li>";
                          }
                          echo "</ul>";
          
                          // You can add other sections such as educational background and work experience here
                          echo "</section>";
                      }
                  } else {
                      echo "<p>No profiles found</p>";
                  }
                  $con->close();
                  ?>
              </div>

  <footer>
    <p>&copy; Jobxa 2024</p>
  </footer>
</body>

</html>
