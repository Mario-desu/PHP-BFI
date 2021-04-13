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
<h2>Pizza Bestellung</h2>
<form  method = "post" action="pizza.php">
   <p><input name="bst" /> Name</p>
   <p><input name="adr" /> Adresse</p>
   <p>
   <input type="radio" name="anr" value="Herr" > Herr <br />
   <input type="radio" name="anr" value="Frau" > Frau</p>
   <p>
   <select name="uhrzeit">
   <?php
   
   for ($stunde = 8; $stunde < 20; $stunde++) {
	   
		
	  for ($minuten = 0; $minuten < 60; $minuten+=15) { 


		$anzeigeStunden=str_pad($stunde,2,0,STR_PAD_LEFT);
		$anzeigeMinuten=str_pad($minuten,2,0,STR_PAD_LEFT);
        //str_pad($minuten,2,0,STR_PAD_LEFT); Funktion um eine Zahl oder String zu 
        //"verlängern". Hier damit es immer 2-stellig ist, z.b: 9 wird eine 0 //vorangestellt, pad_left (auf der linken Seite)  
	  
		echo "<option>$anzeigeStunden : $anzeigeMinuten</option>\n";  
	  }  
	 
	} 
   ?>
   </select> Uhrzeit<p>
   
   
   
   
   <p><select name="ptyp">
      <option value="Napoli" selected="selected">Napoli (5,70 &euro;)</option>
      <option value="Italia">Italia (6,30 &euro;)</option>
      <option value="Con Tutto">Con Tutto (7,10 &euro;)</option>
      <option value="4 Stagioni">4 Stagioni (6,60 &euro;)</option>
      <option value="Mozzarella">Mozzarella (7,80 &euro;)</option>
      <option value="Diavolo"> Diavolo (7,30 &euro;)</option>       
       <!-- value - was dann angezeigt wird im Text--> 
   </select></p>
   <p>
    <input type="checkbox" name="cth" value="Extra Knoblauch" /> Extra Knoblauch (Aufpreis 0,60 &euro;)<br />
    <input type="checkbox" name="cek" value="Extra Käse" /> Extra Käse (Aufpreis 1,10 &euro;)<br />
    <input type=checkbox name="rk" value="Rand mit Käse" /> Rand mit Käse (Aufpreis 1,50)</p>
   <p><input type = "submit" name="senden" />
   <input type = "reset" /></p>
</form>

</div>	
</body>
</html>