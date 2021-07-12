<?php 
    include "db.php";
	include "config.php";

	//get data from DB
	$carId = $_GET["carId"];
	$query 	= "SELECT * FROM tbl_cars_210 where car_id=" . $carId;
	
	$result = mysqli_query($connection, $query);

	if($result) {
		$row	= mysqli_fetch_assoc($result);//there is only 1 with id=X
	}

	else die("DB query failed.");	

?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">  
		<title>form for new or update</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body>

	    <div class="container">

			<?php 
			echo '<h1>' . $row["username"] .'</h1>';
			$img = $row["vehicle_img"];
			if(!$img) $img = "images/sports-car.png";
				echo '<img src="' . $img . '">';
			?> 

			<?php 
				//release returned data
				mysqli_free_result($result);
			?>

	    </div>

	</body>

</html>

<?php

//close DB connection

mysqli_close($connection);

?>