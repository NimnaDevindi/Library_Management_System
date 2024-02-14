<?php
    include 'connect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Member Registration</title>

    <link rel="stylesheet" href="style.css">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="card my-5 p-5">
            <div class="card-body">
                <div class="card-header">
                    <h1 class="text-center">Library Member Registration</h1>
                </div>
                <br>
                <button ><a href="addmember.php" class="text-light btn_text">Add New Member</a></button><br><br>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">Member ID</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>

                <tbody>
                    <?php
                        $sql = "SELECT * FROM member";
                        $result = mysqli_query($con, $sql);
                        if($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $member_id = $row['member_id'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $birthday = $row['birthday'];
                                $email = $row['email'];
                                echo '<tr>
                                        <td>'.$member_id.'</td>
                                        <td>'.$first_name.'</td>
                                        <td>'.$last_name.'</td>
                                        <td>'.$birthday.'</td>
                                        <td>'.$email.'</td>
                                        <td>
                                            <button class="btn btn-success" onclick="updatedata()"><a href="update.php? updateid='.$member_id.'"class="text-light btn_text">Update</a></button>
                                            <button class="btn btn-danger" onclick="deletedata()"><a href="delete.php? deleteid='.$member_id.'"class="text-light btn_text">Delete</a></button>
                                        </td>
                                    </tr>';
                            }
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    
     <!--Boostrap Jquery-->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--Boostrap Javascript-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>




    <script>
         function deletedata() {
            alert("Do you want to delete data?");
            // Add logic for deleting data here
        }
        function updatedata() {
            alert("Do you want to update data?");
            // Add logic for updating data here
        }
    </script>
</body>
</html>
