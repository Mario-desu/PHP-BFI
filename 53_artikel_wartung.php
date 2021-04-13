<?php
//Verbindung zur DB herstellen
require_once("include/include_db.php");



//Wenn der Link zum Löschen geklickt wurde

if( isset(  $_GET["loeschen"]) ){
    
    //sofort in Zahl umwandeln
    $artikelID=(int)$_GET["loeschen"];
    
   
    $sql="DELETE FROM artikel WHERE artikelID=:artikelID";
    $abfrage=$db->prepare($sql);
    $abfrage->bindParam(":artikelID",$artikelID);
    $abfrage->execute();		

    header("location:$_SERVER[PHP_SELF]"); 
    // dass man wieder ganz oben landet auf Seite
    //bzw. wo man landet nach dem Löschen (z.B. Homepage)
}

//Anlegen neuer Artikel
if( isset(  $_POST["senden"]  )  )
{
	$artikelName=strip_tags( $_POST["artikelName"] )  ;
	//$artikelName=strip_tags( trim( $_POST["artikelName"] )  );	//kein Abstand nach POST!
	$artikelGruppe=strip_tags( trim( $_POST["artikelGruppe"] )  );	
	$artikelPreis=strip_tags( trim( $_POST["artikelPreis"] )  );
	//Komma durch Punkt ersetzen
	$artikelPreis=str_replace(",", ".", $artikelPreis);
	
//	$artikelBeschreibung=strip_tags( trim( $_POST["artikelBeschreibung"] )  );	
    
    //wegen Tinymce striptags raus
	$artikelBeschreibung= trim( $_POST["artikelBeschreibung"]   );
	//wenn Hakerl gesetzt, dann wird gepostet
	if( isset(  $_POST["artikelStatus"]  )  ){
		$artikelStatus=1;
	}else{
		$artikelStatus=0;		
	}	
	
	$sql="INSERT INTO 
    artikel
	(artikelName,artikelGruppe,artikelPreis,
		artikelBeschreibung,artikelStatus)
	VALUES
	(:artikelName,:artikelGruppe,:artikelPreis,
		:artikelBeschreibung,:artikelStatus)
	";

	$abfrage=$db->prepare($sql);	
	$abfrage->bindParam(":artikelName",$artikelName);	
	$abfrage->bindParam(":artikelGruppe",$artikelGruppe);	
	$abfrage->bindParam(":artikelPreis",$artikelPreis);	
	$abfrage->bindParam(":artikelBeschreibung",$artikelBeschreibung);	
	$abfrage->bindParam(":artikelStatus",$artikelStatus);	

	$abfrage->execute();		
	//Seite neu laden nach execute, verhindert, dass Eintrag doppelt, bei Reload
    header("location:$_SERVER[PHP_SELF]"); //sucht Namen selbst
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
    
    <script type="text/javascript" src="./tinymce/tinymce.min.js"></script>
	<script>
	tinymce.init({
		selector: "textarea",
		toolbar: "fontsizeselect",
		fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",	
		 plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor"
		],	
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons font_formats",	
	});
	</script>
    
    
    
    
</head>
<body>
<div class="container-fluid">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
artikelName<br>
<input type="text" class="form-control" name="artikelName" required><br> <!--required=Pflichtfeld-->

artikelGruppe<br>
<?php
$artikelGruppe=["Kleidung","Heimwerker","Kosmetik","Lebensmittel"];

echo "<select name='artikelGruppe' class='form-control'>\n";
foreach($artikelGruppe as $element){
	echo "\t<option>$element</option>\n";
}
echo "</select><br>";
?>
artikelPreis<br>
<input type="text" class="form-control" name="artikelPreis"><br>
artikelBeschreibung<br>
<textarea class="form-control" name="artikelBeschreibung"></textarea><br>
artikelStatus<br>
<input type="checkbox" class="form-control" name="artikelStatus"><br>

<input type="submit" class="form-control" name="senden" value="speichern"><br>
</form>

<?php
$sql="SELECT * FROM artikel";

$stmt=$db->query($sql);

$counter=0;

echo "<table class='table'>\n";

echo "<tr>\n";

echo "<th>ID</th>\n";
echo "<th>Name</th>\n";
echo "<th>Gruppe</th>\n";
echo "<th>Preis</th>\n";
echo "<th>Beschreibung</th>\n";    
echo "<th>Löschen</th>\n";   // eingegeben

echo "</tr>\n";	
	
while( $row=$stmt->fetch() )
{
	echo "<tr>\n";
	
	echo "<td class='alignRight'>$row[artikelID]</td>\n";
	echo "<td>$row[artikelName]</td>\n";
	echo "<td>$row[artikelGruppe]</td>\n";
	echo "<td class='alignRight'>".number_format($row["artikelPreis"], 2, ",", ".")."</td>\n";
    echo "<td>$row[artikelBeschreibung]</td>\n";
    echo"<td>
    <a href='?loeschen=$row[artikelID]' onclick='return testen()'>löschen</a></td>\n"; //eingegeben, ?= mit get übergeben, ab hier 
    //beginnt es mit get, mit get , weil es automatisch funktioniert, siehe ganz oben
     echo "<td><a href='54_artikel_update.php?update=$row[artikelID]'>update</a></td>\n"; 
    
    
	echo "</tr>\n";
	$counter++;	//Zähler um 1 erhöhen
}
echo "</table>\n";
echo "$counter Artikel gefunden";

?>
</div>	
    
<script>
 "use strict"
    function testen(){
    return confirm("Wollen Sie das wirklich?")
    }   
    
    </script>    
</body>
</html>