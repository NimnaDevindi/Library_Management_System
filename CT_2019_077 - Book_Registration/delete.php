<?php

include 'connect.php';
if(isset($_GET['deleteid'])){
    $book_id=$_GET['deleteid'];

    $sql = "DELETE FROM book WHERE book_id='$book_id'";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Deleted Successfully";
        header('location:index.php');
    }else{
        die(mysqli_error($con));
    }
}

?>