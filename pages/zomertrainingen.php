<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="trainingsrooster">
  <h2>🏃‍♀️ Zomertrainingen</h2>
  <p><strong>Periode:</strong> vanaf 3 maart tot en met 26 oktober 2025</p>

  <?php
  $rooster = [
    "Maandag" => [
      ["14:00 - 15:30", "Wandelclub", "Tini Zwarthoed, Manfred Mooijer"],
      ["17:00 - 18:00", "Meiden U10 - U12 (2014/2015/2016)", "Ellen Evrengun, Suzan Rijswijk + ouder"],
      ["17:30 - 18:30", "Jongens U8 - U10 (2016/2017/2018/2019 mits 6 jaar)", "Annemarie Joosten, Melvin Boucher, Timo Steinmetz + ouder"],
      ["17:30 - 18:30", "Meiden U9/U8 (2017/2018/2019 mits 6 jaar)", "Annemarie Joosten, Melvin Boucher + ouder"],
      ["17:30 - 18:30", "Jongens U12 (2014/2015)", "Gerda Kwakman"],
      ["18:00 - 19:00", "Jongens U14 (2012/2013)", "Emiel Joosten"],
      ["18:30 - 19:30", "Meiden U14 (2012/2013)", "Danny Groot, Sem Vredevoort"],
      ["19:00 - 20:30", "Survivalrun Senioren Beginners", "Niels Hoogerdijk, Jeroen Koning"],
      ["19:30 - 20:30", "U16+ (2011 en ouder)", "Thomas Kok, Cor Pauws"],
      ["19:30 - 20:30", "Werpgroep", "Ricardo Aberkrom"],
      ["19:30 - 20:30", "Bootcamp 16+", "Vacant"],
      ["19:30 - 20:30", "Looptraining 16+", "Sandra Butter, Louis Lautenschütz"],
    ],
    "Dinsdag" => [
      ["18:00 - 19:15", "Looptraining 16+", "Wim Edam"],
      ["18:15 - 19:30", "Survivalrun 14 t/m 21 jaar gevorderden", "Cees Beets"],
      ["18:30 - 19:30", "Looptraining MILA", "Paul Kraakman"],
      ["19:30 - 20:45", "Survivalrun 16+", "Martine Schilder, Leon van Monfort, Bastiaan van Bakergem"],
      ["19:00 - 20:00", "Kogelslingeren", "Jan Tuijp"],
      ["19:30 - 21:00", "Looptraining 16+", "Rick Westerdaal, Louis Zwarthoed"],
    ],
    "Woensdag" => [
      ["16:00 - 17:00", "Survivalrun Jeugd 8 t/m 12 jaar", "Melanie Lautenschütz, Monique Plat"],
      ["17:30 - 18:30", "Survivalrun Jeugd 8 t/m 12 jaar", "Martin van Riesen, Marian Tol"],
      ["17:30 - 18:30", "Jongens U10/U9/U8", "Annemarie Joosten, Jesse Joosten, Melvin Bouchier"],
      ["17:30 - 18:30", "Meiden U9/U8", "Annemarie Joosten, Jesse Joosten, Melvin Bouchier"],
      ["17:30 - 18:30", "Jongens U12", "René Schilder"],
      ["17:30 - 18:30", "Meiden U10/U12", "Rosy Veerman, Jur Bakker"],
      ["18:30 - 19:30", "Jongens U14", "Martinus Ouwehand"],
      ["18:30 - 19:30", "Meiden U14", "Niels Kwakman"],
      ["19:00 - 20:30", "Survivalrun 16+ gevorderden", "Jan Tuijp"],
      ["19:30 - 20:30", "U16+", "Thomas Kok"],
      ["19:30 - 20:30", "Werpgroep", "Ricardo Aberkrom"],
      ["19:30 - 20:30", "Bootcamp 16+", "Mariska Bond, Rob Silven"],
    ],
    "Donderdag" => [
      ["09:00 - 10:00", "Looptraining 16+", "Tini Zwarthoed, Margreeth Werkhoven"],
      ["16:15 - 17:15", "Survivalrun Jeugd 8 t/m 12 jaar", "Sander Collet, Jeroen Garms"],
      ["18:00 - 19:15", "Looptraining 16+", "Wim Edam"],
      ["18:15 - 19:30", "Survivalrun 13 t/m 18 jaar", "Cees Beets"],
      ["19:00 - 20:15", "Looptraining MILA", "Paul Kraakman"],
      ["19:30 - 20:45", "Looptraining 16+", "Rick Westerdaal, Paul Kraakman"],
    ],
    "Vrijdag" => [
      ["09:00 - 10:00", "Bootcamp", "Rob Silven"],
      ["09:00 - 10:30", "Survivalrun 16+", "Martine Schilder, Leon van Montfort"],
      ["19:00 - 20:00", "G-team", "Diverse trainers"],
    ],
    "Zaterdag" => [
      ["09:30 - 10:30", "Survivalrun Jeugd 8 t/m 12 jaar", "Jeroen Koning, Remco van Pooij, Lynn van Vlaanderen"],
      ["10:00 - 12:00", "Selectietraining U12 t/m U16", "Emiel Joosten, Niels Kwakman, Jur Bakker, Sem Vredevoort"],
      ["10:30 - 12:00", "Survivalrun 16+", "Jan Tuijp"],
    ],
    "Zondag" => [
      ["", "Géén groepstrainingen", ""],
    ],
  ];

  foreach ($rooster as $dag => $trainingen) {
    echo "<section class='dag-blok'>";
    echo "<h3>$dag</h3>";
    echo "<table class='trainingstabel'>";
    echo "<thead><tr><th>Tijd</th><th>Groep</th><th>Trainer(s)</th></tr></thead><tbody>";
    foreach ($trainingen as $t) {
      echo "<tr><td>{$t[0]}</td><td>{$t[1]}</td><td>{$t[2]}</td></tr>";
    }
    echo "</tbody></table>";
    echo "</section>";
  }
  ?>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
