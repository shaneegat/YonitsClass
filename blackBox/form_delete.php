<?php
include "db.php";
include "config.php";

$carId = $_GET['carId']; 

$query 	= "DELETE from tbl_cars_210 WHERE car_id = '$carId'";
$del = mysqli_query($connection, $query); // delete query

if($del)
{
    mysqli_close($connection); // Close connection
    header("location:form_product_list.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>