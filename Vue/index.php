<?php
include("entete.php");
include("navbar.php");
include('modal.php');
?>

<!DOCTYPE html>

<html>

  <head>

    <title>Forum</title>

  </head>
  

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">

    <h2 class="w3-wide w3-center" id="title_body"><b>Aflokkat Discussion</b></h2>

    <p class="w3-opacity w3-center"><i>Bienvenue sur notre Forum de Discussion</i></p>

	<div id="fil"></div>

    <div class="w3-row w3-padding-32">

      <div class="w3-col m6 w3-large w3-margin-bottom">

      </div>

      <div class="w3-col m12">

        <form id="message">

          <input class="w3-input w3-border" type="text" placeholder="Message" required id="contenu">

          <button type="submit" id="button_send"><img width="40" src="CSS/send.png"></button>

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
