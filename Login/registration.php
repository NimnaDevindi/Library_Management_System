<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var userid = document.getElementById("userid").value;
            var password = document.getElementById("password").value;

            // Validate password length
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            // Validate user ID format
            var userIdPattern = /^U\d{3}$/; // Regular expression for 'U' followed by 3 digits
            if (!userIdPattern.test(userid)) {
                alert("User ID should be in the format 'U001'.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body style="background-color: #e1f5ed;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>User Registration</h2>
                <form action="register.php" method="POST" onsubmit="return validateForm()">
                    <span>
                        <p id="registrationSuccess"></p>
                    </span>
                    <div class="form-group">
                        <label for="userid">User ID</label>
                        <input type="text" class="form-control" id="userid" name="userid" required>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-success">Register</button>
                    <p>
                        Have an account?<a href="../index.php">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>