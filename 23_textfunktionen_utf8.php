<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// utf8
$text = "Schöne Grüße aus Österreich";

//Sonderzeichen nehmen einen zusätzlichen Platz ein
$anzahl = strlen($text);
echo "'$text' hat $anzahl Zeichen ohne utf8_decode";
echo "<br>\n";

//mit utf8_decode
$anzahl = strlen(utf8_decode($text)); //exakte Anzahl mit decode, weil eigentlich zählt UMlaut als 2 Zeichen
echo "'$text' hat $anzahl Zeichen mit utf8_decode";
echo "<hr>\n";

// Groß-Kleinbuchstaben
echo "<br>\n";
echo strtoupper($text);
echo "<br>\n";
echo mb_strtoupper($text);// alles in KLeinbuchstaben, auch Umlaut mit mb
echo "<br>\n";
echo strtolower($text);
echo "<br>\n";
echo mb_strtolower($text);
echo "<br>\n";


?>
</body>
</html>



























