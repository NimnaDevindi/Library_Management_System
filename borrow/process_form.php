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



// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $borrowID = $conn->real_escape_string($_POST['borrowID']);
    $bookID = $conn->real_escape_string($_POST['bookID']);
    $memberID = $conn->real_escape_string($_POST['memberID']);
    $borrowStatus = $conn->real_escape_string($_POST['borrowStatus']);
    $modifiedDate = $conn->real_escape_string($_POST['modifiedDate']);

    // Insert data into database
    $sql = "INSERT INTO bookborrower (borrow_id, book_id, member_id, borrow_status,borrower_date_modified)
            VALUES ('$borrowID', '$bookID', '$memberID', '$borrowStatus', '$modifiedDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Borrow details added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
