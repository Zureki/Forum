<?php
include ('../Modele/functionsBDD.php');
session_start();


if (isset($_POST['nomNav'])&&isset($_POST['passNav'])) {

	if (($_POST['nomNav']!="")&&($_POST['passNav']!="")) {
		
		$nom = $_POST['nomNav'];
		$pass = $_POST['passNav'];
		
		if (ctype_alnum ($nom)&&ctype_alnum ($pass)) {
			
			$uid = isValidUser($nom,$pass);

			if (is_string($uid)) {
				
				$_SESSION['uid'] = $uid;
				$_SESSION['nom'] = $nom;
			}
			
		}	
		
		
	}
		

}


?>
