<!DOCTYPE html>
<link href="2.css" rel="stylesheet">
<link href="coiffeur.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
  <a href="#" class="navbar-brand font-weight-bold d-block d-lg-none">MegaMenu</a>
  <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div id="navbarContent" class="collapse navbar-collapse">


    <img src="headerv1.png" alt="logo marque" width="100" height="100">

    <ul class="navbar-nav mx-auto">
      <li class="nav-item"><a href="" class="nav-link font-weight-bold text-uppercase">Acceuil</a></li>

      <li class="nav-item"><a href="" class="nav-link font-weight-bold text-uppercase">Réserver</a></li>
      <li class="nav-item"><a href="" class="nav-link font-weight-bold text-uppercase">Tarifs</a></li>
      <li class="nav-item"><a href="" class="nav-link font-weight-bold text-uppercase">Contact</a></li>
    </ul>
  </div>
</nav>

<body>

  <?php
  $minhour = date('H');


  if (isset($_POST['date'])) {
    require "reserver.php";

    if ($_RSV->save(
      $_POST['date'],
      $_POST['slot'],
      $_POST['name'],
      $_POST['email'],
      $_POST['tel'],
      $_POST['notes']
    )) {
      echo "<div class='ok'>Réservation effectuée.</div>";
    } else {
      echo "<div class='err'>" . $_RSV->error . "</div>";
    }
  }


  ?>

  <h1>RESERVER UN RENDEZ-VOUS</h1>


  <div class="bgimg">

    <div class="formu">


      <form id="resForm" method="post" target="_self">
        <label for="res_name">Nom/Prénom</label>
        <input type="text" required name="name" value="Julien" />

        <label for="res_email">Email</label>
        <input type="email" required name="email" value="jr.dwwm.castres20202021@gmail.com" />

        <label for="res_tel">Téléphone</label>
        <input type="text" required name="tel" value="12345" />

        <label for="res_notes">Détails</label>
        <input type="text" name="notes" value="Coupe" />

        <?php


        $mindate = date("Y-m-d");
        $dayofweek = date('w', strtotime($mindate));

        ?>
        <label>Date de réservation</label>
        <input type="date" required id="res_date" name="date" min="<?= $mindate ?>">


        <script type="text/javascript">
          const validate = dateString => {
            const day = (new Date(dateString)).getDay();
            if (day == 0 || day == 1) {
              return false;
            }
            return true;
          }

          document.getElementById("res_date").onchange = evt => {
            if (!validate(evt.target.value)) {
              evt.target.value = '';
              alert("Notre salon est fermé le Dimanche et le Lundi");
            }
          }
        </script>



        <label>Heure de réservation</label>
        <select name="slot" id="slot">
          <option value="9">9h</option>
          <option value="10">10h</option>
          <option value="11">11h</option>
          <option value="13">13h</option>
          <option value="14">14h</option>
          <option value="15">15h</option>
          <option value="16">16h</option>
          <option value="17">17h</option>
        </select>
        <form>

          <input type="submit" value="Réserver" />

        </form>
      </form>
    </div>
  </div>

</body>

<br> <br> <br>


<footer>
  <div class="footr">
    <div class="cont">


      <h1>Contact</h1>

      <a href="mailto:contact@lhairderepos.com"><img src="mail.png" alt="Photo mail" width="15" height="15">contact@lhairderepos.com</a>
      <br>
      <a href="tel:++33 (0) 600 000 0"><img src="tel.png" alt="Photo tel" width="15" height="15">+33 (0) 684 815 834</a>
      <br>
      <a href="https://goo.gl/maps/tYc1yD8cwZFogtfLA"><img src="carte.png" alt="Photo carte" width="15" height="15">Localisation</a>
    </div>

    <div class="RR">
      <h1>Qui sommes-nous ?</h1>
      <p>Tous les deux ingénieurs, nous avons parcouru les 5 continents durant plusieurs décennies, souvent à pied et à vélo.
        Nous avons choisi de nous installer dans un rare village encore authentique du Sud de la France, Le Somail,
        pour y ouvrir un petit Établissement de coiffure.
      </p>
    </div>


    <div class="ftmap">
      <iframe title="map from google" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10843.764536290824!2d-0.8675017!3d47.1981647!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x69b02cb8bbf7b36c!2sL&#39;Hair%20de%20Repos!5e0!3m2!1sfr!2sfr!4v1628148734146!5m2!1sfr!2sfr" width="500" height="175" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

  </div>
</footer>

</html>