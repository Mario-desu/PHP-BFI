<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
// Mehrdimensionale Arrays, Array, der andere Arrays beinhaltet 
$freunde = array( 
array("Donald", "Duck", "Duckburg"), 
array("Micky", "Maus"), 
array("Asterix", "Gallier") ); 
//Daten ausgeben 
echo "Vorname: ".$freunde[0][0]; //[Freunde] [Name]"PLatzkarte"
echo " Zuname: ".$freunde[0][1]; 
echo " Ort: " . $freunde[0][2];   
echo " Vorname: ".$freunde[1][0]; 
echo " Zuname: ".$freunde[1][1]; 
echo " Vorname: ".$freunde[2][0]; 
echo " Zuname: ".$freunde[2][1]; 
?>

</body>
</html>