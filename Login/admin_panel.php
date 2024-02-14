<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-primary {
            width: 100%;
            margin-bottom: 10px;

        }
    </style>
</head>

<body style="background-color: #e1f5ed;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Library Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../CT_2019_014-Library_Member_Registration/index.php">Member Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../CT-2019-057-category registration/category.php">Book Categorization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../CT_2019_082 - Borrow/borrow_details.php">Book Borrow</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../CT_2019_077 - Book_Registration/index.php">Book Registration</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="col-md-12">
        <h1 class="text-center">Welcome, <?php echo $_SESSION["username"] ?></h1>
    </div>

    <!-- Card -->

    <div class="container mt-5">
        <div class="row">
            <!-- card_01 -->
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="img/member.jpg" class="card-img-top" alt="Image">
                    <div class="card-body text-center">
                        <a href="../CT_2019_014-Library_Member_Registration/index.php" class="btn btn-success btn-block">Go to Member Registration</a>
                    </div>
                </div>
            </div>
            <!-- card_02 -->
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="img/categories.jpg" class="card-img-top" alt="Image">
                    <div class="card-body text-center">
                        <a href="../CT-2019-057-category registration/category.php" class="btn btn-success btn-block">Go to Book Categorization</a>
                    </div>
                </div>
            </div>
            <!-- card_03 -->
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="img/Borrow.jpg" class="card-img-top" alt="Image">
                    <div class="card-body text-center">
                        <a href="../CT_2019_082 - Borrow/borrow_details.php" class="btn btn-success btn-block">Go to Book Borrow</a>
                    </div>
                </div>
            </div>
            <!-- card_04 -->
            <div class="col-md-4">
                <div class="card mb-12">
                    <img src="img/book reg.jpg" class="card-img-top" alt="Image">
                    <div class="card-body text-center">
                        <a href="../CT_2019_077 - Book_Registration/index.php" class="btn btn-success btn-block">Go to Book Registration</a>
                    </div>
                </div>
            </div>
            <!-- card_05
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="img\member.jpg" class="card-img-top" alt="Image">
                    <div class="card-body text-center">
                        <a href="#" class="btn btn-success btn-block">Go to Member Registration</a>
                    </div>
                </div>
            </div>
            card_06
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="img\member.jpg" class="card-img-top" alt="Image">
                    <div class="card-body text-center">
                        <a href="#" class="btn btn-success btn-block">Go to Member Registration</a>
                    </div>
                </div>
            </div> -->

        </div>
    </div>



    </div>
    </div>

</body>

</html>