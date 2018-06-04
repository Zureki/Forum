<!DOCTYPE html>

<html>

<head>

  <title>S'incrire</title>

</head>


<?php
include("entete.php");
include("navbar.php");
?>

<body>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">

    <h2 class="w3-wide w3-center" id="title_body"><b>Inscription</b></h2>
    
      <p class="w3-opacity w3-center"><i>Pour vous s'inscrire!</i></p>
    
    <div class="w3-row w3-padding-32">
      
      <div class="w3-col m6">

        <form id="inscription">

          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">

            <div class="w3-row">

              <input class="w3-input w3-border" type="text" placeholder="Nom" required id="nom">
              <input class="w3-input w3-border" type="text" placeholder="Mail" required id="mail">
		          <input class="w3-input w3-border" type="password" placeholder="Mot de passe" required id="pass">
              <input class="w3-input w3-border" type="password" placeholder="Confirmation du mot de passe" required id="pass2">

            </div>

            <div class="w3-half"></div>

          </div>

          <button id="btn-inscription" class="w3-button w3-black w3-section w3-right" type="submit">S'inscrire</button>

        </form>

		<div id="reponse"></div>

      </div>

    </div>

  </div>
  
<!-- End Page Content -->
</div>

<?php
include ("footer.php");
?>



</body>
</html>
