<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//Folgendes wird auf Zielseite nach nach Formulareingabe:     
    
$user=htmlspecialchars ($_POST ["user"]); //post muss groß sein, () wegen htmlspecialchars
$pw=htmlspecialchars ($_POST ["pw"]);
$rolle=htmlspecialchars ($_POST ["rolle"]);
//htmlspecialchars:  Wandelt Sonderzeichen in die entsprechenden HTML-Zeichen um.
echo $user;
echo "<br>";
echo $pw;
echo "<br>";
echo $rolle;

?>
    
<!--$_POST [“name“] - Name muss angegeben werden. 
Wenn man etwas im Formular eingibt im Formular bei <input> mit gleichen „name“ wird auf Zielseite das Eingegebene hier angezeigt. 
Auf Zielseite ECHO für jede Variable. Siehe oben: echo $user; .......  
Für Formulare immer POST-->    
    
</body>
</html>