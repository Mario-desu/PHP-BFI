<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$datei=file("test.txt");
echo "<table border='1'>";    
foreach($datei as $element){
    echo "<tr>";   
    //Jede Zeile anhand ; in Array zerlegen (indieziert)
    $spalten=explode(";",$element);// was sprengen
    echo "<td>$spalten[0]</td>"; 
    echo "<td>$spalten[1]</td>"; 
    echo "<td>$spalten[2]</td>"; 
    echo "<tr>"; 
    

}  
echo "</table>";  
?>
</body>
</html>