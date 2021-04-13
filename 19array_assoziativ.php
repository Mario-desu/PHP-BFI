<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$daten=[
"vorname"=>"Mario",
"zuname"=>"Hartleb",
"plz"=>1030
];


//echo $daten["zuname"];
//echo "<br>";
foreach ($daten as $key=>$value){
	echo "$key ist $value <br>";
    
}
    
?>
</body>
</html>