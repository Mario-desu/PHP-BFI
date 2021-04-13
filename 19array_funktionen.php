<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$datei="haus.jpg";
// mit explode in array umwandeln    
$teile=explode(".",$datei);
    //var_dump ($teile);
    
//mit end das letzte element ermitteln
$endung=end($teile);    
echo $endung;    
    
$erlaubt=["jpg","jpeg","gif","png"]; //zugelassene Dateiendungen
    
    
    
//if ( in array)am wichtigsten hier    
//schauen ob Endung vorkommt
// wenn sich Endung in den zugelassenen Endungen wiederfindet erlaubt    
if(  in_array($endung,$erlaubt)  )
    echo "Endung ok<br>";
    
//Array in Text umwandeln mit implode
$cities[]="Wien";
$cities[]="Rom";
$cities[]="Prag"; 
    
sort ($cities); //alphabetisch sortieren    
    
$satz=implode(" oder ", $cities);    //oder ist Text
    
//z.B. arrayin Text, Städte abhacken, Sie haben     
    
echo $satz;    
    
?>
</body>
</html>