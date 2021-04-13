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
echo session_id();
echo "<br>";
$SESSION["userRole"]=3;//assoziativer Array: Session
    //exit();
$SESSION["userName"]="Mario";
    
echo $SESSION["userRole"];
    echo"<br>";
echo $SESSION["userName"];    
?>
</body>
</html>