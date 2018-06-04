<?php

include ('../Modele/functionsBDD.php');
session_start();



if(isset($_POST['id']))
{
	$mid = $_POST['id'];

	if(isset($_SESSION['uid']) > 0)
	{
		deleteMessage($mid);
	}
}



?>