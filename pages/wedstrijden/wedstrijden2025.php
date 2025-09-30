<?php include __DIR__ . '/../../includes/header.php'; ?>

<?php
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

<main class="wedstrijd-overzicht">
  <h2>Wedstrijden 2025</h2>
  <table class="wedstrijd-tabel">
    <thead>
      <tr>
        <th>Datum</th>
        <th>Wedstrijd</th>
        <th>Locatie</th>
        <th>Plaats</th>
        <th>Aanvang</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $wedstrijdenPad = __DIR__ . '/../../data/wedstrijden2025.json';
      if (file_exists($wedstrijdenPad)) {
        $wedstrijden = json_decode(file_get_contents($wedstrijdenPad), true);
        foreach ($wedstrijden as $w) {
          $datumNL = formatDatumNederlands($w['datum']);
          echo "<tr>";
          echo "<td data-label='Datum'>$datumNL</td>";
          echo "<td data-label='Wedstrijd'>{$w['naam']}</td>";
          echo "<td data-label='Locatie'>{$w['locatie']}</td>";
          echo "<td data-label='Plaats'>{$w['plaats']}</td>";
          echo "<td data-label='Aanvang'>{$w['aanvang']}</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Geen wedstrijdgegevens gevonden.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
