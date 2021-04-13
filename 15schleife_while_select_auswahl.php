<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$zahl=1;
$limit=5;
$auswahl=4; //

$output="<select name='anzahl'>\n";


while ($zahl<=$limit){
	
	if($zahl===$auswahl)// $===$ -> identisch
	{
		$output.="\t<option selected>$zahl</option>\n";// <option selected> Eintrag vorselektiert z.B.: 4 hier
	}else {
		$output.=;
		// \t = einrücken im Quellcode
	}
	$zahl++; // Zahl um 1 erhöhen
}
$output.="</select>\n";

echo $output;
?>
</body>
</html>