<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$number=1;
$limit=7;
//$auswahl= 3, möglich statt Zahl



$output="<select name='ausgabe'>";

while($number<=$limit){
	if($number===3) {
		$output.="<option selected>$number</option>\n";
		
	}

	else{
		$output.="<option>$number</option>\n";

	
	
}
	$number++;
}
$output.="</select>\n";


echo $output;




?>
</body>
</html>