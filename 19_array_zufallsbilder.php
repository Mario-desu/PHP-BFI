<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
// Zufallsbilder
/*
$bilder=array("see.jpg",
				"rom.jpg",
				"baum.jpg",
				"wolken.jpg");
*/
$ordner = "bilder";
    
$bilder = scandir($ordner);    
    
$maximum=count($bilder)-1; // Anzahl der Array-Elemente -1, weil Array bei 0 beginnt				
//echo $maximum;
//rand= Zufallszahl    
$zufallszahl=rand(0,$maximum); //(kleinste Zahl, größte Zahl)
echo "Bild Nr.".$zufallszahl;
echo "<br>\n";
echo "<img src='bilder/$bilder[$zufallszahl]'>"; 
//indizierter Array, wählt zufällige Zahl von Element
?>

</body>
</html>