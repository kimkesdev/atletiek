<footer class="site-footer">
  <div class="footer-container">

    <div class="footer-col adres">
      <h4>Atletiek Vereniging Edam</h4>
      <p>Burgemeester Versteeghsingel 4<br>1135 VT Edam</p>
    </div>

    <div class="footer-col">
      <h4>Algemeen</h4>
      <ul>
        <li><a href="/organisatie/contacten.php">Contacten</a></li>
        <li><a href="/organisatie/routebeschrijving.php">Routebeschrijving</a></li>
        <li><a href="/organisatie/bestuur.php">Het bestuur</a></li>
        <li><a href="/organisatie/commissies.php">Commissies</a></li>
        <li><a href="/organisatie/ledenadministratie.php">Ledenadministratie</a></li>
        <li><a href="/organisatie/ereleden.php">Ereleden</a></li>
        <li><a href="/organisatie/vertrouwenspersonen.php">Vertrouwenspersonen</a></li>
        <li><a href="/organisatie/historie.php">Historie</a></li>
        <li><a href="/organisatie/clubvan100.php">Club van 100</a></li>
        <li><a href="/organisatie/jaarvergadering.php">Jaarvergadering</a></li>
        <li><a href="/organisatie/baanreglement.php">Baanreglement</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Informatie</h4>
      <ul>
        <li><a href="/documenten/privacyverklaring.php">Privacy verklaring</a></li>
        <li><a href="/documenten/gedragsregels.php">Gedragsregels persoonlijke veiligheid</a></li>
        <li><a href="/documenten/aanstellingsbeleid.php">Aanstellingsbeleid vrijwilligers</a></li>
        <li><a href="/documenten/huishoudelijkreglement.php">Huishoudelijk reglement</a></li>
        <li><a href="/documenten/trainersbeleid.php">Trainersbeleid</a></li>
        <li><a href="/documenten/technischbeleid.php">Technisch Beleid</a></li>
        <li><a href="/documenten/veiligheidsdocument.php">Veiligheidsdocument</a></li>
        <li><a href="/documenten/pestprotocol.php">Pestprotocol</a></li>
        <li><a href="/documenten/beleidsplan.php">Beleidsplan</a></li>
        <li><a href="/documenten/kleding.php">Kleding</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Overig</h4>
      <ul>
        <li><a href="/pages/berichten/nieuws.php">Nieuws</a></li>
        <li><a href="/pages/links.php">Links</a></li>
      </ul>
    </div>

  </div>
</footer>
<script>
function deelBericht() {
  if (navigator.share) {
    navigator.share({
      title: document.title,
      text: 'Bekijk dit nieuwsbericht van A.V. Edam:',
      url: window.location.href
    }).catch((error) => console.log('Deel mislukt:', error));
  } else {
    alert('Delen wordt niet ondersteund op dit apparaat.');
  }
}
</script>
