<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//ab jetzt +60 sek (Lebenszeit d.Cookie)    
$ablauf=time()+60;
//Cookie im Browser gespeichert
setcookie("user","DonaldDuck",$ablauf); // Cookie gesetzt
    
if( isset($_COOKIE["user"]) ){// Cookie mit Schlüsselwort user
    echo $_COOKIE["user"];// bei Reload sieht das erst, auch beim Schließen des 
    //Browser bleibt Cookie da
}
/*    
Die erste Angabe (user) ist der Name des Cookies, über die der Cookie später immer erreichbar ist. Die zweite Angabe ist der Wert, der nachher im Cookie gespeichert wird. In diesem Fall Max. Die dritte Stelle ist eine Zeitangabe, wie lange der Cookie gültig, d.h. auf dem Computer des Anwenders gespeichert wird.  */   
    
?>
</body>
</html>