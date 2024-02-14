<?php

include 'connect.php';
$member_id=$_GET['updateid'];
$sql ="SELECT * FROM member WHERE member_id='$member_id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$old_member_id=$row['member_id'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$birthday=$row['birthday'];
$email=$row['email'];

if(isset($_POST['submit'])){
    $new_member_id = $_POST['new_member_id']; // Get the new member ID
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];

    // Check if the new member ID is already exists
    if ($new_member_id !== $old_member_id) {
        $check_sql = "SELECT COUNT(*) AS count FROM member WHERE member_id='$new_member_id'";
        $check_result = mysqli_query($con, $check_sql);
        $check_row = mysqli_fetch_assoc($check_result);
        if ($check_row['count'] > 0) {
            echo "Member ID already exists!";
            exit(); // Stop execution
        }
    }

    $sql = "UPDATE member SET member_id='$new_member_id', first_name='$first_name',last_name='$last_name',birthday='$birthday', email='$email' where member_id='$old_member_id'";
    
    $result=mysqli_query($con,$sql);

    if ($result){
        header('location:index.php');
        //echo "Updated successfully";
    }else{
        die(mysqli_error($con));
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Member Registration</title>
</head>
<body>
<div class="container my-5">
    <div class="card  my-5 p-5"  style="margin: 80px;">
        <div class="card-body">
            <div class="card-header mb-5 pt-3">
                <h2 class="text-center">Update Member Details</h2>
            </div>
            <form method="post" onsubmit="return validateForm()" >
                
                <div class="form-group">
                    <label for="new_member_id">Member ID</label>
                    <input type="text" class="form-control mt-2" id="new_member_id" name="new_member_id" placeholder="Enter member ID" autocomplete="off"
                           value="<?php echo $old_member_id; ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="first_name"> first_name</label>
                    <input type="first_name" class="form-control mt-2" id="first_name" name="first_name" placeholder="Enter first_name" autocomplete="off"
                           value="<?php echo $first_name; ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="last_name"> last_name</label>
                    <input type="last_name" class="form-control mt-2" id="last_name" name="last_name" placeholder="Enter last_name" autocomplete="off"
                           value="<?php echo $last_name; ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="birthday"> Birthday</label>
                    <input type="birthday" class="form-control mt-2" id="birthday" name="birthday" placeholder="Enter birthday" autocomplete="off"
                           value="<?php echo $birthday; ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-2" id="email" name="email" placeholder="Enter email" autocomplete="off"
                           value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-4 me-2 btn_text" name="submit" id="submit" >Update</button>
                    <button type="button" class="btn btn-warning mt-4 btn_text" style="background-color:#d32f2f" onclick="closeForm()">Close</button>
                </div>
            </form>
        </div>
    </div>

</div>

<!--Boostrap Jquery-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!--Boostrap Javascript-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script>
    function validateForm() {
        // Get input values
        var newMemberId = document.getElementById("new_member_id").value;
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var birthday = document.getElementById("birthday").value;
        var email = document.getElementById("email").value;

        // Check if any field is empty
        if (newMemberId === "" || first_name === "" || last_name === "" || birthday === "" || email === "") {
            alert("Please fill in all fields");
            return false;
        }

        return true;
    }
    function closeForm() {
        alert("Form closed!");
        window.location.href ='index.php';
    }
</script>

</body>
</html>
