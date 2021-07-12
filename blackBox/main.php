<?php 

    include "db.php";
    include "config.php";

   
    session_start();

    $userId = $_SESSION["user_id"];
    $carId = $_GET["carId"];
    $userName = $_GET["username"];
    $carState = $_GET["carState"];




    $query 	= "SELECT * FROM tbl_cars_210 AS u INNER JOIN tbl_users_2101 AS p ON u.user_id = p.id where car_id=" . $carId;


	$result = mysqli_query($connection, $query);
	if($result){
		$row = mysqli_fetch_assoc($result);
       
	}

	else die("DB query failed.");


  
?>



<!DOCTYPE html>
<html>
    <head>
        <title> Black Box Table</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/script.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com"> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



    </head>
    <body>


        <div id="mySidenav" class="sidenav">
            

           

                <div id="flipMini">
                  <section id="userSideNav">
                    <a href="#" id="userPhoto">
                        <img src="<?php echo $row['mini_img']; ?>">
                    </a>
                    <div class="userSideNavInfo">
                        <h6><?php echo $row['name']; ?></h6>
                        <h5>State of Vehicle: <?php echo $carState; ?>%</h5>
                    </div>
                  </section>
                </div>
                <div id="panelMini">
                    <a class="btn btn-secondary" href="logout.php" role="button">Sign Out</a>
                    <a href="user_form.php?userId=<?php echo $row['id']; ?>" class="btn btn-secondary" role="button">Update My Account</a> 
                </div>
           

            <section class="selectionVehicle">
                <?php
                   echo '<button type="button" class="btn btn-secondary btn-sm"> <a href="form_product_list.php"><img src="' . $row['veh_img_mini'] .'">' . $row['username'] . '</a></button>';

                ?>

              
                <button type="button" class="btn btn-secondary btn-sm" id="buttonChoose"> <a href="form_product_list.php">Choose Vehicle</a></button>

              

               
            
            </section>

              
            
            
            
           


            <section id="menu">
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Update Info<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                            <div class="cont">My insurance policy</div>
                            <div class="cont">My fines</div>  
                        </div>  
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Documents<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                                <div class="cont">Send Documents</div>    
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Car Status<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                                <div class="cont">Full Vehicle Inspection</div>
                                <div class="cont">Aftermarket Parts</div>
                                <div class="cont selected"><a href= "object.php?carId=<?php echo $carId; ?>">General Information</a></div>
                                <div class="cont">Damaged Parts</div>
                          
                        </div>
                    </div>


                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Breakdown<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                            <div class="cont">Fixed</div>
                            <div class="cont">Not Fixed</div>
                            <div class="cont">Mechanic Selection</div>  
                        </div>
                    </div>


                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Car Accident<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                            <div class="cont">Documents</div>
                            <div class="cont">Emergency</div>
                            <div class="cont">Bird's-eye view of collision</div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Emergency<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                                <div class="cont">Police</div>
                                <div class="cont">Ambulance</div>
                                <div class="cont">Towing Vehicle</div>   
                        </div>
                    </div>
                </div>
            </section>


            <section class="logoMini">
                <a href="form_product_list.php">
                    <img src="images/logo.mini.png">
                </a>
            </section>

           

           
        </div>

       
     <div id="mainSide">
        
      
        <header>
            <a href="form_product_list.php" id="logo2">
                <img src="images/logo.png">
            </a>
            

            <section class="topic">
                 <h2>Mechanic Selection</h2>

                <section class="hamburder">
                    
                    <span onclick="openNav()"><span class="material-icons md-45">menu</span></span>
                  
                   
               
                </section>

                <section class="logoMini">
                    <a href="form_product_list.php">
                        <img src="images/logo.mini.png">
                    </a>
                </section>
            </section>
        </header>

       
        <span onclick="closeNav()">   













     <div id="container">
            
     
        <main id = "main2">


            <nav>
                <ul>
                    <il>
                        <a href="#" class="navDesktop"> Home</a>
                        <a href="#" class="navMobile"> <span class="material-icons md-30">home</span></a>
                    </il>
                    <il>
                        <a href="#" class="navDesktop">Search</a> 
                        <a href="#" class="navMobile"><span class="material-icons md-30">search</span></a>
                    </il>
                    <il>
                        <a href="#" class="navDesktop">Reacordings</a>
                        <a href="#" class="navMobile"><span class="material-icons md-30">videocam</span></a> 
                    </il>
                </ul>
            </nav>

          
            <section class="middle">
                <img class="mainImg" src="images/mercedes-benx-parts-perpaid-service_1.png">
                <p>Maintain your vehicles value up by keeping it in excellent condition!</p>
                <p><b>About Us:</b></p>
                <p>We are a company suited for your vehicles needs. Don't stay oblivious to the innerworkings of your vehicle.</p>       
                <p><b>Our Goal:</b></p>
                <p>We want to give you transparency for your vehicle.  The black box system identifies car parts that are in poor
                condition and require service.<br><br>
                    
                Changing the world of transportation. Although vehicles are the most common form of transportation, they are also 
                the most dangerous. In a world that connects us to the inner workings of the object most essential to us, 
                opportunities are expanded. <br><br>
                    
                In the event of an accident, enabling the driver to contact his/her insurance company and the police as quickly as possible. 
                The system will automatically send all necessary documentation to their designated location(Insurance agency and Police). Also,
                 access will be given for towing or other services (for example, a taxi, if the user urgently needs to get to their destination).

            
            </p>


            </section>
        </main>
      

        <aside>
            <section id="ori">
                <div id="flip">
                    <a href="#" id="userPhoto">
                      <img src="<?php echo $row['user_img']; ?>">
                    </a>
                </div>

                <div id="panel">
                    <a class="btn btn-secondary" href="logout.php" role="button">Sign Out</a>
                    <a href="user_form.php?userId=<?php echo $row['id']; ?>" class="btn btn-secondary" role="button">Update My Account</a> 
                </div>

                <h6><?php echo $row['name']; ?></h6>
           

                <section class="buttonSize">
                   <a class="btn btn-outline-secondary" href="form_product_list.php" role="button"><?php echo $userName; ?></a>
                </section>
            </section>


            <section id="menu">

                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Update Info<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                            <div class="cont">My insurance policy</div>
                            <div class="cont">My fines</div>   
                        </div>  
                    </div>
                    

                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Documents<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                            <div class="cont">Send Documents</div> 
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Car Status<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                                <div class="cont">Full Vehicle Inspection</div>
                                <div class="cont">Aftermarket Parts</div>
                                <div class="cont selected"><a href= "object.php?carId=<?php echo $carId; ?>">General Information</a></div>
                                <div class="cont">Damaged Parts</div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Breakdown<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                            <div class="cont">Fixed</div>
                            <div class="cont">Not Fixed</div>
                            <div class="cont">Mechanic Selection</div>  
                        </div>
                    </div>


                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Car Accident<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                            <div class="cont">Documents</div>
                            <div class="cont">Emergency</div>
                            <div class="cont">Bird's-eye view of collision</div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <div class="accordion-item_trigger">
                            Emergency<span class="material-icons chevron">chevron_right</span>
                        </div>
                        <div class="accordion-item_content">
                                <div class="cont">Police</div>
                                <div class="cont">Ambulance</div>
                                <div class="cont">Towing Vehicle</div>   
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item_trigger last">
                        </div>
                    </div>

                </div>
            </section>
        </aside>
     </div>
    </span>  
     </div>

       <?php
            if($result) mysqli_free_result($result);

        ?>


    </body>
</html>



<?php
  
  mysqli_close($connection);

?>