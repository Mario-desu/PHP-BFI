<?php
$dbHost="localhost";
$dbName="schulung";
$dbCharset="utf8";
$dbUser="training";
$dbPw="123x";

try{	//wie if
	$db=new PDO( //=PHP Data objects
		"mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset",
		"$dbUser",
		"$dbPw"
		);

}catch(PDOException $e){ // wie else, e=error
	die("Keine Verbindung zur Datenbank" . $e->getMessage() );
    //man sieht dann nicht die Fehlermeldung mit Pfad
}
?>