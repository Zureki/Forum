<?php

include ('../Modele/functionsBDD.php');
session_start();

	if(isset($_SESSION['uid']) > 0)
	{
		deleteAllMessage($_SESSION['uid']);
	}




?>