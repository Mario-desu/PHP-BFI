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
    
    //erinnert etwas an Funktionen
    
class Auto{ // class definiert was ein Auto ist
	public $farbe; //Untervariable (Eigenschaften) von z.B. vw,kia
	public $geschwindigkeit;
	
	public function fahren ($kmh) {
		$this->geschwindigkeit=$kmh;
		//this= greift auf eigene Variable zu
	}
	
	public function lackieren ($lack) {
		$this->farbe=$lack;
	}
}
//dass er es aus der Klasse Auto ziehen muss
$vw=new Auto;
$vw->fahren(40);
$vw->lackieren("rot");
var_dump($vw);
  
   
    

$kia=new Auto; // wenn etwas aus einer KLasse ageleitet wird 
$kia->fahren(30); //
$kia->lackieren("grün");
var_dump($kia);

?>
</body>
</html>