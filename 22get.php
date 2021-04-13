<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//get sieht man in URL, post nicht/Variablenwerte werden mittels URL übergeben
//Login/Passwort immer post!
//$seite zur Integer umwandeln, falls jemand "Blödsinn" eingibt,
//Buchstaben o.ä. werden in 0 umgewandelt    
$seite=(int)$_GET["seite"];
$user=htmlspecialchars($_GET ["user"]);//() nicht vergessen

echo $seite;
echo $user;

//Bei der GET-Methode spricht man von Variablenwerten, die mittels der URL übergeben werden. 
?>
</body>
</html>