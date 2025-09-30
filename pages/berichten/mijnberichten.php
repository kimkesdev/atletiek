<?php
session_start();
if (!isset($_SESSION['gebruiker'])) {
  header('Location: /login.php');
  exit;
}

include __DIR__ . '/../../includes/header.php';

function formatDatumNederlands($datumString) {
  $dagen = ['Sunday'=>'Zondag','Monday'=>'Maandag','Tuesday'=>'Dinsdag','Wednesday'=>'Woensdag','Thursday'=>'Donderdag','Friday'=>'Vrijdag','Saturday'=>'Zaterdag'];
  $maanden = ['January'=>'januari','February'=>'februari','March'=>'maart','April'=>'april','May'=>'mei','June'=>'juni','July'=>'juli','August'=>'augustus','September'=>'september','October'=>'oktober','November'=>'november','December'=>'december'];

  $timestamp = strtotime($datumString);
  $dagEngels = date('l', $timestamp);
  $dag = $dagen[$dagEngels];
  $dagNummer = date('j', $timestamp);
  $maandEngels = date('F', $timestamp);
  $maand = $maanden[$maandEngels];

  return "$dag $dagNummer $maand";
}
?>

<main class="mijn-berichten">
  <h2>Mijn nieuwsberichten</h2>
  <p><a href="nieuwbericht.php" class="nieuw-button">➕ Nieuw bericht maken</a></p>

  <table class="mijnberichten-tabel">
    <thead>
      <tr>
        <th>Datum</th>
        <th>Titel</th>
        <th>Acties</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $pad = __DIR__ . '/../../data/berichten.json';
      $berichten = [];
      if (file_exists($pad)) {
        $inhoud = file_get_contents($pad);
        $decoded = json_decode($inhoud, true);
        if (is_array($decoded)) {
          $berichten = array_filter($decoded, fn($b) => $b['auteur'] === $_SESSION['gebruiker']);
        }
      }

      if (empty($berichten)) {
        echo "<tr><td colspan='3'>Je hebt nog geen nieuwsberichten geplaatst.</td></tr>";
      } else {
        foreach ($berichten as $bericht) {
          $id = htmlspecialchars($bericht['id']);
          $titel = htmlspecialchars($bericht['titel']);
          $datum = isset($bericht['datum']) ? formatDatumNederlands($bericht['datum']) : '';

          echo "<tr>";
          echo "<td>$datum</td>";
          echo "<td>$titel</td>";
          echo "<td>
                  <a href='bewerken.php?id=$id' class='actie-link'>✏️ Bewerken</a> |
                  <a href='verwijderen.php?id=$id' class='actie-link' onclick=\"return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');\">🗑️ Verwijderen</a>
                </td>";
          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
