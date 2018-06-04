<?php

function hachePass($password)
{
	$option = [
	'cost' => 10
	];

	$hache_pass = password_hash($password, PASSWORD_BCRYPT, $option);

	return $hache_pass;
}

?>