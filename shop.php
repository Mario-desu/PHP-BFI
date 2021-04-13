<?php
session_start();
session_regenerate_id(true);
if( empty(  $_SESSION["userID"]  ) ){
     header("location:logout.php");
}
//zuerst Session dann Require
require_once("include/include_db.php");

if(   isset( $_POST["senden"] )   ){
    
    unset($_POST["senden"]);
    
    $userID=(int)$_SESSION["userID"];
    
    foreach($_POST as $key=>$value){
        
        echo "$key=>$value <br>";
        $artikelID=(int)$key;	
	    $menge=(int)$value;
        
        if($menge>0){
            //Artikelpreis aus DB
            $sql="SELECT artikelPreis FROM artikel
            WHERE artikelID = :artikelID";

            $stmt=$db->prepare($sql);
            $stmt->bindParam(":artikelID",$artikelID);
            $stmt->execute();
            $row=$stmt->fetch();//fetch=holen

            $artikelPreis=$row["artikelPreis"];//Artikelpreis raussuchen

            //Einfügen in die DB (Bestellugstabelle)
            $sql="INSERT INTO bestellungen
            (bestArtikelFID,bestUserFID,bestPreis,bestStueck,bestUmsatz)
            VALUES
            (:bestArtikelFID,:bestUserFID,:bestPreis,:bestStueck,:bestUmsatz)";

            $stmt=$db->prepare($sql);
            $stmt->bindParam(":bestArtikelFID",$artikelID);
            $stmt->bindParam(":bestUserFID",$userID);
            $stmt->bindParam(":bestPreis",$artikelPreis);
            $stmt->bindParam(":bestStueck",$menge);
            //Umsatz errechnen:
            $umsatz=$artikelPreis*$menge;
            //Umsatz einfügen in DB
            $stmt->bindParam(":bestUmsatz",$umsatz);
            $stmt->execute();
        }//menge>0 ende
        
    }//foreach Ende
    
    
}//senden Ende
?>
<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <input type="submit" name="senden"><br>
<?php
$sql="SELECT * FROM artikel WHERE artikelStatus=1";// nur aktive Artikel auflisten
$stmt=$db->query($sql);


	
while( $row=$stmt->fetch() )
{//class=bestellung, weil in bestellung.js so drinnen
    echo "<input type='number' name='$row[artikelID]'
    class='bestellung' 
    data-info='$row[artikelName]' data-preis='$row[artikelPreis]'<br>\n";
    
	echo "$row[artikelName] $row[artikelGruppe] $row[artikelPreis]<br>\n";	
}
?>
</form>    
<div id="test"></div>
<script src="bestellung.js"></script>    
</body>
</html>