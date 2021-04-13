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

$output="<select name='anzahl'>\n";//$output, kann aber auch andere Variable sein


while ($zahl<=$limit){
	$output.="<option>$zahl</option>\n";
	$zahl++; // Zahl um 1 erhöhen
}
$output.="</select>\n";

echo $output;
?>

<!--While-Schleife:
-Erlaubt uns etwas zu wiederholen während („while“) eine bestimmte Bedingung gilt.
-while(bedingung) {auszuführender Code}, wenn (Bedingung z.B. <=5) erfüllt ist, wird {Code} ausgeführt. -->



</body>
</html>