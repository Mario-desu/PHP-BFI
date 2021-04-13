<?php
//Verbindung zur DB herstellen
require_once("include/include_db.php");


//manche sollten Status 1 bekommen(die man abhakt)

if( isset( $_POST["senden"]  )  ){
	
//1.Schritt ALLE Artikel auf Status 0
	$sql="UPDATE artikel SET artikelStatus=0";
	$stmt=$db->query($sql);
	
	//Sendebutton aus den geposteten Werten entfernen
	unset($_POST["senden"]); 
    /*entleert button, es werden nur Checkboxen übermittelt, 
    In den POst-array werden alle formularfelder miteinbezogen, Checkboxn nur wenn sie angehakt sind*/
	
	//2.Schritt Nur die angehakten wieder auf Status 1
	foreach($_POST as $key=>$value){
        //key= name='chk$row[artikelID]
        //value= '$row[artikelID]'
        
        echo "$key : $value <br>"; // : keine Bedeutung (Doppelpunkt)
        
        
		//den geposteten Wert sicher zur Integer machen
		$value=(int)$value; // value wird dann sicher Zahl
		
		$sql="UPDATE artikel SET artikelStatus=1
		WHERE artikelID=:artikelID";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(":artikelID",$value);
		$stmt->execute();
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<?php
$sql="SELECT * FROM artikel";

$stmt=$db->query($sql);

while( $row=$stmt->fetch() ){
	
	if($row["artikelStatus"]==1){
		$checked="checked"; //bleibt Hakerl
	}else{
		$checked="";		
	}

	echo "\t<input type='checkbox' name='chk$row[artikelID]' value='$row[artikelID]' $checked>"; // Name der Checkbox immer andere name='chk$row[artikelID]'
	echo $row["artikelName"]." ".$row["artikelGruppe"]."<br>\n";
}
?>
<input type="submit" class="form-control" name="senden" value="speichern"><br>
</form>

</div>	
</body>
</html>