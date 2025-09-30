<?php
session_start();
if (!isset($_SESSION['gebruiker'])) {
  header('Location: /login.php');
  exit;
}

$catPad = __DIR__ . '/../../data/categorieen.json';
$categorieen = file_exists($catPad) ? json_decode(file_get_contents($catPad), true) : [];
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>

<main class="nieuws-form">
  <p><a href="mijnberichten.php" class="mijn-button">← Al mijn berichten</a></p>
  <h2>📝 Nieuw bericht toevoegen</h2>

  <form method="POST" action="verwerk_bericht.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titel">Titel:</label>
      <input type="text" name="titel" id="titel" required>
    </div>

    <div class="form-group">
      <label for="inhoud">Inhoud:</label>
      <textarea name="inhoud" id="inhoud" rows="6" required></textarea>
    </div>

    <div class="form-group">
      <label for="categorie">Categorie:</label>
      <select name="categorie" id="categorie" required>
        <option value="">-- Kies een categorie --</option>
        <?php
        foreach ($categorieen as $cat) {
          echo "<option value=\"" . htmlspecialchars($cat) . "\">" . htmlspecialchars($cat) . "</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="afbeelding">Afbeelding uploaden:</label>
      <input type="file" name="afbeelding" id="afbeelding" accept="image/*">
    </div>

    <div class="form-group">
      <input type="submit" value="Bericht toevoegen">
    </div>
  </form>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
