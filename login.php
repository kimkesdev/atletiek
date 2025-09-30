<?php
session_start();
$errors = [];

// Pad naar gebruikersbestand
$pad = __DIR__ . '/data/users.json';
$users = [];

// JSON inlezen en controleren
if (file_exists($pad)) {
  $inhoud = file_get_contents($pad);
  $decoded = json_decode($inhoud, true);
  if (is_array($decoded)) {
    $users = $decoded;
  }
}

// Verwerken van loginformulier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  foreach ($users as $user) {
    // Voor platte wachtwoorden:
    if ($user['username'] === $username && $user['password'] === $password) {
      $_SESSION['gebruiker'] = $username;
      header('Location: /pages/berichten/mijnberichten.php');
      exit;
    }

    // Voor gehashte wachtwoorden (optioneel):
    // if ($user['username'] === $username && password_verify($password, $user['password'])) {
    //   $_SESSION['gebruiker'] = $username;
    //   header('Location: /pages/berichten/mijnberichten.php');
    //   exit;
    // }
  }

  $errors[] = "Ongeldige gebruikersnaam of wachtwoord.";
}
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="login-form">
  <h2>Inloggen</h2>

  <?php
  foreach ($errors as $error) {
    echo "<p style='color:red;'>$error</p>";
  }
  ?>

  <form method="POST" action="login.php">
    <div class="form-group">
      <label for="username">Gebruikersnaam:</label>
      <input type="text" name="username" id="username" required>
    </div>

    <div class="form-group">
      <label for="password">Wachtwoord:</label>
      <input type="password" name="password" id="password" required>
    </div>

    <div class="form-group">
      <input type="submit" value="Inloggen">
    </div>
  </form>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
