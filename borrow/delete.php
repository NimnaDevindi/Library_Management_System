<?php

            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "library_system";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
            }
// Process form submission for deleting borrow details
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user input for security
                    $borrowID = $conn->real_escape_string($_POST['borrowID']);

    // Construct SQL query to delete borrow details
                    $sql = "DELETE FROM bookborrower WHERE borrow_id = '$borrowID'";
            }
    // Execute the delete query
            if ($conn->query($sql) === TRUE) {
                    echo "Borrow details deleted successfully";
            } else {
                echo "Error deleting borrow details: " . $conn->error;
            }



?>
