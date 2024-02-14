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

// Process form submission for updating borrow details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $memberID = $conn->real_escape_string($_POST['memberID']);
    $borrowID = $conn->real_escape_string($_POST['borrowID']);
    $bookID = $conn->real_escape_string($_POST['bookID']);
    $borrowStatus = $conn->real_escape_string($_POST['borrowStatus']);
    $modifiedDate = $conn->real_escape_string($_POST['modifiedDate']);

    // Construct SQL query to update borrow details
    $sql = "UPDATE bookborrower
            SET book_id = '$bookID', borrow_status = '$borrowStatus', borrower_date_modified = '$modifiedDate'
            WHERE member_id = '$memberID'";

    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        echo "Borrow details updated successfully";
    } else {
        echo "Error updating borrow details: " . $conn->error;
    }
}


?>
