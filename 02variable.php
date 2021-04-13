<?php
//Variablen immer mit Buchstaben beginnen, Variable aus mehreren Wörtern mit _ dazwischen!
$seitentitel="PHP-Kurs";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $seitentitel; ?></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$name="Mario"; // Variable wird befüllt
$ort="Wien";
echo $name." wohnt in ".$ort;
echo "<br>\n";
// Variableninterpolation
// Variable kann im text verwendet werden
// geht aber nur mit doppelten " " :
echo "$name wohnt in $ort.";
echo "<br>\n";
//Variable im Text begrenzen
echo "Das ist {$name}s Haus";
?>
</body>
</html>