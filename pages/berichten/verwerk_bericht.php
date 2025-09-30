<?php
session_start();
if (!isset($_SESSION['gebruiker'])) {
  header('Location: /login.php');
  exit;
}

function maakSlug($tekst) {
  $tekst = strtolower(trim($tekst));
  $tekst = preg_replace('/[^a-z0-9]+/i', '-', $tekst);
  return trim($tekst, '-');
}

$titel = $_POST['titel'];
$inhoud = $_POST['inhoud'];
$datum = date('Y-m-d\TH:i');
$afbeeldingPad = "";
$auteur = $_SESSION['gebruiker'];

// Afbeelding uploaden
if (isset($_FILES['afbeelding']) && $_FILES['afbeelding']['error'] === UPLOAD_ERR_OK) {
  $extensie = pathinfo($_FILES['afbeelding']['name'], PATHINFO_EXTENSION);
  $bestandsnaam = uniqid('img_') . '.' . $extensie;
  $doelmap = __DIR__ . '/../assets/images/berichten/';
  $volledigPad = $doelmap . $bestandsnaam;

  if (move_uploaded_file($_FILES['afbeelding']['tmp_name'], $volledigPad)) {
    $afbeeldingPad = 'assets/images/berichten/' . $bestandsnaam;
  }
}

$slug = maakSlug($titel);

$nieuwBericht = [
  'id' => $slug,
  'titel' => $titel,
  'inhoud' => $inhoud,
  'datum' => $datum,
  'afbeelding' => $afbeeldingPad,
  'auteur' => $auteur
];

$bestand = __DIR__ . '/../data/berichten.json';
$huidigeData = file_exists($bestand) ? json_decode(file_get_contents($bestand), true) : [];
array_unshift($huidigeData, $nieuwBericht);
file_put_contents($bestand, json_encode($huidigeData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header("Location: nieuws.php?id=$slug");
exit;
