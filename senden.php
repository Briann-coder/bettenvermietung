<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. E-Mail-Adresse des Empfängers (Deine Adresse hier eintragen)
    $empfaenger = "deine-email@beispiel.de"; 
    
    // 2. Betreff der E-Mail
    $betreff = "Neue Buchungsanfrage - Bettenvermietung Stormarn";
    
    // 3. Formulardaten auslesen und bereinigen (Sicherheits-Check)
    $firma    = htmlspecialchars($_POST['firma']);
    $personen = htmlspecialchars($_POST['personen']);
    $zeitraum = htmlspecialchars($_POST['zeitraum']);
    $kontakt  = htmlspecialchars($_POST['kontakt']);
    
    // 4. E-Mail-Inhalt strukturieren
    $text = "Du hast eine neue Anfrage über das Webformular erhalten:\n\n";
    $text .= "Name / Firma: " . $firma . "\n";
    $text .= "Anzahl Personen: " . $personen . "\n";
    $text .= "Gewünschter Zeitraum: " . $zeitraum . "\n";
    $text .= "Kontaktmöglichkeit: " . $kontakt . "\n";
    
    // 5. E-Mail-Header setzen (UTF-8 sorgt für korrekte Umlaute wie ä, ö, ü)
    $header = "From: Formular <no-reply@bettenvermietung-stormarn.de>\r\n";
    $header .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // 6. E-Mail absenden und Nutzer weiterleiten
    if (mail($empfaenger, $betreff, $text, $header)) {
        // Erfolgreich gesendet -> Weiterleitung mit Status-Parameter
        header("Location: index.html?status=success#kontakt");
        exit;
    } else {
        // Fehler beim Senden -> Weiterleitung mit Fehler-Parameter
        header("Location: index.html?status=error#kontakt");
        exit;
    }
}
?>
