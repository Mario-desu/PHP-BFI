<?php
require_once "include/include_db.php";

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
$sql="SELECT * FROM user;";//wenn nicht * nur das was drinnen

$abfrage=$db->query($sql);
//-->"Einkaufen"

//"auspacken" -->:

while( $row=$abfrage->fetch() )
{ //fetch: Daten abfragen
	echo $row["userID"]." ".$row["userName"]." ".$row["userEmail"]; //assoziativer Array
	//echo "$row [userID]."  ".$row [userName]." ".$row [userEmail]"; --> wenn keine Stückelung nötig ist nicht verwenden (z.B. strtoupper)
	echo "<br>";
}
?>
</body>
</html>