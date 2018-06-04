<?php

include ('../Modele/functionsBDD.php');

	if (isset($_POST['name'])&&isset($_POST['pass'])&&isset($_POST['pass2'])&&isset($_POST['mail'])) 
	{

		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];
		$mail = $_POST['mail'];
		
		if ($pass==$pass2) 
		{
			if (preg_match('/^[a-zA-Z0-9]+$/', $name.$pass))
			{
				if(filter_var($mail, FILTER_VALIDATE_EMAIL))
				{
					addUser($name,$pass, $mail);
					$retour = "Paramètres valides";
				}
				
			}
		}
		
		else 
		{
			$retour = "Les mots de passe ne sont pas identiques et/ou les textes entrés ne sont pas alphanumérique";
		}
	
		echo $retour;
	}

	else 
	{
		
		echo "Tu essayes de faire quoi ?!";
	}



?>
