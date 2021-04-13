<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$limit=5;

for($zahl=1;$zahl<=$limit;$zahl++){
	echo $zahl.",\n"; //. verbindet Variable mit Zeilenumbruch
}


?>

<!---Ähnlich wie While, allerdings kompakter, Variable in der Klammer.
for (Variable=1;Bedingung,$zahl++) {echo mit Reaktion, die ausgelöst werden soll}
z.B for($zahl=1;$zahl<=$limit;$zahl++){
	echo $zahl.",\n"
-->

</body>
</html> 