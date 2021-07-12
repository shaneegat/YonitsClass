<?php 
  include "db.php";
  include "config.php";

	//get data from DB
  $userId = $_GET["userId"];
	$isEditMode = isset($_GET["carId"]);

  $row["username"] = "";
  $row["vehicle_img"] = "";
  $row["SSN"] = "";
  $row["city"] = "";
  $row["_state"] = "";
  $row["zip"] = "";
  $row["license_plate"] = "";
  $row["license"] = "";
  $row["title"] = "";
  $row["mechanic"] = "";
  $row["insurance"] = "";
  
 
	if($isEditMode) 
		$state = "edit";
	else
		$state = "insert";

	if($isEditMode){
		$carId = $_GET["carId"];
		$query 	= "SELECT * FROM tbl_cars_210 WHERE car_id=" . $carId;
    
		$result = mysqli_query($connection, $query);
    
      if($result) {
        $row = mysqli_fetch_assoc($result);//there is only 1 with id=X
      }
	}

	else{
		$carId = 0;
		$name = 0;
	}

	//else die("DB query failed.");//i dont want it to fail. i want it to count.
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

    <script src="js/script.js"></script>

		<title><?php if($isEditMode) echo "Edit"; else echo "New";?>form for new or update</title>

  
  </head>
  <body>
    <section class="body">
      <div class="container formContainer"> 

        <header>
            <a href="form_list.php" id="logo"></a>
        </header>

        <form action = "form_save.php" class="row g-3 needs-validation" novalidate>

            <h1 class="text-center" class="form">Add New Vehicle</h1>

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">username</label>
              <input type="text" class="form-control" id="validationCustom02" name="prodName" placeholder="enter Username" required value="<?php echo $row["username"];?>">
              <div class="invalid-feedback">
                    Please provide username
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom01" class="form-label">social security number</label>
              <input type="text" class="form-control line-space" id="validationCustom01" name="prodSSN" placeholder="_ _ _  _ _  _ _ _ " required value="<?php echo $row["SSN"];?>">
              <div class="invalid-feedback">
                  Please provide social security number
              </div>
            </div>
            
            <hr>

            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">city</label>
              <input type="text" class="form-control space" id="validationCustom03" name="prodCity" required value="<?php echo $row["city"];?>">
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom04" class="form-label">state</label>
              <input type="text" class="form-select" id="validationCustom04" name="prod_state" required value="<?php echo $row["_state"];?>">
              <div class="invalid-feedback">
                  Please select a valid state.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">zip</label>
              <input type="text" class="form-control" id="validationCustom05" name="prodZip" required value="<?php echo $row["zip"];?>">
              <div class="invalid-feedback">
                  Please provide a valid zip.
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">license plate Number</label>
              <input type="text" class="form-control space" id="validationCustom02" name="prodLicense_plate" placeholder="license plate Number" required  value="<?php echo $row["license_plate"];?>">
              <div class="invalid-feedback">
                      Please provide license plate number
              </div>
            </div>

           
            <div class="mb-3">
              <label for="vehicleimg" class="form-label">Vehicle image</label>
              <input type="text" class="form-control" id="vehicleimg" name="vehicleimg" value="<?php echo $row["vehicle_img"];?>">
            </div>

            <label>upload vehicle title</label>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="prodTitle" id="inputGroupFile02" value="<?php echo $row["title"];?>">
              <label class="input-group-text" for="inputGroupFile02">upload</label>
            </div>

            <label>upload Drivers licence</label>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="prodLicense" id="inputGroupFile02" value="<?php echo $row["license"];?>">
              <label class="input-group-text" for="inputGroupFile02">upload</label>
            </div>

            <h5 class="form">insurance company</h5>
            <select class="form-select" aria-label="Default select example" name="prodInsurance" id="insurance" data-selected="<?php echo $row["insurance"];?>">
                <option value="1">AAA</option>
                <option value="2">Farmers</option>
                <option value="3">Geico</option>
                <option value="3">Liberty Mutual</option>
                <option value="3">Nationwide</option>
                <option value="2">Progressive</option>
                <option value="2">State Farm</option>
                <option value="2">other</option>
              </select>

            <h5 class="form">mechanic</h5>
            <select class="form-select" aria-label="Default select example" name="prodMechanic" id="mechanic" data-selected="<?php echo $row["mechanic"];?>">
                <option value="1">dealership</option>
                <option value="2">Jiffy Lube</option>
                <option value="3">United States Mechinic</option>
                <option value="3">Jimmy's Auto Shop</option>
                <option value="3">Mechanic Inc.</option>
                <option value="2">Your Mechanic Auto Repair</option>
                <option value="2">Wrench Inc.</option>
                <option value="2">other</option>
              </select>
                    
              <div class="form-check bspace">
                <input class="form-check-input" type="checkbox"  id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  connect to Bluetooth
                </label>
              </div>

              <div class="form-check bspace">
                  <input class="form-check-input" type="checkbox" id="invalidCheck2">
                  <label class="form-check-label" for="invalidCheck2">
                    agree to terms and conditions
                  </label>
                </div>
              </div>

              <input type="hidden" name="state" value= "<?php echo $state;?>">
              <input type="hidden" name="carId" value="<?php echo $carId;?>">
              <input type="hidden" name="userId" value="<?php echo $userId;?>">
              <button type="submit" class="btn btn-primary btnn">save</button>
                  
            </form>
          
    </div>  
    
    </section>
    
    <script>
      (function(){
        init();
        initt();
      })();
    </script>
  </body>
</html>


<?php

//close DB connection

mysqli_close($connection);

?>