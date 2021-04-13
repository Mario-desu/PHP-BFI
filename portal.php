<?php
session_start();
session_regenerate_id(true);
//Wenn session leer (niemand angelmeldet), dann Weiterleitung zum Logout
if( empty(  $_SESSION["userID"]  ) ){
     header("location:logout.php");//wenn man ausgeloggt wird, landet man wieder beim LOgin
}
//require_once("include/include_db.php");
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
echo "Willkommen $_SESSION[userName]<br>";

    
echo "<a href='logout.php'>abmelden</a>";
echo "<br>\n";   
    if ( $_SESSION["userRole"] >1 ) {
        echo "<a href='admin.php'>Adminbereich</a>";
    }
echo "<br>\n";      
echo "<a href='shop.php'>zum Shop</a>";    
    
?>
    
</body>
</html>