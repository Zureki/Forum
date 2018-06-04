<!-- Navbar -->
<div class="w3-top">

  <div class="w3-bar w3-black w3-card">

    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>

    <a href="index.php" class="w3-bar-item w3-button w3-padding-large" id="navAccueil">ACCUEIL</a>
    
	<?php
		
		/* Si sa ma session est vide alors je met mon menu normal */
		if (!isset($_SESSION['uid'])) {

	?>
	<a href="contact.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" id="navAccueil">INSCRIPTION</a>
	<form id="formnavbar">

		<!-- Boutons de Connexion de la NavBar -->
		<button id="btn-connexion" class="w3-button w3-yellow w3-bar-item w3-padding-large w3-hide-small w3-right">Connexion</button>

		<!-- Champs de mot de passe de la NavBar -->
		<input class="w3-bar-item w3-padding-large w3-hide-small w3-margin-right w3-right" type="password" placeholder="Mot de passe" id="passNav">

		<!-- Champs du nom de la NavBar -->
		<input class="w3-bar-item w3-padding-large w3-hide-small w3-margin-right w3-right " type="text" placeholder="Nom" id="nomNav">

	</form>
	
	<?php }
		
		else {
			?>

			<span class="w3-hide-small w3-margin-right w3-right"id="infoUser">

				<a title ="Se rendre sur son profil" href="profil.php" href="index.php" class="w3-bar-item w3-button w3-padding-large" id="profil"><img width="51" src="CSS/ig-avatar-white.png" id="user_icon" />


				<label><b><?php echo $_SESSION['nom'];?></b></label></a>

				<a title ="Se Deconnecter" href="../Controleur/controlLogout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right" id="navLogOut">
					<img width="26"src="CSS/logout.png"></a>
			</span>
			
			
		<?php } ?>
	
	
  </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#band" class="w3-bar-item w3-button w3-padding-large">BAND</a>
  <a href="#tour" class="w3-bar-item w3-button w3-padding-large">TOUR</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large">CONTACT</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">MERCH</a>
</div>