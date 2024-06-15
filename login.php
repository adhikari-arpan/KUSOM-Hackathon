<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $skills = $_POST['skills'];
    $sql = "INSERT INTO `profileinsert`.`profileinsert` ( name, age, gender, email, phone, bio, skills, dt) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$bio','$skills', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true)
    {
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to profile form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>Make your profile </h3>
        <p>Enter your details and submit this  </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Profile setup successfully</p>";
        }
    ?>
        <form action="login.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="bio" id="bio" cols="30" rows="10" placeholder="Add your bio"></textarea>
            <textarea name="skills" id="skill" cols="30" rows="10" placeholder="Add your skills"></textarea>
            <button class="btn">Submit</button> 
            <button class="btn2"><a href="profile.php">Profile</a></button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>