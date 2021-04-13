<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
$ordner = "bilder";// weiß, dass es Ordner ist

// Sort in ascending order - this is default, oder mit 0
$bilder = scandir($ordner); //scandir duchsucht Ordner nach dateien, verwandelt es in einen Array

// Sort in descending order
//$b = scandir($ordner,1);

foreach($bilder as $data)
{
    if($data != "." && $data !=".."){ //. & .. ausblenden
    
	echo "<img src='bilder/$data'' width='100'>"; // jedes Element wird angezeigt
	echo "<br>\n";	
    
    }
}
?>
</body>
</html>