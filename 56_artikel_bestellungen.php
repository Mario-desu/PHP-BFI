<?php
require_once "include/include_db.php";

if(  isset(    $_GET["artikel"]  )  ){
    $artikelID=(int)$_GET["artikel"];//artkel von url
    
    
}else{
    
    exit("Kein Artikel gewählt");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
$sql="SELECT * FROM user INNER JOIN bestellungen
ON userID=bestUserFID
WHERE bestArtikelFID=:artikelID 
";// Artikel die übergeben wurden

$stmt=$db->prepare($sql);
$stmt->bindParam(":artikelID",$artikelID);// :suche, was ins Suchfenster (URL) eingegeben wird (Name und Gruppe)
$stmt->execute();
    
$output=""; // output =freier Name, hier steht für das Angezeigte
$counter=0;    
$gesamtumsatz=0;    

	
while( $row=$stmt->fetch() )
{
	$output .= "$row[userName] $row[bestUmsatz]<br>\n";
    
    $counter++; 
    // Laufende Summe zum UMsatz:
    $gesamtumsatz+=$row["bestUmsatz"];
}   
    
$output .="<hr>Gesamtumsatz: $gesamtumsatz";    
    
if($counter>0){
    echo "$counter Bestellung(en) gefunden!<br>".$output;
}else{
    echo "Keine Bestellungen gefunden!<br>";
    
}
    
?>
</body>
</html>