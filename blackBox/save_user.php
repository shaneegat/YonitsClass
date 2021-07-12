<?php 
  include "db.php";
  include "config.php";

?>

<?php
    
 
    $userName = mysqli_real_escape_string($connection, $_GET['userName']);
    $userEmail = mysqli_real_escape_string($connection, $_GET['userEmail']);
    $userPassword = mysqli_real_escape_string($connection, $_GET['userPassword']);
    $userPhone = mysqli_real_escape_string($connection, $_GET['userPhone']);
    $userAddress = mysqli_real_escape_string($connection, $_GET['userAddress']);
    $userDate = mysqli_real_escape_string($connection, $_GET['userDate']);
    $userPhoto = mysqli_real_escape_string($connection, $_GET['userPhoto']);
    $userType = mysqli_real_escape_string($connection, $_GET['userType']);
  

    $state = $_GET['state'];
    $userId = $_GET['userId'];

   

    if($state == "insert") {
        $query = "insert into tbl_users_2101(name,email,password,type,address,date_of_b,mobile) 
        values ('$userName','$userEmail','$userPassword','$userType','$userAddress','$userDate','$userPhone')";
        header('Location: ' . URL . 'login_user.php');
        
       
        
    }

    else if($state == "edit"){
        $query = "update tbl_users_2101 set name='$userName', email='$userEmail', password='$userPassword', 
        type='$userType', address='$userAddress', date_of_b='$userDate', mobile='$userPhoto' where id='$userId'";
        header('Location: ' . URL . 'form_product_list.php');
        
    }

    

?>



 



  
  

