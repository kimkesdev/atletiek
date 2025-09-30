<?php
session_start();
if (!isset($_SESSION['gebruiker'])) {
  header('Location: /login.php');
  exit;
}

$pad = __DIR__ . '/../../data/berichten.json';
$catPad = __DIR__ . '/../../data/categorieen.json';

$berichten = file_exists($pad) ? json_decode(file_get_contents($pad), true) : [];
$categorieen = file_exists($catPad) ? json_decode(file_get_contents($catPad), true) : [];

$id = $_GET['id'] ?? '';
$bericht = null;

foreach ($berichten as $b) {
  if ($b['id'] === $id && $b['auteur'] === $_SESSION['gebruiker']) {
    $bericht = $b;
    break;
  }
}

if (!$bericht) {
  echo "Bericht niet gevonden of je hebt geen rechten om dit te bewerken.";
  exit;
}

// Formulier verwerken
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nieuwTitel = $_POST['titel'] ?? '';
  $nieuwInhoud = $_POST['inhoud'] ?? '';
  $nieuwCategorie = $_POST['categorie'] ?? $bericht['categorie'];
  $nieuwAfbeelding = $bericht['afbeelding'] ?? '';

  // Afbeelding uploaden
  if (isset($_FILES['afbeelding']) && $_FILES['afbeelding']['error'] === UPLOAD_ERR_OK) {
    $uploadPad = __DIR__ . '/../../uploads/';
    if (!is_dir($uploadPad)) {
      mkdir($uploadPad, 0777, true);
    }
    $bestandsnaam = uniqid() . '_' . basename($_FILES['afbeelding']['name']);
    $volledigPad = $uploadPad . $bestandsnaam;
    if (move_uploaded_file($_FILES['afbeelding']['tmp_name'], $volledigPad)) {
      $nieuwAfbeelding = 'uploads/' . $bestandsnaam;
    }
  }

  foreach ($berichten as &$b) {
    if ($b['id'] === $id && $b['auteur'] === $_SESSION['gebruiker']) {
      $b['titel'] = $nieuwTitel;
      $b['inhoud'] = $nieuwInhoud;
      $b['categorie'] = $nieuwCategorie;
      $b['afbeelding'] = $nieuwAfbeelding;
      break;
    }
  }

  file_put_contents($pad, json_encode($berichten, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  header("Location: mijnberichten.php");
  exit;
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>

<main class="bewerken-form">
  <p><a href="mijnberichten.php" class="mijn-button">← Terug naar mijn berichten</a></p>
  <h2>✏️ Bericht bewerken</h2>

  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titel">Titel:</label>
      <input type="text" name="titel" id="titel" value="<?= htmlspecialchars($bericht['titel']) ?>" required>
    </div>

    <div class="form-group">
      <label for="inhoud">Inhoud:</label>
      <textarea name="inhoud" id="inhoud" rows="8" required><?= htmlspecialchars($bericht['inhoud']) ?></textarea>
    </div>

    <div class="form-group">
      <label for="categorie">Categorie:</label>
      <select name="categorie" id="categorie" required>
        <option value="">-- Kies een categorie --</option>
        <?php
        foreach ($categorieen as $cat) {
          $selected = ($bericht['categorie'] ?? '') === $cat ? 'selected' : '';
          echo "<option value=\"" . htmlspecialchars($cat) . "\" $selected>" . htmlspecialchars($cat) . "</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="afbeelding">Afbeelding uploaden:</label>
      <input type="file" name="afbeelding" id="afbeelding" accept="image/*">
      <?php if (!empty($bericht['afbeelding'])): ?>
        <p><em>Huidige afbeelding:</em><br>
        <img src="/<?= htmlspecialchars($bericht['afbeelding']) ?>" alt="Huidige afbeelding" style="max-width:200px; margin-top:10px;"></p>
      <?php endif; ?>
    </div>

    <div class="form-buttons">
      <input type="submit" value="Opslaan">
      <a href="mijnberichten.php" class="annuleer-button">Annuleren</a>
    </div>
  </form>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
