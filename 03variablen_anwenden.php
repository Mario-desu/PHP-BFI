<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$ordner="bilder";
$datei="wasserfall.jpg";
$alt="Bild vom Wasserfall";
$breite=200;
echo "<img src='$ordner/$datei' alt='$alt' width='$breite'>";
echo "<br>\n";
$ziel="01basics.php";
$text="Zur Muster-Datei";
echo "<a href=$ziel>$text</a>";

//Dynamischer Link
$ziel="01basics.php";
$text="zum Muster";
//echo "<a href='$ziel'>$text></a>";


?>
</body>
</html>