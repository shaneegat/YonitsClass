<?php 

  include "db.php";
  include "config.php";


  session_destroy();
  header('Location: ' . URL . 'login_user.php');


?>