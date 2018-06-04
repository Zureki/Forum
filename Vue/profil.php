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
    

      <h1 class="w3-wide w3-center" id="title_body"><b> <?php echo $_SESSION['nom']; ?> </b></h1>

      <p class="w3-opacity w3-center"><i> Numéro : <?php echo $_SESSION['uid']; ?> </i></p>

    <div id="info_profil">

      <h2>Information du profil</h2>

        <!-- Affichage de l'etat d'administrateur -->
        <div id="admin">
        </div>

    </div>
    

<div>

    <div id="delete_all">
      
      <h2>Vos Messages</h2>
      
      <button id=" <?php $_SESSION['uid']?> "class="supp_all_mes">Supprimer vos messages</button>

    <div>

        <div id="my"></div>

    </div>
    
    <div class="w3-row w3-padding-32">

      <div class="w3-col m6 w3-large w3-margin-bottom"></div>

  </div>
  
<!-- End Page Content -->
</div>



<?php
include ("footer.php");
?>



</body>
</html>
