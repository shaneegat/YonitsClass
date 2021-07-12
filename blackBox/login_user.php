<?php 

  include "db.php";
  include "config.php";


  session_start();

  if(!empty($_POST["loginMail"])) {
    $query = "SELECT * FROM tbl_users_2101 WHERE email='"
    . $_POST["loginMail"]
    ."' and password = '"
    . $_POST["loginPass"]
    ."' and type = '"
    . $_POST["loginType"]
    ."'";
    

    $result = mysqli_query($connection , $query);
    $row = mysqli_fetch_array($result);

    if(is_array($row)) {

      $_SESSION["user_id"] = $row['id'];
      header('Location: ' . URL . 'form_product_list.php');} 

    else {
      $message = "Invalid username or password!";
    }

  }

?>





<!DOCTYPE html>
<html>
  <head>
    
    
    <meta charset="utf-8"/>
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel = "stylesheet" href = "css/style_login.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&family=Montserrat:wght@500&display=swap" rel="stylesheet">
  </head>

  
  <body>
    <header>
      <a href="#" id="logo"></a>
    </header>


    <div class="wrapper">
      <section class="topic">
        <div class="line"></div>
        <h4>Log in</h4>
        <div class="line"></div>
      </section>

      <form action="#" method="post" class="loginSection">
        
        <section class="loginForm">
          <label for="loginMail">
            <input type="email" name="loginMail" placeholder="Email"/>
          </label>
          <label for="loginPass">
            <input type="password" name="loginPass" placeholder="Password"/>
          </label>
          
        <section class="checkbox">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="loginType" id="inlineRadio1" value="Driver">
            <label class="form-check-label" for="loginType">Driver</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="loginType" id="inlineRadio2" value="Polise">
            <label class="form-check-label" for="loginType">Polise</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="loginType" id="inlineRadio3" value="Agent">
            <label class="form-check-label" for="loginType">Agent</label>
          </div>
        </section>
        </section>


        <button type="submit" class="btn btn-dark">Log in</button>
        <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>

      

        
      
      </form>

      

    </div>



  
    


  </body>
</html>


<?php

mysqli_close($connection);

?>
