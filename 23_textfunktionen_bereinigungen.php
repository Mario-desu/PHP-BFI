<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//Array ersetzen durch anderen
$angabe="Schöne Grüße aus Österreich";
$alt=array("ö","Ö","ä","Ä","ü","Ü","ß"," ");
$neu=array("oe","Oe","ae","Ae","ue","Ue","ss","_");
echo strtolower(  str_replace($alt,$neu,$angabe)  );// alt durch neu ersetzen
echo "<br>\n";
    

// Leerzeichen entfernen vor und nach string, nicht mittendrin
$name="  Karl  ";
    
echo strlen($name);// 8 Länge
    
$name=trim($name); // 
echo "<br>\n";
echo strlen($name);
echo "<br>\n";
$name="....12.12.2019.....";
$name=trim($name,".");// nur Punkte entfernen
echo $name;

?>
</body>
</html>



























