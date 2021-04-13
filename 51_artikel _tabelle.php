<?php
//Verbindung zur DB herstellen
require_once("include/include_db.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<!-- für bootstrap -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- für bootstrap -->
	<title>Kurs</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid">
<?php
$sql="SELECT * FROM artikel";

$stmt=$db->query($sql); // $stmt= Statement (Abfrage)

$counter=0;    
echo "<table class='table'>\n";

echo "<tr>\n";

echo "<th>ID</th>\n";
echo "<th>Name</th>\n";
echo "<th>Gruppe</th>\n";
echo "<th>Preis</th>\n";
echo "<th>Details</th>\n";

    
echo "</tr>\n";	
	
while( $row=$stmt->fetch() )
{
	echo "<tr>\n";
	
	echo "<td class='alignRight'>$row[artikelID]</td>\n";
	echo "<td>$row[artikelName]</td>\n";
	echo "<td>$row[artikelGruppe]</td>\n";
	echo "<td class='alignRight'>".number_format($row["artikelPreis"], 2, ",", ".")."</td>\n"; //Kommastellen, Kommazeichen, 1000-Trennzeichen

    echo "<td><a href='56_artikel_bestellungen.php?artikel=$row[artikelID]'>Bestellungen</a>
    </td>\n";
    
    
	echo "</tr>\n";	
    $counter++;// Zähler um 1 erhöhen
}
echo "</table>\n";
    echo "$counter Artikel gefunden";// wieviel Artikel


?>
</div>	
</body>
</html>