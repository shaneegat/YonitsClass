<?php 

    include "db.php";
    include "config.php";


    session_start();


    if(!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'login_user.php');

    }

    

    $query 	= "SELECT * FROM tbl_cars_210 WHERE user_id=" . $_SESSION["user_id"] . " order by username";
	$result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }

?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">  
		<title>form for new or update</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet">
      
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/scripts.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com"> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
	  
    <body class="body1">
        <header>
            <a href="#" id="logo"></a>
        </header>

        <div id = "wrapper">
            <h1 class = "text-center">Choose your Vehicle</h1>
            
            <section class= "center">
                <?php     
                    echo '<div id="users">';
                    while($row = mysqli_fetch_assoc($result)) {//results are in associative array. keys are cols names
                        echo    '<div class="work">';
                            echo    '<a href="main.php?carId=' . $row["car_id"] . '&username=' . $row["username"] . '&carState='. $row["_state"] .'" class="user">';
                                        $img = $row["vehicle_img"];
                                        if(!$img) $img = "images/sports-car.png";
                                echo 		'<img src="' . $img . '" class="car">';
                            echo    '</a>';
                            echo   	'<h5 class="card-title">' . $row["username"] . '</h5>';
                            echo    '<div class="buttons">';
                                echo   	'<a href="form.php?carId=' . $row["car_id"] . '" class="btn btn-primary">Update</a>'; 
                               



                                echo '<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>

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
                                     <a class="btn btn-primary" href="form_delete.php?carId=' . $row["car_id"] . '">Delete</a>
                                    
                                      
                                      
                                     </div>
                                    </div>
                                  </div>
                               </div>';
                                
                                






                            echo    '</div>';   
                        echo    '</div>';
                    }
                    echo '</div>';

                    ?> 
                    
                    <section class="text-center">
                        <div class="icon">
                            <a href = "form.php?userId=<?php echo $_SESSION["user_id"]; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="white" class="bi bi-plus-circle" id="plus" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg> 
                            </a>
                        </div> 
                    </section>

                </section>

                    
                <?php 
                    mysqli_free_result($result);
                ?>

	    </div>

	</body>

</html>

<?php

mysqli_close($connection);

?>