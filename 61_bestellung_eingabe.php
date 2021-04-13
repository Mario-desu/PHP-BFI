<?php
//Verbindung zur DB herstellen
require_once("include/include_db.php");
//Verbindung zu functions
require_once("include/include_functions.php");

if(   isset( $_POST["senden"] )   ){
    //was bei den einzelnen Feldern gewählt wird
	$userID=(int)$_POST["user"];	
	$artikelID=(int)$_POST["artikel"];	
	$menge=(int)$_POST["menge"];
	
	//Artikelpreis aus DB
	$sql="SELECT artikelPreis FROM artikel
	WHERE artikelID = :artikelID";

	$stmt=$db->prepare($sql);
	$stmt->bindParam(":artikelID",$artikelID);
	$stmt->execute();
	$row=$stmt->fetch();

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

<?php
echo dropdownDB($db,"user","userID","userName");
    //=$sql="SELECT userID, user from User 
echo dropdownDB($db,"artikel","artikelID","artikelName");
?>
<input type="number" name="menge" min="1" value="1" class="form-control">
<button type="submit" name="senden" class="btn btn-default">Absenden</button>
    
    <!-- 4 names werden ausgegeben, was als value drinnen wird übergeben-->
</form>

</div>	
</body>
</html>