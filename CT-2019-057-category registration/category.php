<?php
session_start();
require_once("config.php");

// Function to sanitize user inputs
function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to validate Category ID format
function validate_category_id($category_id)
{
    return preg_match('/^C\d{3}$/', $category_id);
}

// CRUD Operations
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        // Add new book category
        $category_id = sanitize_input($_POST['category_id']);
        $category_Name = sanitize_input($_POST['category_Name']);
        $date_modified = date('Y-m-d H:i:s');

        // Validate Category ID format
        if (!validate_category_id($category_id)) {
            $_SESSION['message'] = "Invalid Category ID format. Example: C001";
            $_SESSION['msg_type'] = "danger";
        } else {
            try {
                $con->query("INSERT INTO bookcategory (category_id, category_name, date_modified) VALUES ('$category_id', '$category_Name', '$date_modified')")
                    or die($con->error);

                $_SESSION['message'] = "Book category added successfully!";
                $_SESSION['msg_type'] = "success";
            } catch (mysqli_sql_exception $e) {
                // Handle the MySQLi SQL exception for duplicate entry
                if ($e->getCode() == 1062) { // Error code for duplicate entry
                    $_SESSION['message'] = " Book category with the same ID already exists.";
                    $_SESSION['msg_type'] = "danger";
                } else {
                    throw $e; // Re-throw the exception if it's not a duplicate entry error
                }
            }
        }
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    if (isset($_POST['update'])) {
        // Update book category
        $originalcategory_id = sanitize_input($_POST['originalcategory_id']);
        $category_id = sanitize_input($_POST['category_id']);
        $category_Name = sanitize_input($_POST['category_Name']);
        $date_modified = date('Y-m-d H:i:s');

        // Validate Category ID format
        if (!validate_category_id($category_id)) {
            $_SESSION['message'] = "Invalid Category ID format. Example: C001";
            $_SESSION['msg_type'] = "danger";
        } else {
            $con->query("UPDATE bookcategory SET category_id='$category_id', category_name='$category_Name', date_modified='$date_modified' WHERE category_id='$originalcategory_id'")
                or die($con->error);

            $_SESSION['message'] = "Book category updated successfully!";
            $_SESSION['msg_type'] = "warning";
        }
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}

// Delete book category
if (isset($_GET['delete'])) {
    $category_id = sanitize_input($_GET['delete']);
    $con->query("DELETE FROM bookcategory WHERE category_id='$category_id'") or die($con->error);

    $_SESSION['message'] = "Book category deleted successfully!";
    $_SESSION['msg_type'] = "danger";
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

// Edit book category - Populate form with existing data
if (isset($_GET['edit'])) {
    $editcategory_id = sanitize_input($_GET['edit']);
    $editResult = $con->query("SELECT * FROM bookcategory WHERE category_id='$editcategory_id'") or die($con->error);

    if ($editResult->num_rows == 1) {
        $editData = $editResult->fetch_assoc();
        $editcategory_id = $editData['category_id'];
        $editcategory_Name = $editData['category_Name'];
    } else {
        // Redirect to the main page if category not found
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Book Category Registration</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 20px;
      background-color: #f4f4f4;
    }

    h1, h2 {
        color: #333;
        }

    .card-header{
        background: #45a049;
    }  
    a{
        text-decoration: none !important;
    }
    h1 {
        text-align: center;
        text-decoration: underline
        }

    form {
        display: flex;
        flex-direction: column;
        max-width: 1;
        margin-bottom: 20px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        }

    label {
        margin-bottom: 8px;
        color: #333;
      display: block;
    
    }

    input, select {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        }

    button {
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

    button:hover {
        background-color: #45a049;
        }

    table {
        width: 100%;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        
        }

    th {
        background-color: #4caf50 !important;
        color: #fff;
        }

    td:last-child {
        text-align: center;
        }

    button {
        background-color: #f44336;
        }

    button:hover {
        
        background-color: #d32f2f;
    }
</style>
    
</head>
<?php
    include("config.php");
?>
<body>
    <div class="container">
    

        <h1 class="text-center">Book Category Registration</h1><br>

        <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>" role="alert">
                <?= $_SESSION['message'] ?>
            </div>
            <?php
            // Clear the message after displaying
            unset($_SESSION['message']);
            unset($_SESSION['msg_type']);
            ?>
        <?php endif; ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="mx-auto col-lg-6">
            <div class="form-group">
                <label for="category_id">Category ID:</label>
                <input type="text" class="form-control" id="category_id" name="category_id" value="<?= isset($editcategory_id) ? $editcategory_id : '' ?>" required>
                <small class="error-message">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add']) && !validate_category_id($_POST['category_id'])) echo "Invalid Category ID format. Example: C001"; ?>
                </small>
            </div>
            <div class="form-group">
                <label for="category_Name">Category Name:</label>
                <input type="text" class="form-control" id="category_Name" name="category_Name" value="<?= isset($editcategory_Name) ? $editcategory_Name : '' ?>" required>
            </div>

            <div class="button-container">
                <button  style="background-color: #4caf50" type="submit" class="btn btn-warning" name="<?= isset($editcategory_id) ? 'update' : 'add' ?>">
                    <?= isset($editcategory_id) ? 'Update Category' : 'Add Category' ?>
                </button>
                <?php if (isset($editcategory_id)) : ?>
                    <input type="hidden" name="originalcategory_id" value="<?= $editcategory_id ?>">
                    <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger" style="margin-left: 10px;">Cancel</a>
                <?php endif; ?>
            </div>
        </form>

        <br>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Date Modified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $con->query("SELECT * FROM bookcategory") or die($con->error);

                while ($row = $result->fetch_assoc()) :
                ?>
                    <tr>
                        <td><?= $row['category_id'] ?></td>
                        <td><?= $row['category_Name'] ?></td>
                        <td><?= $row['date_modified'] ?></td>
                        <td>
                            <a  style="background-color: #4caf50;" href="<?= $_SERVER['PHP_SELF'] ?>?edit=<?= $row['category_id'] ?>" class="btn btn-warning btn-sm">Update</a>
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?delete=<?= $row['category_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
