<?php
require_once "include/include_db.php"; // iVerbindungmmer am Anfang des Scripts

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
$sql="SELECT * FROM user ORDER BY userName ASC";//wenn nicht * nur das was drinnen

$abfrage=$db->query($sql);
echo "<ul>";
//-->"Einkaufen"

//"auspacken" -->:
echo "<ul>";
while( $row=$abfrage->fetch() )
{ //fetch: Daten abfragen
	
	echo "<li>$row[userID] $row[userName] $row[userEmail]</li>"; //vor [] kein Abstand
	echo "<br>";
}
echo "</ul>";
?>
</body>
</html>