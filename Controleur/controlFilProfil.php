<?php
session_start();
include ('../Modele/functionsBDD.php');

$resultat = retrieveMessage ($_SESSION['uid']);
$tabnom = retrieveUserName($_SESSION['uid']);

$c = count($resultat);

for ($i=0 ; $i < $c ; $i++) 
{
	$tabnom = retrieveUserName($resultat[0]['uid']);

	// Je séléctionne la date de l'ionscription de la personne connecter
	$date = memberFrom($_SESSION['uid']);
	// Je stocke le résultat que je recois
	$memberFrom = $date[0]['dateinscri'];

		// On regarde si le retour de notre fonction est vide
		if(empty($tabnom))
		{
			// Si le retour est vide alors on inscrit ce nom la 
			$nom = "Anonymous";
		}
		else
		{
			// On récupère le nom provenant du tableau renvoyé par retrieveUserName()
			$nom = $tabnom[0]['name']; 
		}
	
	// On crée une nouvelle clé "utilisateur" dans le tableau $resultat
	$resultat[$i]['utilisateur'] = $nom; 

	// Je crée une nouvelle clé "memberFrom" dans le tableau $resultat
	$resultat[$i]['memberFrom'] = $memberFrom;
	
		// On teste si la personne est connectée et est propriétaire du message
		//et on crée une nouvelle clef 'proprietaire' mise à true ou false
		if (isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$isAdmin = isAdmin($uid);

			// Si la personne est connecter et si elle est l'auteur ou si elle est admin
			// On reseigne son nom
			if(($uid == $resultat[$i]['uid']) || ($isAdmin[0]['isadmin'] == 1))
			{
				$resultat[$i]['proprietaire'] = true;
			}
			
			else 
			{
				// Sinon je renseigne le nom de la personne qui a écrit le message 
				$resultat[$i]['proprietaire'] = false;
			}
		}
}

// Renvoi d'un JSON
echo json_encode($resultat);

?>
