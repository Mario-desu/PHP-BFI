<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php

 $menue="Pizza";
 
 switch($menue) 
 {
	case "Pizza": echo "Montag";
		break;
	case "Erbeerknödel": echo "Dienstag";
		break;
	case "Fleischbällchen": echo "Mittwoch";
		break;
	case "Carbonara": echo "Donnerstag";
		break;	
	default: echo "ein anderes Menü";
	 
 }
?>
</body>
</html>