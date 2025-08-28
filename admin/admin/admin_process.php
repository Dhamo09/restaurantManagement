<?php
include_once('include/config.php');
session_start();
if (isset($_SESSION["email"])) 
{
    if(isset($_POST['editsubmit']))
    {
        $user_id=$_POST['user_id'];
        $name=$_POST['editname'];
        $email=$_POST['editemail'];
        $password=$_POST['editpassword'];
        
        $upquery="UPDATE admin SET name='".$name."',email='".$email."',password='".$password."' WHERE id='".$user_id."' ";
       
        $query=mysqli_query($conn,$upquery);
        header('location:admin.php');
        exit(0);
    }
    else
    {
        echo "Not Data Found";
    }
}
else
{
    header('location:index.php');
}
?>