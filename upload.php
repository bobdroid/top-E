<?php
// Verkrijg de invoerstroom van de PUT-aanvraag
$input = fopen('php://input', 'r');
// Map waar de afbeeldingen moeten worden opgeslagen (moet schrijfbaar zijn door de server)
$upload_dir = 'uploads/';

// Zorg ervoor dat de upload map bestaat, zo niet, maak deze dan aan
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Bestandsnaam genereren op basis van timestamp (kan worden aangepast naar eigen behoefte)
$target_file = $upload_dir . time() . '.jpg'; // of .png of .gif, afhankelijk van het bestandstype dat wordt geüpload

// Probeer het bestand op te slaan
if (file_put_contents($target_file, $input) !== false) {
    echo "De afbeelding is succesvol geüpload.";
} else {
    echo "Er is een probleem opgetreden tijdens het uploaden van de afbeelding.";
}
?>
