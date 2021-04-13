<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
if(isset($_POST["senden"]))
{
	
	/* Auswahl der Pizza */
   if ($_POST["ptyp"] == "Napoli")
      $preis = 5.7;
   else if ($_POST["ptyp"] == "Italia")
      $preis = 6.3;
   else if ($_POST["ptyp"] == "Con Tutto")
      $preis = 7.1;
   else if ($_POST["ptyp"] == "4 Stagioni")
      $preis = 6.6;
    else if ($_POST["ptyp"] == "Diavolo")
      $preis = 7.30;
   else
      $preis = 7.8;

   /* Anrede */
   if ($_POST["anr"] == "Herr")
      echo "<p>Sehr geehrter Herr " . $_POST["bst"] . "<br />";
   else
      echo "<p>Sehr geehrte Frau " . $_POST["bst"] . "<br />";

   /* Ausgabe */
   echo "Vielen Dank für Ihre Bestellung</p>";
   echo "<p>Wir liefern Ihre Pizza " . $_POST["ptyp"];

   /* Zusätze */
   if (isset($_POST["cth"]))
   {
      echo " mit " . $_POST["cth"];
      $preis = $preis + 0.6;
   }
   if (isset($_POST["cek"]))
   {
      echo " mit " . $_POST["cek"];
      $preis = $preis + 1.1;
   }
   if (isset($_POST["rk"]))
   {
      echo " mit " . $_POST["rk"];
      $preis = $preis + 1.5;
   }    

   echo "<br />um ".$_POST["uhrzeit"]." an die folgende Adresse:<br />";
   echo $_POST["adr"] . "</p>";
   echo "<p>Der Preis beträgt $preis &euro;</p>";
   echo "<p>Ihr Pizza-Team</p>";
}




?>
  
    
    
    
    
    
    

</body>
</html>
    
    