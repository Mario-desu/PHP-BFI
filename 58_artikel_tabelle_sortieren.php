<?php
require_once("include/include_db.php");

// Standardsortierung festlegen
$feld="artikelID";
$sortierung="asc";

// Wenn ein Sortierlink angeklickt wurde
// und die Informationen feld und sortierung
// mit $_GET übergeben wurden
if(  isset($_GET["feld"]) &&  isset($_GET["sortierung"])   )
{
	$erlaubt=["artikelID", "artikelName", "artikelGruppe", "artikelPreis",
	"asc", "desc"];
	// Nur wenn die übergebenen Felder und Sortierungen im erlaubt-Array
	// vorkommen, wird die Sortierung umgeschrieben
	if(  in_array($_GET["feld"],$erlaubt)  &&   in_array($_GET["sortierung"],$erlaubt)   )
	{
		$feld=$_GET["feld"];
		$sortierung=$_GET["sortierung"];		
	}
	
}// isset ENDE
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
ORDER BY $feld $sortierung";

$stmt=$db->prepare($sql);
$stmt->execute();

echo "<table>\n";

echo "<tr>\n";

echo "<th>ID<br>
<a href='?feld=artikelID&sortierung=asc'>&uArr;</a>
<a href='?feld=artikelID&sortierung=desc'>&dArr;</a>
</th>\n";

echo "<th>Name<br>
<a href='?feld=artikelName&sortierung=asc'>&uArr;</a>
<a href='?feld=artikelName&sortierung=desc'>&dArr;</a>
</th>\n";

echo "<th>Gruppe<br>
<a href='?feld=artikelGruppe&sortierung=asc'>&uArr;</a>
<a href='?feld=artikelGruppe&sortierung=desc'>&dArr;</a>
</th>\n";

echo "<th>Preis<br>
<a href='?feld=artikelPreis&sortierung=asc'>&uArr;</a>
<a href='?feld=artikelPreis&sortierung=desc'>&dArr;</a>
</th>\n";

echo "</tr>\n";	
	
while( $row=$stmt->fetch() )
{
	echo "<tr>\n";
	
	echo "<td class='alignRight'>$row[artikelID]</td>\n";
	echo "<td>$row[artikelName]</td>\n";
	echo "<td>$row[artikelGruppe]</td>\n";
	echo "<td class='alignRight'>".number_format($row["artikelPreis"], 2, ",", ".")."</td>\n";

	echo "</tr>\n";	
}
echo "</table>\n";




?>
</div>
</body>
</html>