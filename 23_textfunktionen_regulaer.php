<!DOCTYPE html>
<html>
<head>
	<title>Schulung</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
//muss vorkommen, ersetzten, kürzen
    
    //RegAusdruck.pdf haben wir bekommen
    
    
$muster="/H.nd/";//. sagt es muss ein Zeichen sein, Vorschrift (Muster/pattern)
$text="H5nd"; //Hund würde passen, Haende aber nicht

if(preg_match($muster,$text)) //Vorschrift (Muster)
{
	echo "passt<br>";	
}


// Passwort-Check
$muster1="/[A-Z]/";// muss vorkommen, egal wo
$muster2="/[a-z]/";
$muster3="/[0-9]/";
$muster4="/[!?%#\.]/";    //. maskieren mit \
$text="1xAc11!";

    //$musterMain="/
    
if(
preg_match($muster1,$text) && // (auf welches Muster prüfen, auf was prüfen)
preg_match($muster2,$text) && 
preg_match($muster3,$text) &&
preg_match($muster4,$text)
    )
{
	echo "Passwort passt<br>";	
}
echo "<br>\n";

    
    
    
// Dateiendungen testen nur .jpeg,.jpg,.gif und .png am Ende erlaubt
//egal, ob groß oder klein geschrieben
    
$muster="/\.(jpe?g|gif|png)$/i";
// i= egal ob groß/klein, // was dazwischen, ist Muster, Punkt als Zeichen mit \maskiert
// $ definiert, es muss am Ende stehen, ? der davorstehende Buchstabe muss nicht davorstehen    
$text="ROM.jpg";

if(preg_match($muster,$text))
{
	echo "Dateiendung passt<br>";	
}
echo "<br>\n";

//Alle Zeichen entfernen die NICHT Buchstaben _ - Zahlen sind
$text="Alles-<w@ird>-1!3'[3-g]ut";
$text=preg_replace("/[^A-Za-z0-9_-]/", '', $text);//(was,wodurch,welcher Text)
// ^ sagt alles außer......, Rest wird ersetzt mit 'was hier drinnen ist'
// bzw '' (nichts)
echo $text;
echo "<br>\n";

// Groß-Kleinschreibung
$zeichenkette = "Dies IST ein kleines Beispiel und es ist doof";
$suchmuster = "/ist/i"; 
$ersetzung = "war";
echo preg_replace($suchmuster, $ersetzung, $zeichenkette);
echo "<br>\n";
    

//Suchergebnisse highlighten
$text = "Gandalf und Alfred halfen dem ALF beim Schakalfang";
$suche="alf";
//$0 bezieht sich auf den Teil des Textes, der mit dem Suchmuster übereinstimmt.
$text = preg_replace("/$suche/i","<span style='background:yellow;'>$0</span>",$text);
/* $0 (Sondervariable), sorgt dafür das Text ersetzt werden, Groß/Kleinschreibung bleibt aber erhalten*/
echo $text;
echo "<br>\n";

$beschreibung="001011507,1023449,1098765        XY/000012345 ZZAUYYYYX AT323345063431843 ";

//Lfd Kto-Eintrag wird mit Hilfe eines "Regulären Ausdrucks
//in eine eigene Variable "extrahiert"
    //Leerzeichen Großb Großb / Zahl(0mal)
    
//müssen wir jetzt nicht vertiefen    
$suchmuster = "/[ ][A-Z][A-Z]\/[0-9]{9}/";// /maskiert mit\

preg_match($suchmuster,
	$beschreibung, $matches[0]);
$laufendeNr = $matches[0][0];
echo $laufendeNr =  trim($laufendeNr);
?>
</body>
</html>



























