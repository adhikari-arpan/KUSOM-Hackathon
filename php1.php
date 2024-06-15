<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hellophp</title>
</head>
<body>
<img class="bg" src="" alt="cv">
    <div class="container">
        <h1>Please upload your cv</h1>
        <p>Enter your details ,submit and upload cv </p>
        <form  method="POST" enctype="multipart/form-data">
            <label for="resume">Please upload resume:</label>
            <input type="file" name="documents" required><br><br>
            <pre>(accepted formats are:jpg,png)</pre>
            <button class="btn">Submit</button> 
</form>
</div>
    </body>
    </html>
    <?php
$insert = false;
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
    echo "Success connecting to the db";

    // Collect post variables
    if(isset($_POST['submit'])){

    $file_name=$_FILES['documents']['name'];
    $tempname=$_FILES['documents']['temp_name'];
    $folder='cvs/'.$file_name;
    }

    $sql = mysqli_query($con,"INSERT INTO  resume.`resumestore` (file) values('$file_name')");
    if(moved_uploaded_file($tempname,$folder)){
       echo "uploaded successfully";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $result=mysqli_query($con,"SELECT *FROM resume1");
    while($row=mysqli_fetch_assoc($result)){
        echo '<embed src="cvs/' . $row['file'] . '" type="application/pdf" width="600" height="400" />';
    }
    // Close the database connection
    $con->close();
?>
