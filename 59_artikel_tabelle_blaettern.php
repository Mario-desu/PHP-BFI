<?php
require_once("include/include_db.php");

// aktuelle Seite ermitteln
if(  isset($_GET["seite"])   )
{
	$seite=(int)$_GET["seite"];
}
else
{
	$seite=1;
}

// Anzahl der zu zeigenden Seiten festlegen
$eintraege_pro_seite=10;
// Startindex des 1. Datensatzes ermitteln

$start=$seite*$eintraege_pro_seite-$eintraege_pro_seite;// es geht darum w

?>
<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="wrapper">
<?php
//Auswahl der Tabelle und Datensätze
$sql="SELECT *
FROM artikel    
LIMIT :erster , :anzahl";//erster Artikel

// Bei Limit special
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$abfrage=$db->prepare($sql);
$abfrage->bindParam(":erster",$start);
$abfrage->bindParam(":anzahl",$eintraege_pro_seite);
$abfrage->execute();

echo "<table>\n";

echo "<tr>\n";

echo "<th>ID</th>\n";
echo "<th>Name</th>\n";
echo "<th>Gruppe</th>\n";
echo "<th>Preis</th>\n";

echo "</tr>\n";	
	
while( $row=$abfrage->fetch() )
{
	echo "<tr>\n";
	
	echo "<td class='alignRight'>$row[artikelID]</td>\n";
	echo "<td>$row[artikelName]</td>\n";
	echo "<td>$row[artikelGruppe]</td>\n";
	echo "<td class='alignRight'>".number_format($row["artikelPreis"], 2, ",", ".")."</td>\n";

	echo "</tr>\n";	
}
echo "</table>\n";


// Ermitteln der Anzahl aller Datensätze und
// Erstellung der Seiten-Links

$sql="SELECT count(artikelID) as gesamt
FROM artikel";

$abfrage=$db->query($sql);
//nur 1 Ergebnis, keine Schleife nötig
$row=$abfrage->fetch();

$gesamt=$row["gesamt"];

// Anzahl der Seiten ermitteln

$wieviele_seiten=$gesamt/$eintraege_pro_seite;
//damit auf Seite, wo man ist, kein Hyperlink erstellt wird unten
//bei Seiten

for($zaehler=0;  $zaehler < $wieviele_seiten; $zaehler++)
{
	$seitennummer=$zaehler+1;
	
	// bin ich auf der aktuellen Seite?
	if($seite==$seitennummer)
	{
		echo " <strong>$seitennummer</strong> ";
	}
	else
	{
		echo " <a href='?seite=$seitennummer'>$seitennummer</a> ";
	}// if ENDE

}// for ENDE
    



?>
</div>
</body>
</html>