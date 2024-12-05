<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validator</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="c.css">
</head>
<body>
    <div class="container">
        <h2 id="h2">Sign In Form</h2>

        <div class="password-body">
        <form action="#" method="post">

            <div class="username-div">
                <input type="text" name="username" id="username" placeholder="Username">
            </div>

            <div class="email-div">
            <input type="email" placeholder="Example123@gmail.com" name="email" id="email">
            </div>

            <div class="password-input">
                <input type="password" name="validatorText" id="validatorText">
                <img src="images/hide.png" id="showHide">
            </div>

            <div class="btns-div">
                <input type="submit" name="submit" value="Sign In" id="submit"></div>
        </form>
            </div>

            <div class="password-check">
                <div class="check-length">
                    <img src="images/close.png"> At least 8 Character Long</div>
                <div class="check-uppercase">
                    <img src="images/close.png"> At least 1 Uppercase Letter (A-Z)</div>
                <div class="check-lowercase">
                    <img src="images/close.png"> At least 1 Lowercase Letter (a-z)</div>
                <div class="check-number">
                    <img src="images/close.png"> At least 1 Number (0-9)</div>
                <div class="check-special">
                    <img src="images/close.png"> At least 1 Special Character (@-$)</div>
            </div>
        </div>
    </div>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "javascript";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['validatorText'];

if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)){

    // Insert data into database
    $sql = "INSERT INTO js (name, Email, password) VALUES ('$name', '$email', '$pass')";
    $result = $conn->query($sql);

    if ($result) {
        echo '<script>alert("Data Recorded")</script>';
    } 
    elseif(!$result) {
        echo '<script>alert("Data Not Recorded")</script>';
    }
}
    else{
        echo '<script>alert("Password does not meet the requirements")</script>';
    }
}
// Close connection
$conn->close();
?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="j.js"></script>
</html>