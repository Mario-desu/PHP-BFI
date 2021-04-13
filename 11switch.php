<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$note=1;

switch($note)//switch wie "(else)if", wenn eine Variable viele mögliche Werte prüft
{
	case 1: echo "Sehr gut";
	break; // Case erledigt=break
	case 2: echo "Gut";
	break;
	case 3: echo "Befriedigend";
	break;
	default: echo "keine gute Note"; //wie "else"
}
// z.B.: wenn man Dateityp wählt, z.B. pdf, Excel,...



?>
</body>
</html>