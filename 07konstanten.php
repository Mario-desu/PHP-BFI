<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Konstanten ohne $-Zeichen, kann man nicht mehr ändern
const WERT=10;
echo "Zahl ist ".WERT;
echo "<br>\n";
//mit Funktion definieren
define("ZAHL", 123);
echo ZAHL;
echo "<br>\n";
//"Magische" Konstanten sind vordefinert
echo __DIR__; //zeigt absoluten Pfad
echo "<br>\n";
echo PHP_VERSION; //zeigt PHP-VERSION
echo "<br>\n";
include "include/include_footer.php";
?>
</body>
</html>