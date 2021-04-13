<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//Bauplan der Objekte (was kommt in Variable rein)
class Auto{
	public $farbe; //Untervariable (Eigenschaften) von z.B. vw,kia
	public $geschwindigkeit;
    
    public function __construct ($kmh,$lack) {
    $this->geschwindigkeit=$kmh;
    $this->farbe=$lack;
    }
        
	
//	public function fahren ($kmh) {
//		$this->geschwindigkeit=$kmh;
//		//this= greift auf eigene Variable zu
//	}
//	
//	public function lackieren ($lack) {
//		$this->farbe=$lack;
//	}
}
//dass er es aus der Klasse Auto ziehen muss,
//Objekt basierend auf diese KLasse erstellen     
$vw=new Auto(33,"gelb"); //Objekt wird in Variable $vw gespeichert und hat die gespeicherten Eigenschaften
$vw->fahren(40);
$vw->lackieren("rot");
//var_dump($vw);

   echo "Der VW fährt $vw->fahren und hat die Farbe $vw->lackieren";
//


?>
</body>
</html>