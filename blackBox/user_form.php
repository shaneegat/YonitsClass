<?php 
  include "db.php";

?>

<?php
   
  $userId = $_GET["userId"];
  $query = "select * from tbl_users_2101 where id=" . $userId;
  $result = mysqli_query($connection, $query);
  $state = "insert";

  if($result) {
    $row = mysqli_fetch_assoc($result);
    $state = "edit";
  }



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <script src="js/scripts.js"></script>
    <title>Form1</title>

  </head>
  <body>
    <section class="body">
        <div class="container formContainer"> 
            <header>
                <a href="form_product_list.php" id="logo"></a>
            </header>
            <form action="save_user.php" class="row g-3 needs-validation" novalidate>
                <h1 class="text-center" class="form">Add New Account</h1>

                <div class="col-md-6">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="name" name="userName" value="<?php echo $row["name"];?>" placeholder="Enter Full Name" required>
                  <div class="invalid-feedback">
                      Please provide full name
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control space" id="email" name="userEmail" value="<?php echo $row["email"];?>" placeholder="Enter Email" required>
                  <div class="invalid-feedback">
                          Please provide email
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="userPassword" value="<?php echo $row["password"];?>" placeholder="Enter Password" required>
                  <div class="invalid-feedback">
                        Please provide password
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="phone" class="form-label">Phone number</label>
                  <input type="tel" class="form-control line-space" id="phone" name="userPhone" value="<?php echo $row["mobile"];?>" placeholder="_ _ _  _ _ _  _ _  _ _ " required>
                  <div class="invalid-feedback">
                      Please provide phone number
                  </div>
                </div>
                
                <hr>

                <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control space" id="address" name="userAddress" value="<?php echo $row["address"];?>" required>
                <div class="invalid-feedback">
                    Please provide a valid address.
                </div>
                </div>
               
                <div class="col-md-3">
                <label for="date" class="form-label">Date of birth</label>
                <input type="date" class="form-control" id="date" name="userDate" value="<?php echo $row["date_of_b"];?>" required>
                <div class="invalid-feedback">
                    Please provide a valid date.
                </div>
                </div>

      
                <label>Add profile photo</label>
                <div class="input-group mb-3">
                    <input type="image" class="form-control" id="photo" name="userPhoto">
                    <label class="input-group-text" for="photo">Upload</label>
                </div>


             
                <label for="type" class="form-label">Type of user</label>
                <select class="form-select" id="type" name="userType" value="<?php echo $row["type"];?>">
                    <option value="driver">Driver</option>
                    <option value="polise">Polise</option>
                    <option value="agent">Insurance Agent</option>
                </select>


                <input type="hidden" name="state" value="<?php echo $state ?>">
                <input type="hidden" name="userId" value="">

        

                    <button type="submit" class="btn btn-primary btnn">Save</button>


                    <?php

                      if($result){
                       echo '<a class="btn btn-primary btnn" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete Account</a>;
                       
                      


                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                               Sure you want to delete this account? 
                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a class="btn btn-primary" href="user_delete.php?userId=' . $userId . '">Delete</a>
                              
                              
                             </div>
                            </div>
                          </div>
                       </div>';
                      }

                    ?>      
            </form>

            <?php
              if($result) mysqli_free_result($result);

            ?>
      
    </div>  
    
    </section>
  </body>
</html>


<?php
  
  mysqli_close($connection);

?>