<?php include __DIR__ . '/../../includes/header.php'; ?>

<main class="nieuws-overzicht">
  <?php
  $pad = __DIR__ . '/../../data/berichten.json';
  $berichten = file_exists($pad) ? json_decode(file_get_contents($pad), true) : [];

  // Detailweergave
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($berichten as $bericht) {
      if ($bericht['id'] === $id) {
        echo "<article class='nieuws-detail'>";
        echo "<h2>" . htmlspecialchars($bericht['titel']) . "</h2>";
        echo "<p class='datum'>" . date('d-m-Y H:i', strtotime($bericht['datum'])) . "</p>";
        if (!empty($bericht['categorie'])) {
          echo "<p class='categorie'><strong>Categorie:</strong> " . htmlspecialchars($bericht['categorie']) . "</p>";
        }
        echo "<p>" . nl2br(htmlspecialchars($bericht['inhoud'])) . "</p>";
        if (!empty($bericht['afbeelding'])) {
          echo "<img src='/" . htmlspecialchars($bericht['afbeelding']) . "' alt='Afbeelding' class='nieuws-afbeelding'>";
        }
        echo "<p><a href='nieuws.php'>← Naar het nieuwsberichten overzicht</a></p>";
        // Deelknop
        echo "<div class='deel-knop'>";
        echo "<button onclick='deelBericht()'><i class='fa fa-share-alt'></i> Deel dit bericht</button>";
        echo "</div>";

        echo "</article>";
        break;
      }
    }
  } else {
    // Overzicht
    echo "<section class='nieuws-lijst'>";
    foreach ($berichten as $bericht) {
      $id = htmlspecialchars($bericht['id']);
      $titel = htmlspecialchars($bericht['titel']);
      $datum = date('d-m-Y H:i', strtotime($bericht['datum']));
      $categorie = !empty($bericht['categorie']) ? htmlspecialchars($bericht['categorie']) : 'Geen categorie';
      echo "<div class='nieuws-item'>";
      echo "<div class='nieuws-datum'>$datum</div>";
      echo "<div class='nieuws-titel'><a href='nieuws.php?id=$id'>$titel</a></div>";
      echo "<div class='nieuws-categorie'><em>$categorie</em></div>";
      echo "</div>";
    }
    echo "</section>";
  }
  ?>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
