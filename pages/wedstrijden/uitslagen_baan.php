<?php include __DIR__ . '/../../includes/header.php'; ?>

<main class="uitslagen-baan">
  <h2>Baanwedstrijden AV Edam</h2>

  <?php
  $uitslagen = [
    "2025" => [
      ["woensdag 2 april 2025", "OJC 1: Coopertest", "https://avedam.nl/index.php?page=wedstrijden&cat=baanwedstrijden_uitslagen&jaar=20240403"],
      ["zondag 13 april 2025", "Lente Werpmeerkamp", ""],
      ["woensdag 16 april 2025", "OJC 2: Avond", ""],
      ["woensdag 21 mei 2025", "OJC 3: Avond", ""],
      ["zondag 8 juni 2025", "Masters Competitie ronde 2", ""],
      ["woensdag 11 juni 2025", "OJC 4: Avond", ""],
      ["maandag 7 juli 2025", "OJC 5: Avond", ""],
      ["woensdag 10 september 2025", "OJC 7: Avond", ""],
    ],
    "2024" => [
      ["woensdag 3 april 2024", "OJC 1: Coopertest", ""],
      ["maandag 15 april 2024", "OJC 2: Avond", ""],
      ["zaterdag 20 april 2024", "Pupillen Competitie ronde 1", ""],
      ["woensdag 22 mei 2024", "OJC 3: Avond", ""],
      ["maandag 17 juni 2024", "OJC 4: Avond", ""],
      ["zaterdag 22 juni 2024", "U14/U16 Competitie ronde 3", ""],
      ["maandag 15 juli 2024", "OJC 5: Avond", ""],
      ["zondag 28 juli 2024", "Care2BFit Bokaal", ""],
      ["maandag 18 september 2024", "OJC 7: Avond", ""],
      ["zondag 6 oktober 2024", "Clubkampioenschappen", ""],
      ["zondag 27 oktober 2024", "Herfst Werpmeerkamp", ""],
    ]
  ];

  foreach ($uitslagen as $jaar => $wedstrijden) {
    echo "<section class='uitslagen-blok'>";
    echo "<h3>Uitslagen $jaar</h3><ul>";
    foreach ($wedstrijden as [$datum, $naam, $url]) {
      echo "<li>";
      echo "<span class='uitslag-datum'>$datum</span>";
      echo "<span class='uitslag-titel'>";
      echo !empty($url)
        ? "<a href='$url' target='_blank'>$naam</a>"
        : htmlspecialchars($naam);
      echo "</span></li>";
    }
    echo "</ul></section>";
  }
  ?>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
