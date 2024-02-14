<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $mysqli = new mysqli("localhost", "root", "", "library_test");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare a SQL statement to retrieve the user's information
    $stmt = $mysqli->prepare("SELECT user_id, username, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Fetch the row
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables and redirect to admin_panel.php
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            header("Location: admin_panel.php");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid username or password.";
        }
    } else {
        // Username not found
        echo "Invalid username or password.";
    }

    // Close the statement and database connection
    $stmt->close();
    $mysqli->close();
}
