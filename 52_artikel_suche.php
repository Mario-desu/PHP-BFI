<?php
//Verbindung zur DB herstellen
require_once("include/include_db.php");


if(  isset($_POST["suche_senden"]) ){
        //Was über Suchfeld kommt
    $suche="%".strip_tags( $_POST["suche"])."%";// nach Suche wird vorne und hinten ein % angehängt
}else{
    // Beim ersten Aufruf
    $suche="%%"; // %% = sucht alles
}


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
    
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<input type="text" class="form-control" name="suche" placeholder="Suchbegriff">
<input type="submit" class="form-control" name="suche_senden">
</form>    
    
<?php
$sql="SELECT * FROM artikel
WHERE artikelID BETWEEN 30 AND 50 AND artikelName LIKE :suche OR artikelGruppe LIKE :suche 
ORDER BY artikelGruppe ASC, artikelName ASC, artikelPreis ASC";// innerhalb Artikelgruppe nach Gruppennamen

$stmt=$db->prepare($sql);/**/
$stmt->bindParam(":suche",$suche);// :suche, was ins Suchfenster eingegeben wird (Name und Gruppe)
$stmt->execute();

$output=""; // output =freier Name, hier steht für das Angezeigte
$counter=0;    

	
while( $row=$stmt->fetch() )
{
	$output.="$row[artikelName] $row[artikelGruppe] $row[artikelPreis]<br>\n";
    //. wird an aktuelle Output Variable angehängt
    $counter++; //Artikelanzahl 
}
    
    echo "<h2>$counter Artikel gefunden</h2>";
    echo $output;



?>
</div>	
</body>
</html>