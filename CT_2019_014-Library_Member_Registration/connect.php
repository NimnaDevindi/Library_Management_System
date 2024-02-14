<?php
    $con=new mysqli('localhost','root','','library_test');

    if(!$con){
        die(mysqli_error($con));
    }
?>