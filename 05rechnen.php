<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$zahl1=5;
$zahl2=2.5; //Komma als Punkt

//addieren
$ergebnis=$zahl1+$zahl2;
echo $ergebnis;
echo "<br>";

//multiplizieren
$ergebnis=$zahl1*$zahl2;
echo $ergebnis;
echo "<br>";

//dividieren
$ergebnis=$zahl1/$zahl2;
echo $ergebnis;
echo "<br>";

//subtrahieren
$ergebnis=$zahl1-$zahl2;
echo $ergebnis;
echo "<br>";

//Zahlen
echo "<hr>";
$zahl=12345.678;
//Runden auf 1 Kommastelle
echo round ($zahl, 1);
echo "<br>";

//Formatiert ausgeben
echo number_format ($zahl, 2, ".", ",");

?>
</body>
</html>