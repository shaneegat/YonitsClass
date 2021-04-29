<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<title>Shanee Gat</title>
	</head>
	<body>
	<?php
        $userName = $_GET["userName"];
        $password = $_GET["password"];

        echo "<h1> Welcome " .$userName. "</h1>";

        $color1 = $_GET["color1"];
        $color2 = $_GET["color2"];

        if(($color1 == "red" || $color2 == "red")&& ($color1 == "blue" || $color2=="blue")) 
            echo "<h1> You made Purple!</h1>";
        else if(($color1 == "red" || $color2 == "red")&& ($color1 == "yellow" || $color2=="yellow"))
            echo "<h1> You made Orange</h1>!";
        else if(($color1 == "yellow" || $color2=="yellow") && ($color1 == "blue" || $color2=="blue")) 
            echo "<h1> You made Green!</h1>";
        else    
            echo "<h1> You Failed ): </h1>";
        
    ?>

   
        </form>
	</body>
</html> 