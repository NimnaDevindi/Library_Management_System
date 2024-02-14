<?php
    include 'connect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Registration</title>

    <link rel="stylesheet" href="style.css">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class=" my-5 p-5">
           
                <div class="card-header">
                    <h1 class="text-center ">Book Registration</h1>
                    
                </div>
                <br>
                
                <button ><a href="addbook.php" class="text-light btn_text "> Add New Book</a></button>
                    <br>
                    <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Book ID</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Book Category</th>
                        <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            $sql = "SELECT * from book ";
                            $result=mysqli_query($con,$sql);
                            if($result){
                                while($row =mysqli_fetch_assoc($result)){
                                    $book_id=$row['book_id'];
                                    $book_name=$row['book_name'];
                                    $category_id=$row['category_id'];
                                    echo '<tr>
                                    <th scope="row">'.$book_id.'</th>
                                    <td>'.$book_name.'</td>
                                    <td>'.$category_id.'</td>
                                    
                                    <td>
                                        <button class="btn btn-success" onclick="updatedata()"><a href="update.php? updateid='.$book_id.'"class="text-light btn_text">Update</a></button>
                                        <button class="btn btn-danger" onclick="deletedata()"><a href="delete.php? deleteid='.$book_id.'"class="text-light btn_text">Delete</a></button>
                                    </td>
                                    </tr>';
                                }
                            }
                        ?>
                                    
                    </tbody>
                </table>
           
        </div>
    </div>
    
     <!--Boostrap Jquery-->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--Boostrap Javascript-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>




    <script>
         function deletedata() {
            
            alert("Are You Sure Delete Data?");
            window.location.href ='index.php';
        }
        function updatedata() {
            
            alert("Are You Sure Update Data?");
            window.location.href ='update.php';
        }
    </script>
</body>
</html>