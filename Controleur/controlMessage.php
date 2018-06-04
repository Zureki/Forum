<?php

session_start();

include ('../Modele/functionsBDD.php');
if (isset($_POST['contenu'])) {

	if (isset($_SESSION['uid'])) {
		
		$uid = $_SESSION['uid'];
		
		$contenu = $_POST['contenu'];
		$retour="";
		
		if (strlen($contenu)<2048) 
		{
		
			addMessage($contenu,$uid);

		}
	
		else 
		{
				$retour = "Erreur";
		}
		
	}

	else {
		
		$retour = "il faut être enregistré pour poster un message";
	}
	
	echo $retour;
}

else {
	
	echo "Tu essayes de faire quoi ?!";
}

?>
