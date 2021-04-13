<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
   $noten = [ 
		"Lukas" => 
				[
				"Deutsch" => 5,	    
				"Englisch" => 4,	    
				"Geschichte" => 2	    
				],
		
		"Susi" =>  [
                "Deutsch" => 4,
                "Englisch" => 3,
                "Geschichte" => 1
                ]
       ];
echo $noten["Lukas"]["Englisch"] . "<br>"; 
echo $noten["Susi"]["Deutsch"] . "<br>"; 
echo "Seine Note ist ".$noten['Lukas']['Geschichte'];    
    
// für Dateiupload in der Praxis, mehr assoziativ    
?>

</body>
</html>