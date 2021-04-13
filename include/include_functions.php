<?php
function displaySelect ($name,$limit) {

	$zahl=1;
	$output="<select name='$name'>\n";
	   while ($zahl<=$limit){
	   $output.="\t<option>$zahl</option>\n"; // \t, <option> wird im Quelltext eingerückt
	   $zahl++;	
	}
	$output.="</select>\n";
	return $output; //Schleife wird erst ausgelöst mit Echo in Zieldatei
}


function displayEntry($header="",$content="",$farbe=2){
	
	$arrfarbe=[1=>"red",2=>"blue",3=>"yellow"];
	
	
	$output="<div style='border:2px solid $arrfarbe[$farbe] ;margin:5px;'>";
	if($header!=""){
		$output.="<h2>$header</h2>";
	}
	
	if($content!=""){
		$output.="<p>$content</p>";
	}
	
	$output.="</div>";
	return $output;
}

//zur Darstellung eines select-Elements
//Parameter DB-Verbindung:
//Tabelle aus der die Daten kommen,Feld mit der ID,Feld der Ausgabe
function dropdownDB($db,$table,$id,$ausgabe){
	//ggf Absicherungen
	
	$sql="SELECT $id, $ausgabe FROM $table";
//=$sql="SELECT userID, user from User 
	$stmt=$db->query($sql);

	$output="<select name='$table' class='form-control'>\n";
	while( $row=$stmt->fetch() ){

		$output.="\t<option value='".$row[$id]."'>".$row[$ausgabe]."</option>\n";
        //[ohne] " weil Variable
	}
	$output.="</select>\n";
	
	return $output;
}





?>