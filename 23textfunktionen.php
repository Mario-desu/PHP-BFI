<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$text="Willkommen auf <em>meiner</em> Webseite<br>";

echo $text;
// die ersten 3 Buchstaben, 0 ist die erste Stelle
echo substr($text,0,3); //Nummerierung des Buchstabens, z.B. W=0,($text,ab welcher Stelle, //wieviele Zeichen, wenn 3. Stelle leer, wird der ganze rest gezeigt)
echo "<br>";
echo strlen ($text); //Anzahl der Zeichen
echo "<br>";

//entferne alle HTML-Tags
$text=strip_tags ($text);

echo $text; //jetzt nicht mehr kursiv
echo "<br>";

//Ersetze meiner durch unserer
echo str_replace ("meiner","unserer", $text);

?>
</body>
</html>