<?php
// echo '<script>alert("Do you really want to Delete the record !!")</script>';
include "connection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"delete from emp_detail where emp_id = '$id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:dashboard.php"); // redirects to all records page
    exit;	
}
else
{
    echo "$id";
    echo "Error deleting record"; // display error message if not delete
}
?>