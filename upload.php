<?php
// Controleer of er daadwerkelijk een bestand is geüpload
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Map waar de afbeeldingen moeten worden opgeslagen (moet schrijfbaar zijn door de server)
    $upload_dir = 'uploads/';

    // Zorg ervoor dat de upload map bestaat, zo niet, maak deze dan aan
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Verplaats het geüploade bestand naar de juiste map
    $temp_file = $_FILES['image']['tmp_name'];
    $target_file = $upload_dir . basename($_FILES['image']['name']);

    if (move_uploaded_file($temp_file, $target_file)) {
        echo "De afbeelding is succesvol geüpload.";
    } else {
        echo "Er is een probleem opgetreden tijdens het uploaden van de afbeelding.";
    }
} else {
    echo "Er is een fout opgetreden tijdens het uploaden van de afbeelding.";
}
?>
