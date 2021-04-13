<?php
session_start();
session_regenerate_id(true);
//Wenn session leer (niemand angelmeldet), dann Weiterleitung zum Logout
if( empty(  $_SESSION["userID"]  ) ){
     header("location:logout.php");
}
//Überprüfung der Rolle, mit Userole 2 kommt man in Adminbereich,
//sonst fliegt man raus
//if(  ( $_SESSION["userRole"] <2 ){
//    header("location:logout.php");
//}
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
echo "Willkommen $_SESSION[userName] <br>";
?>
    <a href="logout.php">abmelden</a>
<?php
    if ( $_SESSION["userRole"] >1 ) {
        echo "<a href='53_artikel_wartung.php'>Adminbereich</a>";
    }
       
?>
    
</body>
</html>