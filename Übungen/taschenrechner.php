<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
 if(isset($_POST["zahl1"])) // isset, wenn das Formular abgeschickt wurde und ein Feld abgeschickt wurde "z.B zahl1
{

    $zahl1=str_replace (",",".",$_POST["zahl1"]); //, durch .ersetzen
    $zahl1=str_replace (",",".",$_POST["zahl2"]);
     
    $zahl1=(float)$zahl1;//warum float?
	$zahl2=(float)$zahl2;
	$rechenart=$_POST["rechenart"];

	echo "Zahl1: " . $_POST["zahl1"];
	echo "<br>\n";
	echo "Zahl2: " . $_POST["zahl2"];
	echo "<br>\n";
	echo $rechenart;
	echo "<br>\n";

	switch($rechenart)
	{
		case "addieren": $ergebnis=$zahl1+$zahl2;
				break;
		case "subtrahieren": $ergebnis=$zahl1-$zahl2;
				break;
		case "multiplizieren": $ergebnis=$zahl1*$zahl2;
				break;
		case "dividieren": 
				if($zahl2==0)
				{
					$ergebnis="Keine Divisionen durch null!";
				}
				else
				{
					$ergebnis=$zahl1/$zahl2;	
				}
				
				break;
		default: $ergebnis="keine gültige Rechenart";
	}

	echo "ERGEBNIS:" . $ergebnis;

} 
    
    
    
    
    
    
?>
</body>
</html>