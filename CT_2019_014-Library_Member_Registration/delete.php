<?php

include 'connect.php';
if(isset($_GET['deleteid'])){
    $member_id=$_GET['deleteid'];

    $sql = "DELETE FROM member WHERE member_id='$member_id'";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Deleted Successfully";
        header('location:index.php');
    }else{
        die(mysqli_error($con));
    }
}

?>