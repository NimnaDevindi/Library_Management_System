<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Borrow Details</title>
    <style>
        /* Style for form containers */
        .form-container {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            width: 50%; /* Adjust the width of the form container */
            margin: auto; /* Center the form horizontally */
        }

        /* Style for form headings */
        .form-heading {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
    <center>
    <h2 class="form-heading">Add Borrow Details</h2>
    <form action="process_form.php" method="POST">
        <label for="borrowID">Borrow ID:</label>
        <input type="text" id="borrowID" name="borrowID"  pattern="BR\d{3}" title="Borrow ID should be in the format BRXXX (e.g., BR001)" required><br><br>

        <label for="bookID">Book ID:</label>
        <input type="text" id="bookID" name="bookID"  pattern="B\d{3}" title="Book ID should be in the format BXXX (e.g., B001)" required><br><br>

        <label for="memberID">Member ID:</label>
        <input type="text" id="memberID" name="memberID"  pattern="M\d{3}" title="Member ID should be in the format MXXX (e.g., M001)" required><br><br>

        <label for="borrowStatus">Borrow Status:</label>
        <select id="borrowStatus" name="borrowStatus" required>
            <option value="Borrowed">Borrowed</option>
            <option value="Returned">Returned</option>
            <option value="Overdue">Overdue</option>
        </select><br><br>

        <label for="modifiedDate">Modified Date:</label>
        <input type="date" id="modifiedDate" name="modifiedDate" value="<?php echo date('Y-m-d'); ?>" ><br><br>

        <input type="submit" value="Submit">
    </form>
    </center>
    </div>


    <div class="form-container">
    <center>
    <h2 class="form-heading">Update Borrow Details</h2>
    <form action="update.php" method="POST">

        <label for="memberID">Member ID:</label>
        <input type="text" id="memberID" name="memberID"  pattern="M\d{3}" title="Member ID should be in the format MXXX (e.g., M001)" required><br><br>

        <label for="borrowID">Borrow ID:</label>
        <input type="text" id="borrowID" name="borrowID" pattern="BR\d{3}" title="Borrow ID should be in the format BRXXX (e.g., BR001)" required><br><br>

        <label for="bookID">New Book ID:</label>
        <input type="text" id="bookID" name="bookID"  pattern="B\d{3}" title="Book ID should be in the format BXXX (e.g., B001)" required><br><br>

        <label for="borrowStatus">New Borrow Status:</label>
        <select id="borrowStatus" name="borrowStatus" required>
            <option value="Borrowed">Borrowed</option>
            <option value="Returned">Returned</option>
            <option value="Overdue">Overdue</option>
        </select><br><br>

        <label for="modifiedDate">New Modified Date:</label>
        <input type="date" id="modifiedDate" name="modifiedDate" value="<?php echo date('Y-m-d'); ?>" required><br><br>

        <input type="submit" value="Update Borrow Details">
    </form>
    </center>
    </div>

    <div class="form-container">
        <center><h2 class="form-heading">Delete Borrow Details</h2>
        <form action="delete.php" method="post">
            <label for="borrowID">Borrow ID:</label>
            <input type="text" id="borrowID" name="borrowID" pattern="BR\d{3}" title="Borrow ID should be in the format BRXXX (e.g., BR001)" required><br><br>
            <input type="submit" value="Delete Borrow Book">
        </form>
        </center>
    </div>
    
</body>
</html>
