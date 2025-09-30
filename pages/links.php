<?php include __DIR__ . '/../includes/header.php'; ?>

<h2>Linkjes A.V. Edam</h2>

<div class="link-grid">
  <?php
  $linkgroepen = [
    "Verenigingen" => [
      ["Atletiekverenigingen Pagina", "#"],
      ["NEA Volharding", "#"],
      ["Monnickendam", "#"],
      ["A.C. Waterland", "#"],
      ["Hollandia", "#"],
      ["Loopgroep Hoorn", "#"],
      ["ATOS", "#"]
    ],
    "Organisaties" => [
      ["Atletiekunie", "#"],
      ["EAA – European Athletic Ass.", "#"],
      ["IAAF", "#"],
      ["WMA (Veteranen)", "#"],
      ["International Marathons", "#"],
      ["VAL (België)", "#"]
    ],
    "Verenigingen Edam/Volendam" => [
      ["Athlon", "#"],
      ["De Beukers", "#"],
      ["Mauritius", "#"],
      ["Sportkoepel Edam-Volendam", "#"],
      ["Sportcentrum Atlas", "#"],
      ["Sportcentrum Toptraining", "#"]
    ],
    "Wegwedstrijden" => [
      ["Marathon Rotterdam", "#"],
      ["Marathon Amsterdam", "#"],
      ["Dam tot Damloop", "#"],
      ["Halve van Egmond", "#"],
      ["Groet uit Schoorl", "#"]
    ],
    "Indoor" => [
      ["Apeldoorn", "#"],
      ["Dortmund", "#"],
      ["Gent", "#"],
      ["Wedstrijdoverzicht Indoor", "#"]
    ],
    "Crossen" => [
      ["Districtscrossen Noord-Holland", "#"],
      ["Warandeloop", "#"],
      ["Kerstcross Opmeer", "#"],
      ["Sylvestercross", "#"],
      ["Crosscup Brussel", "#"]
    ],
    "Regionale Bladen" => [
      ["Nieuws Edam-Volendam", "#"],
      ["Stadskrant", "#"],
      ["Nieuw Volendam", "#"],
      ["Noordhollands Dagblad", "#"],
      ["Webregio", "#"]
    ],
    "Atletieksites" => [
      ["Losse Veter", "#"],
      ["Runnersweb", "#"],
      ["Overzicht spikes", "#"],
      ["Bewegende beelden onderdelen", "#"]
    ],
    "Sportmerken" => [
      ["Adidas", "#"],
      ["Asics", "#"],
      ["New Balance", "#"],
      ["Nike", "#"],
      ["Saucony", "#"]
    ]
  ];

  foreach ($linkgroepen as $titel => $links) {
    echo "<div class='link-card'>";
    echo "<h3>$titel</h3><ul>";
    foreach ($links as [$naam, $url]) {
      echo "<li><a href='$url' target='_blank'>$naam</a></li>";
    }
    echo "</ul></div>";
  }
  ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
