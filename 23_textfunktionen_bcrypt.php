<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
$text="Hallo";

$options = [
    'cost' => 14, // 14 Durchgänge, wenn nicht angegeben -> Standard=10
];
echo password_hash($text, PASSWORD_BCRYPT, $options);//password_hash-für Passwörter abspeichern, jedesmal wird anderer salt kreiert und gespeichert

echo "<br>\n";

//exit();    
    
$options = [
    'cost' => 14,
];
echo password_hash($text, PASSWORD_BCRYPT, $options); // PASSWORD_BCRYPT, vordefinierte Konstante erzeugt Password-Hashes

echo "<br>\n";
echo "<br>\n";



//HINWEIS: Die beiden unterschiedlichen Ausgaben kopieren und in diese Variablen speichern
// $ ggf mit \ maskieren!!


$aaaa="$2y$14\$qFj4RWpG7UPXwHDGgjxL4eESQ3oIRMlFmy93foOMcnLmWq41OOcdu"; //$2y$14 -->14 mal durchgelaufen, nach Registrierung von Kunden steht es so drinnen
$bbbb="$2y$14\$gG7OCknaJ/vID/F3Xkc7keZ2jLUlg3iSq73VQCTdrf2Fn56q4jFwm";

    
//auflösen    
if (password_verify($text, $aaaa)) {//spielt mit password_hash zusammen, wird überprüft mit Datenbank, ob eingebenes Passwort $text mit $aaaa übereinstimmt
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
echo "<br>\n";

if (password_verify($text, $bbbb)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}


?>
</body>
</html>



























