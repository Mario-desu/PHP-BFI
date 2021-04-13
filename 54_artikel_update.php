<?php
//Verbindung zur DB herstellen
require_once("include/include_db.php");

$info="";

if(  isset( $_GET["update"]  )){
	//Aus der URL
	$artikelID=(int)$_GET["update"];//kommmt als umgewandelte Integer
//bei Update brauch man ID Feld
}

if(  isset( $_POST["update"]  )){
	//Aus dem Formular
	$artikelID=(int)$_POST["artikelID"];//kommt als umgewandelte integer
}
//Update Start
//Wenn Formular abgesendet wurde
if(  isset( $_POST["update"]  )){

	$artikelName=htmlspecialchars(trim( $_POST["artikelName"] ));
	$artikelGruppe=htmlspecialchars(trim( $_POST["artikelGruppe"] ));
	$artikelPreis=htmlspecialchars(trim( $_POST["artikelPreis"] ));
	//Komma durch Punkt ersetzen
	//Was wird ersetzt, wodurch, wo
	$artikelPreis=str_replace("," ,".", $artikelPreis);
	
	$artikelBeschreibung=htmlspecialchars(trim( $_POST["artikelBeschreibung"] ));
	//wenn Hakerl gesetzt, dann wird gepostet
	if( isset( $_POST["artikelStatus"]  )  ){
		$artikelStatus=1;
	}else{
		$artikelStatus=0;		
	}
	//bei Update muss man alle Felder einzeln eingeben
	$sql="UPDATE artikel SET
	artikelName=:artikelName,
	artikelGruppe=:artikelGruppe,
	artikelPreis=:artikelPreis,
	artikelBeschreibung=:artikelBeschreibung,
	artikelStatus=:artikelStatus 
	WHERE artikelID=:artikelID
	"; // vor WHERE kein Beistrich
	
	$stmt=$db->prepare($sql);
	$stmt->bindParam(":artikelID",$artikelID);
	$stmt->bindParam(":artikelName",$artikelName);
	$stmt->bindParam(":artikelGruppe",$artikelGruppe);
	$stmt->bindParam(":artikelPreis",$artikelPreis);
	$stmt->bindParam(":artikelBeschreibung",$artikelBeschreibung);
	$stmt->bindParam(":artikelStatus",$artikelStatus);
	
	$stmt->execute();
	$info="Artikel gespeichert";
    
}//update Ende

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
echo "<h3>$info</h3>";    
//Zum Befüllen des Formulars
$sql="SELECT * FROM artikel 
WHERE artikelID=:artikelID";

$stmt=$db->prepare($sql);	
$stmt->bindParam(":artikelID",$artikelID);
$stmt->execute();
//keine  Schleife nötig, da nur 1 Artikel abgefragt wird
$row=$stmt->fetch();
echo "<h2>$row[artikelName] ändern</h2>";
  
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

artikelID<br>
<input type="text" class="form-control" 
value="<?php echo $row["artikelID"];  ?>" 
name="artikelID" readonly><br> <!--verhindert unabsichtliche eingeben-->


artikelName<br>
<input type="text" class="form-control" 
value="<?php echo $row["artikelName"];  ?>" 
name="artikelName"><br>

artikelGruppe<br>
<?php
$artikelGruppe=["Kleidung","Heimwerker","Kosmetik","Lebensmittel"];

echo "<select name='artikelGruppe' class='form-control'>\n";
foreach($artikelGruppe as $element){
	//Vorauswahl der Artikelgruppe
	if($element==$row["artikelGruppe"]){
		$selected="selected"; 
	}else{
		$selected="";		//Vorauswahl wird gefüllt
	}

	echo "\t<option $selected>$element</option>\n";
}
echo "</select><br>";
?>
artikelPreis<br>
<input type="text" class="form-control" 
value="<?php echo number_format($row["artikelPreis"],2,",","");  ?>" 
name="artikelPreis"><br>

artikelBeschreibung<br>
<textarea class="form-control" name="artikelBeschreibung">
<?php echo $row["artikelBeschreibung"];  ?>
</textarea><br>

artikelStatus<br>
<input type="checkbox" class="form-control" name="artikelStatus"
<?php if($row["artikelStatus"]==1){echo " checked";}  ?>
><br>

<input type="submit" class="form-control" name="update" value="speichern"><br>
</form>

<a href="53_artikel_wartung.php">zur Übersicht</a>

</div>	
</body>
</html>