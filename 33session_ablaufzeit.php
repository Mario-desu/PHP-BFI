<?php
session_start();// Werte am Server gespeichert
session_regenerate_id(true);//alte Sessions werden gleich gelöscht, 
//immmer!! und mit true
?>
<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if( isset($_SESSION["zeitpunkt"] ) )     
    
 {   
    
if ($_SESSION["zeitpunkt"] <time() ) 
   {
    echo "abgelaufen";
   }
   else
    {
       echo "ok";
        
    }
    
}
else
   {
       echo "kein Zeitpunkt gesetzt";
   }
   
    
    
$_SESSION["zeitpunkt"]=time()+20;//sek.
    
    
    
?>
</body>
</html>