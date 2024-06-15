
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
}

.container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

h1 {
    margin-bottom: 20px;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
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
</style>
</head>
<body>
    <div class="container">
        <h1>RESUME</h1>
        <form method="POST" action="php2.php" enctype="multipart/form-data">
            <label for="resume">Please upload resume:</label>
            <input type="file" name="documents" id="documents" accept=".jpg, .png, .pdf" required>
            <pre><i>(Accepted formats: jpg, png, pdf)</i></p>
            <button type="submit" name="submit" class="btn">submit

            </button>
            <br><br>
            <?php
            if($insert==true)
            {
                echo "<P>Resume Uploaded successfully</p>";
                echo "<button class='btn2'><a href='#'>Back to Home</a></button>";
            }
            ?>
        </form>

    </div>
</body>
</html>
