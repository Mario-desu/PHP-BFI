<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$ehrung="Sehr geehrte(r)";
function gruss($name,$anrede="Frau") //Frau in dem Fall Standard, function bezeichnungvonfunction ($element1, $element2), was sich ändern kann
{
	global $ehrung;  
	echo "Hallo $ehrung $anrede $name <br>"; // 
}

function kubik($laenge, $breite, $hoehe){
	return $laenge*$breite*$hoehe; //return: ähnlich wie echo, allerdings wird nichts "ausgespuckt", Echo besser außerhalb {} 
}

// Aufruf der Funktion, man kann Werte für $ ändern
gruss("Andreas", "Herr"); // ("Inhalt1", "Inhalt2")
gruss("Susi"); // $anrede muss nicht eingegeben werden, da "Frau" Standard


echo kubik (2,4,3); // es wird somit das Ergebnis zur Rechnung (von return) angezeigt
?>
</body>

<!--
    
    
</html>