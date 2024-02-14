<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST["userid"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Validate inputs
    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Check if username or email already exists
    $sql = "SELECT * FROM user WHERE username='$username' OR email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Username or email already exists.";
        exit();
    }

    // Generate hash of password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO user (user_id, first_name, last_name, username, password, email)
            VALUES ('$userid', '$firstname', '$lastname', '$username', '$hashed_password', '$email')";
 
 if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Account creation successful');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: registration.php ");
    $conn->close();
}
