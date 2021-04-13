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
<div class="row">
<div class="col-md-2">
<?php
$artikelGruppe=["Kleidung","Heimwerker","Kosmetik","Lebensmittel","Spielzeug"];
//"Gästeliste"
    
    
echo "<ul>\n";
foreach($artikelGruppe as $element){// ganzer array wird in $elementt gespeichert
    
    //da der Link auf die selbe seite geht, kann man gleich mit ? beginnen
	echo "\t<li><a href='?gruppe=$element'>$element</a></li>\n";//?=Key value paar
}
echo "</ul><br>";
?>
</div>
<div class="col-md-10">
<?php
if( isset( $_GET["gruppe"]  )  ){
    //alles ok GET kann genommen werden
    if(  in_array ($_GET["gruppe"], $artikelGruppe)){// Wörter, die schon im array sind,
        //in_array — Prüft, ob ein Wert in einem Array existiert (hier$artikelgruppe)
    
        $gruppe=$_GET["gruppe"];//gruppe=Schlüsselwert vom Hyperlink
    
}else {
        //link ggf schadhaft, daher standardwert
        $gruppe="Kleidung";
    }
    // stehst nicht auf "Gästeliste", kommst nicht rein (Spielzeug)
    
	
	
}else{//beim ersten Aufruf ist gET noch leer, daher Standardweert
	$gruppe="Kleidung";	// ist default, artikel von Kleidung werden angezeigt
}


$sql="SELECT * FROM artikel
WHERE artikelGruppe=:gruppe";

$stmt=$db->prepare($sql);
$stmt->bindParam(":gruppe",$gruppe);
$stmt->execute();

while( $row=$stmt->fetch() ){
	echo $row["artikelName"]." ".$row["artikelGruppe"]."<br>";
}


?>
</div>
</div>	
</div>
</body>
</html>