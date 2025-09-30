<?php include __DIR__ . '/includes/header.php'; ?>

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

<main class="homepage">

  <!-- Aankomende Wedstrijden -->
  <section class="wedstrijden-banner">
    <h2>Aankomende Wedstrijden</h2>
    <div class="wedstrijden-lijst">
      <ul>
        <?php
        $wedstrijdenPad = __DIR__ . '/data/wedstrijden2025.json';
        $wedstrijden = file_exists($wedstrijdenPad) ? json_decode(file_get_contents($wedstrijdenPad), true) : [];
        $vandaag = date('Y-m-d');
        $getoond = 0;

        foreach ($wedstrijden as $w) {
          if ($w['datum'] >= $vandaag && $getoond < 3) {
            $datumNL = formatDatumNederlands($w['datum']);
            echo "<li><strong>$datumNL:</strong> {$w['naam']}</li>";
            $getoond++;
          }
        }
        ?>
      </ul>
    </div>

    <div class="wedstrijd-knoppen">
      <a href="/pages/wedstrijden/wedstrijden2025.php" class="wedstrijd-button">Alle wedstrijden van 2025</a>
    </div>
  </section>

  <!-- Nieuwsberichten -->
  <section class="berichten-sectie">
    <h2>Laatste Nieuws</h2>
    <div class="berichten-grid">
      <?php
      $berichtenPad = __DIR__ . '/data/berichten.json';
      $berichten = [];
      if (file_exists($berichtenPad)) {
        $inhoud = file_get_contents($berichtenPad);
        $decoded = json_decode($inhoud, true);
        if (is_array($decoded)) {
          $berichten = $decoded;
        }
      }

      $teller = 0;
      foreach ($berichten as $bericht) {
        if ($teller >= 4) break;

        $id = htmlspecialchars($bericht['id']);
        $titel = htmlspecialchars($bericht['titel']);
        $datum = isset($bericht['datum']) ? formatDatumNederlands($bericht['datum']) : '';
        $categorie = isset($bericht['categorie']) ? htmlspecialchars($bericht['categorie']) : 'Onbekend';
        $tekst = isset($bericht['inhoud']) ? strip_tags($bericht['inhoud']) : '';
        $kort = implode(' ', array_slice(explode(' ', $tekst), 0, 40)) . '...';

        echo "<div class='bericht-blok'>";
        echo "<h3>$titel</h3>";
        echo "<p class='datum'>$datum</p>";
        echo "<p class='categorie-label'>Categorie: $categorie</p>";
        echo "<p>$kort</p>";
        echo "<a href='/pages/berichten/nieuws.php?id=$id' class='lees-meer'>Lees verder</a>";
        echo "</div>";

        $teller++;
      }
      ?>
    </div>

    <?php if (count($berichten) > 4): ?>
      <div class="nieuws-knop">
        <a href="/pages/berichten/nieuws.php" class="wedstrijd-button">Alle nieuwsberichten</a>
      </div>
    <?php endif; ?>
  </section>

  <!-- Sponsoren -->
  <section class="sponsoren-sectie">
    <h2>Onze sponsoren</h2>
    <div class="sponsoren-grid">
      <?php
      $sponsoren = [
        [
          'naam' => 'Schildersbedrijf Lautenschutz',
          'adres' => 'Anjelierenstraat 30<br>1131HN Volendam',
          'tel' => '06-13227249',
          'mail' => 'schildersbedrijflautenschutz@gmail.com',
          'img' => 'schildersbedrijflautenschutz.jpg',
          'link' => ''
        ],
        [
          'naam' => 'Kivo plastic verpakkingen',
          'adres' => 'Julianaweg 194-202<br>1131 DL Volendam',
          'tel' => '0299 398800',
          'mail' => 'info@kivo.nl',
          'img' => 'kivo.gif',
          'link' => 'https://www.kivo.nl'
        ],
        [
          'naam' => 'Body Results',
          'adres' => 'Pieterman 9<br>1131 PW Volendam',
          'tel' => '06 52331323',
          'mail' => 'info@bodyresults.nl',
          'img' => 'body-results.gif',
          'link' => 'https://www.bodyresults.nl/'
        ],
        [
          'naam' => 'Oog Edam',
          'adres' => 'Damplein 6<br>1135 BK Edam',
          'tel' => '0299 315057',
          'mail' => 'oogcontact@oogedam.nl',
          'img' => 'oogedam.gif',
          'link' => 'http://www.oogedam.nl'
        ],
        [
          'naam' => 'Rabobank Waterland en Omstreken',
          'adres' => 'Christiaan van Abkoudestraat 1<br>1132 AA Volendam',
          'tel' => '',
          'mail' => '',
          'img' => 'rabobank.jpg',
          'link' => 'https://www.rabobank.nl/lokale-bank/waterland-en-omstreken'
        ],
        [
          'naam' => 'Intersport Theo Tol',
          'adres' => 'De Stient 20 / Julianaweg 86<br>1131 ZD Volendam',
          'tel' => '0299-714234',
          'mail' => 'info@theotol.nl',
          'img' => 'theo_tol_logo.gif',
          'link' => 'http://www.intersport-theotol.nl'
        ],
        [
          'naam' => 'Profile Tyrecenter Frikee',
          'adres' => 'Hamerstraat 7e<br>1135 GA Edam',
          'tel' => '0299-373099',
          'mail' => 'edam@profile.nl',
          'img' => 'frikkee.jpg',
          'link' => 'http://www.frikkee.nl'
        ]
      ];

      foreach ($sponsoren as $sponsor) {
        echo "<div class='sponsor-kaart'>";
        if ($sponsor['link']) {
          echo "<a href='{$sponsor['link']}'><img src='/assets/images/sponsoren/{$sponsor['img']}' alt='{$sponsor['naam']}'></a>";
        } else {
          echo "<img src='/assets/images/sponsoren/{$sponsor['img']}' alt='{$sponsor['naam']}'>";
        }
        echo "<div class='sponsor-info'>";
        echo "<h3>";
        echo $sponsor['link'] ? "<a href='{$sponsor['link']}'>{$sponsor['naam']}</a>" : $sponsor['naam'];
        echo "</h3>";
        echo "<p>{$sponsor['adres']}</p>";
        if ($sponsor['tel']) echo "<p>&#9742; {$sponsor['tel']}</p>";
        if ($sponsor['mail']) echo "<p>&#9993; <a href='mailto:{$sponsor['mail']}'>{$sponsor['mail']}</a></p>";
        echo "</div></div>";
      }
      // Leeg kaartje
      echo "<div class='sponsor-kaart leeg'>";
      echo "<h3>Word jij ook onze sponsor?</h3>";
      echo "<p>Laat jouw naam hier stralen tussen onze partners.</p>";
      echo "<p><a href='/organisatie/contacten.php'>Neem contact met ons op</a></p>";
      echo "</div>";

      ?>
    </div>
  </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
