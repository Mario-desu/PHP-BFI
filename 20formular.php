<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<!--Formular für Eingabe:-->

<form method="post" action="21post.php"> <!-- immer post (sonst wird es get)-->
Username: <br>
<input type="text" name="user"><br> <!-- name, für POST zuweisen -->
Password: <br>
<input type="password" name="pw"><br>
<?php
$rolle=["Admin","Gast","User","Lieferant"];
echo "<select name='rolle'>";
foreach($rolle as $element)//foreach, geht jedes Element durch
{
		echo "<option>$element</option>";
}
echo "</select>";

?>




<input type="submit" name="senden" value="Formular senden">
</form>
<br>
<a href="22get.php?seite=3&user=Andreas">zur Get-Seite</a> 


</body>
</html>