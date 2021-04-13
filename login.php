<?php
session_start();
session_regenerate_id(true);
require_once "include/include_db.php";

if(  isset(  $_POST["senden"]  )  )
{
    //Prüfung auf Email
    if( filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL ) !==false)
        // wenn nicht false, dann sinnvoller Inhalt
        
    {//Prüfung ob user existiert
    $sql="select * FROM user
    WHERE userEmail=:email AND userRole>=1"; 
    
    //wenn jm von außen Daten eingibt, Prepared Stmt
    
    $abfrage=$db->prepare($sql);
    $abfrage->bindParam(":email", $_POST["email"]); //"post" 
        //ersetzt durch $email
        //bist du e-mail?
    $abfrage->execute();
    $row=$abfrage->fetch(); 
        
    //wenn der User existiert machen wir das:
    
    if($row !==false){
        
        //Password-Check
        
        if(  password_verify( $_POST["password"],  $row["userPassword"])  )
    {
            //User erkannt
            $_SESSION["userID"]=$row["userID"];
            $_SESSION["userName"]=$row["userName"];
            $_SESSION["userRole"]=$row["userRole"];
            //Weiterleitung
            header("location:portal.php");
        
    }//PW-Ende
        
    }//Prüfung User Ende
        
        
        //mit echo "ok"; dazwischen prüfen
    }//filter Email Ende
    
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
<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" method="post">
email:<br><input type="email" name="email"><br>
password:<br><input type="password" name="password"><br>
<input type="submit" name="senden">
</form>
    
    
    
</body>
</html>