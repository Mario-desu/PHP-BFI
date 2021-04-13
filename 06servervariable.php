<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">
<?php

/*
Superglobals

    $GLOBALS
    $_SERVER -
    $_GET
    $_POST
    $_FILES
    $_COOKIE
    $_SESSION
    $_REQUEST
    $_ENV

Sollte die nicht mehr empfohlene Direktive register_globals auf on gesetzt sein, 
werden die davon betroffenen Variablen ebenfalls im globalen Gültigkeitsbereich des Skripts sichtbar. 
So existiert zum Beispiel $_POST['foo'] gleichzeitig als $foo. 

echo 'My username is ' .$_ENV["USER"] . '!';

*/


// IP-Adresse auslesen
echo $_SERVER["REMOTE_ADDR"];
echo "<br>\n";

// Die eigene Seite ausgeben
echo $_SERVER["PHP_SELF"];
echo "<br>\n";

// Browser ausgeben
echo $_SERVER["HTTP_USER_AGENT"];
echo "<br>\n";

// Rootverzeichnis ausgeben
echo $_SERVER["DOCUMENT_ROOT"];
echo "<br>\n";

include "include/include_footer.php";

?>
</div>
</body>
</html>