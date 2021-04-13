<?php
//es geht hier um den Dateiupload



//Absoluter Pfad
$pfad=__DIR__; //zeigt Aboluten Dateipfad 
$ordner="dateien"; //ordner Dateien in Test
//Wenn Button gedrückt...
if(  isset( $_POST["senden"]  )  ){
	
	
	foreach($_FILES["datei"] as $key=>$value){ //Array mit Schlüsselwert Datei, mehrdimensional
		echo "$key : $value <br>";  /*--> es wird das angezeigt bei Ausgabe:
        name : SELECT Beispiele 01.pdf
            type : application/pdf
            tmp_name : C:\Users\mhart\OneDrive\Dokumente\webprojekte\BFI\XAMPP\tmp\phpB183.tmp
            error : 0
            size : 151363
        */
        
        
	}
	
	$dateiname=$_FILES["datei"]["name"]; // Lukas [datei]   , Geschichtsnote [name]
    
	
	$alt=array("ö","Ö","ä","Ä","ü","Ü","ß"," ");
	$neu=array("oe","Oe","ae","Ae","ue","Ue","ss","_");
	
	$dateiname=str_replace($alt,$neu,$dateiname);	
	
    
    
    //hier passiert etwas:
    //Die globale Variable $_FILES enthält alle Informationen über hochgeladene Dateien
    
	move_uploaded_file($_FILES["datei"]["tmp_name"],// Reservierung, temporary file
		"$pfad/$ordner/$dateiname");// Zielordner

	
}//senden ENDE

// Datei löschen mit get, :

if(  isset( $_GET["delete"]  )  ){// von <a href='?delete=$datei'>delete</a>
	
	$dateiname=$_GET["delete"];
	//Wenn Datei existiert, wird sie gelöscht
	if( file_exists("$pfad/$ordner/$dateiname")  ){
		unlink("$pfad/$ordner/$dateiname"); // unlink = fertige PHP-Funktion für löschen
	}	
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

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
method="post" enctype="multipart/form-data"> <!--damit man was mitschicken kann, 
multipart/form-data = keine Zeichenkodierung-->
    
<input type="file" class="form-control-file" name="datei">
<input type="submit" class="form-control" name="senden" value="upload">
</form>


<?php
$ordnerinhalt=opendir("$pfad/$ordner");// Verzeichnis öffnen
//var_dump($ordnerinhalt);
while($datei=readdir($ordnerinhalt)){ // solange ich was finde, in $datei reinschreiben
	
	if($datei !="." && $datei !=".."){ // wenn du nicht . oder .. dann wird es ausgegeben
		echo $datei." ";
		echo filesize("$pfad/$ordner/$datei"); // Dateigröße
        echo " ";
		echo "<a href='?delete=$datei'>delete</a>";
		echo "<br>\n";
	}
}


?>
</div>	
</body>
</html>