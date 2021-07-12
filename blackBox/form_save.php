<?php 
	
	include "db.php";
	include "config.php";
	//get data from querystring and escape variables for security

	$prodName 	 		= mysqli_real_escape_string($connection, $_GET['prodName']);
	$vehicleimg 		= mysqli_real_escape_string($connection, $_GET['vehicleimg']);
	$prodSSN 			= mysqli_real_escape_string($connection, $_GET['prodSSN']);
	$prodCity 			= mysqli_real_escape_string($connection, $_GET['prodCity']);
	$prod_state 		= mysqli_real_escape_string($connection, $_GET['prod_state']);
	$prodZip	 		= mysqli_real_escape_string($connection, $_GET['prodZip']);
	$prodLicense_plate	= mysqli_real_escape_string($connection, $_GET['prodLicense_plate']);
	$prodLicense 		= mysqli_real_escape_string($connection, $_GET['prodLicense']);
	$prodTitle 			= mysqli_real_escape_string($connection, $_GET['prodTitle']);
	$prodMechanic		= mysqli_real_escape_string($connection, $_GET['prodMechanic']);
	$prodInsurance 		= mysqli_real_escape_string($connection, $_GET['prodInsurance']);
	$state    	 = $_GET['state'];
	$carId    	 = $_GET['carId'];
	$userId = $_GET['userId'];

	//SET: insert/update data in DB

	if ($state == "insert") {
		$query = "INSERT INTO tbl_cars_210(username, vehicle_img, SSN, city, _state, zip, license_plate, license, title, mechanic, insurance, user_id) 
					VALUES ('$prodName','$vehicleimg','$prodSSN', '$prodCity', '$prod_state', '$prodZip', '$prodLicense_plate', '$prodLicense', '$prodTitle',  '$prodMechanic', '$prodInsurance', '$userId')";
		// echo $query;
	}

	else {
		$query = "UPDATE tbl_cars_210 
					SET username='$prodName', vehicle_img='$vehicleimg', SSN='$prodSSN', city ='$prodCity', _state ='$prod_state', zip ='$prodZip', license_plate ='$prodLicense_plate', license = '$prodLicense', title ='$prodTitle',  mechanic = '$prodMechanic', insurance='$prodInsurance' 
						 WHERE car_id='$carId'";
		// echo $query;
	}


	$result = mysqli_query($connection, $query);

    if(!$result) {
        die("DB query failed.");
    }

?>

<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">  
		<title>msg to user</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet">

	</head>

	<body id="saveBody">
	    <div class="container save">
			<h1 class="text-center">Save Product Details</h1>
			<h2 class="text-center">Product was saved</h2>
			<a href="form_product_list.php" class="btn btn-primary">Click to see all products</a>
	    </div>
	</body>
</html>

<?php

//close DB connection

mysqli_close($connection);

?>