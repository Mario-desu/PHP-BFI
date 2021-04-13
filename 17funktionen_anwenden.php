 <?php
require_once "include/include_functions.php";
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
echo "Personen:".displayselect ("personen", 10);
echo "<br>\n";
echo "Autos:".displayselect ("autos", 10);
echo "<br>\n";
echo "Kinder".displayselect ("kinder", 5);    
echo "<br>\n";
echo "Hunde".displayselect ("hunde", 6);     

?>
</body>
</html>
