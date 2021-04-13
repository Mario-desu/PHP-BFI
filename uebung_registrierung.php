<?php
require_once("include/include_db.php");// Verbindung zur DB
// include, weil es würde abbrechen

?>
<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">

<?php
//Hilfsvariablen
$userName="";//variablen werden beim absenden gefüllt (überschrieben)
$email="";
$password1="";
$password2="";
$zustimmungAGB="";
$zustimmungDatenschutz="";

    
$ok=true;//boolsche Variable
$bericht="";

if(isset($_POST["absenden"]))//erst wenn Absenden gedrückt wird
{
	//Zuweisung an die Variablen
	$userName=strip_tags(  $_POST["userName"]  );//alle tags entfernt, Sicherheit
	$email=$_POST["email"];
	$password1=$_POST["password1"];
	$password2=$_POST["password2"];
	
	//Prüfung ob AGB angehakt
	if(isset($_POST["zustimmungAGB"]))
	{
		$zustimmung=$_POST["zustimmungAGB"];
	}
	else
	{
		$ok=false;
		$bericht .= "Sie müssen den AGB zustimmen!<br>";
	}

    //Prüfung ob Datenschutz angehakt
	if(isset($_POST["zustimmungDatenschutz"]))
	{
		$zustimmung=$_POST["zustimmungDatenschutz"];
	}
	else
	{
		$ok=false;
		$bericht .= "Sie müssen dem Datenschutz zustimmen!<br>";
	}
    
	//Prüfung ob Email
	if(filter_var($email, FILTER_VALIDATE_EMAIL)===false) // false=Datentyp
	{
		$ok=false;
		$bericht .= "Keine gültige email!<br>";
	}

	//Prüfung PW Mind. 8 Zeichen hat
	if(strlen($password1) < 8)
	{
		$ok=false;
		$bericht .= "Das Passwort muss mind 8 Zeichen haben!<br>";
	}
	
	//Prüfung ob PW übereinstimmt
	if($password1<>$password2)
	{
		$ok=false;
		$bericht .= "Das Passwort stimmt nicht überein!<br>";
	}

    // Passwort-Check
    $muster1="/[A-Z]/";// muss vorkommen, egal wo
    $muster2="/[a-z]/";
    $muster3="/[0-9]/";

    if(
    preg_match($muster1,$password1) && 
    preg_match($muster2,$password1) && 
    preg_match($muster3,$password1)  )      
    {
	
    }
    else {
    $ok=false;
    $bericht .="Das Passwort braucht Kleinbuchstabe, Großbuchstabe, Zahl.<br>";
    }    
    
    
    //Prüfung ob Email existiert
    $sql="select * FROM user
    WHERE userEmail=:email";
    
    //wenn jm von außen Daten eingibt, Prepared Stmt, gegen SQL-Injections
    
    $abfrage=$db->prepare($sql);//noch nicht ausführen
    $abfrage->bindParam(":email",$email); //das, was im Formular eingegeben wird,
    // ersetzt den PLatzhalter oben bei $sql, danach prüft es eingegebene Adresse
    $abfrage->execute();// her wird es überprüft
    $row=$abfrage->fetch(); //übernimmt alles von jew. User
    
    
    if($row !==false){//!==  ungleich
        $ok=false;
        $bericht .="Email existiert bereits<br>";
    }
    
    
    
	//Wenn immer noch ok
	if($ok===true)
	{
		$bericht = "GRATULATION! Alles bestens!<br><a href='login.php'>zum Login</a>";
        
        
		//hier kommt dann der DB-Eintrag
        
        //password1 verschlüsseln, beim ablegen wird ein zufälliger Salt enwickelt
        
        
        $options=["cost"=>10]; //wie oft (durch den Fleischwolf)durchlaufen
        $password1=password_hash($password1, PASSWORD_BCRYPT, $options);//überschreiben (was, wie, wie oft)
        
       //Abstand nach user wichtig außer es ist in nächster ZEile 
        $sql="INSERT INTO user 
        (userName,userEmail,userPassword)
        VALUES
        (:name, :email, :password)";//: platzhalter, bei $userName im Formular eingegebenes wird in Kategorie userName etc in DB eingefügt
        
        $abfrage=$db->prepare($sql);
        $abfrage->bindParam(":name",$userName); 
        $abfrage->bindParam(":email",$email);
        $abfrage->bindParam(":password",$password1);
        $abfrage->execute();
       
    
		//entleerung des Formulars
		$userName="";
		$userVorname="";
		$email="";
		$password1=""; 
		$password2="";
		$zustimmung="";
		
	}

}


echo $bericht;
    
//Formular erscheint wieder nach absenden        
?>
<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);   ?>" method="post">
Ihr Zuname:<br>
<input type="text" name="userName" value="<?php echo $userName; ?>"><br> <!--value, damit eingegebens drinne bleibt-->
email:<br>
<input type="email" name="email" value="<?php echo $email; ?>"><br>
<br>
Passwort:<br>
<input type="password" name="password1" value="<?php echo $password1; ?>"><br>
<br>
Passwort wiederholen:<br>
<input type="password" name="password2" value="<?php echo $password2; ?>"><br>
<br>

<input type="checkbox" name="zustimmungAGB" value="ok"<?php if($zustimmungAGB=="ok") { echo "checked"; } ?>>ich stimme den AGB zu<br>
    
<input type="checkbox" name="zustimmungDatenschutz" value="ok"<?php if($zustimmungDatenschutz=="ok") { echo "checked"; } ?>>ich stimme dem Datenschutz zu<br>


<br>
<input type="submit" name="absenden" value="absenden"><br>

</form>
</div>
</body>
</html>