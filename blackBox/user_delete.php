<?php
include "db.php";
include "config.php";

$userId = $_GET['userId']; 

$query 	= "DELETE from tbl_users_2101 WHERE id = '$userId'";
$del = mysqli_query($connection, $query); // delete query

if($del)
{
    mysqli_close($connection); // Close connection
    header("location:login_user.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>