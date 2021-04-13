<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php

$email="susi@hallo.at";
if(!filter_var($email, FILTER_VALIDATE_EMAIL))// !=Verneinung -->wenn nicht 
    // (1$email, 2FILTER_VALIDATE_EMAIL), 1was überprüfen und 2auf was
//prüfen ob es eine E-mail-Adresse ist
{
	echo "Keine gültige Email!";		
}
else
{
	echo "Email ok";		
}

echo "<br>\n";

// Zahl checken

//ab hier optional...

$zahl=300;

if(!filter_var($zahl, FILTER_VALIDATE_INT)) // 
{
	echo "Keine gültige Ganzzahl!";		
}
else
{
	echo "Ganzzahl ok";		
}

echo "<br>\n";

$domain="www.orf.at";
if(!filter_var($domain, FILTER_VALIDATE_DOMAIN))// !=Verneinung -->wenn nicht 
    // (1$email, 2FILTER_VALIDATE_EMAIL), 1was überprüfen und 2auf was
//prüfen ob es eine E-mail-Adresse ist
{
	echo "Keine gültige Adresse";		
}
else
{
	echo "Adresse ok";		
}
    

?>
</body>
</html>

















