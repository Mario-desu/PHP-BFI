<?php
//Verbindung zur DB herstellen
require_once("include/include_db.php");
require_once("include/include_functions.php");
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
$sql="SELECT * FROM artikel ORDER BY artikelGruppe ASC, artikelName ASC";// innerhalb Artikelgruppe nach Gruppennamen

$stmt=$db->query($sql); //($sql)=Einkaufszettel



while( $row=$stmt->fetch() )// nach Artikelgruppe ordnen und dann wieder nach artikelName
{
	
    
    echo displayEntry($row["artikelName"],$row["artikelBeschreibung"],$row["artikelStatus"]+1);
    // artikelstatus 1 +1 = 2 (blau)
    
    //Aufruf der Funktion displayEnty aus include-datei
    
    //echo "$row[artikelName] $row[artikelPreis] $row[artikelGruppe]<br>\n";	//keine "", weil string bei []
//    $artikelGruppeAlt=$row["artikelGruppe"];
}



?>
</div>	
</body>
</html>