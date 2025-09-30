<?php
session_start();
if (!isset($_SESSION['gebruiker'])) {
  header('Location: /login.php');
  exit;
}

$pad = __DIR__ . '/../../data/berichten.json';
$berichten = file_exists($pad) ? json_decode(file_get_contents($pad), true) : [];
$id = $_GET['id'] ?? '';
$nieuwBerichten = [];

foreach ($berichten as $b) {
  if ($b['id'] === $id && $b['auteur'] === $_SESSION['gebruiker']) {
    continue; // sla over: dit bericht wordt verwijderd
  }
  $nieuwBerichten[] = $b;
}

file_put_contents($pad, json_encode($nieuwBerichten, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
header("Location: mijnberichten.php");
exit;
