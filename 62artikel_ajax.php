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
$sql="SELECT * FROM artikel ORDER BY artikelGruppe ASC";// innerhalb Artikelgruppe nach Gruppennamen

$stmt=$db->query($sql);


	
while( $row=$stmt->fetch() )
{
	echo "<div>$row[artikelName] <button onclick='loadContent ($row[artikelID])'>info</button>
    </div>\n";	
    echo "<div id='info{$row['artikelID']}'></div>\n";//weil in {} ''für artikelID
}
// {}damit alles gezeigt wird von varaible



?>
<script>
//wenn man artikel info anklickt, erscheinen bestellte Artikel
function loadContent(id){//ID hinzugefügt
	
	let req =new XMLHttpRequest();
	req.open("GET","63_artikel_ajax_bestellungen.php?artikel="+id,true);//Datei geändert
    //?artikel=, Artikel ID übergeben
	req.send();
	
	req.onreadystatechange=function(){
		if(req.readyState==4 && req.status==200){
            //Ziel- dort wird Antwort reingeladen
			document.getElementById("info"+id).innerHTML=req.responseText;
		}			
	}	
}

    
    
    </script>
</div>	
</body>
</html>