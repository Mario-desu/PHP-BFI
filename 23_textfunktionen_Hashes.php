<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php

// Verschlüsselungen

$text="hallo";//man kann es umrechnen lassen
//http://www.md5-generator.de/
//http://md5cracker.org....oder dergleichen
echo md5($text); //md5 Text wird umgerechnet in bel. Buchstaben/Zahlen (immer gleiche Kombi)
//hashes kann man aber wieder zurückrechnen    
    
echo "<hr>\n";//hr=Strich



echo sha1($text);//sha1, andere Art des Umrechnens
echo "<br>\n";



//"versalzen"
$salz = "was sinnloses blabla";
$algo = "sha256";
$passwort = "geheim";
echo $hash = hash_hmac($algo, $passwort, $salz);//hash_hmac=versalzen, vermischt, es muss an dritter Stelle stehen

//Hinweis: ist veraltet - nur zum Verständnis von hash und salt

?>
</body>
</html>



























