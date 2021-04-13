<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//Elemente über Indexzahl
// ansprechbar; beginnt bei =
$orte=["Wien","Berlin","Paris","Rom"];

var_dump($orte); //Datentyp zeigen

echo "<br>";

//Element hinzufügen
$orte[]="Amsterdam";

//Element ändern
$orte[2]="Bonn";



foreach($orte AS $element){
	echo "$element <br>";
}
    
    
// Im Schleifenkopf definieren wir zuerst, dass der Array $orte durchlaufen werden soll und dass jeder Eintrag des Arrays in der Variable $element gespeichert werden soll. Auf diese Variable könnt ihr dann in der Schleife zugreifen und so jedes Element des Arrays ausgeben oder weiter verarbeiten. MUss so gemacht werden. Wenn nur echo $orte, kommt nur Darstellung von String, z.B.:  array(4) { [0]=> string(4) "Wien"....
       
    
    
?>
</body>
</html>