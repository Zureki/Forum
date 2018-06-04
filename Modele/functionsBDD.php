<?php

include ('../Controleur/functionControler.php');
include ('attributsBDD.php');

// Fonction qui va se connecter a la base de données 
function connect()
{
	// Test de COnnexion a la base de données
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $bdd;
	}
	
	catch(PDOException $e)
    {
    	// Affichage de l'erreur 
    	echo "Erreur de connexion: " . $e->getMessage();
    }
	
}

 
// Fonction qui ajoute un utilisateur dans la BDD
function addUser ($name, $pass, $mail) 
{
	
	$bdd=connect();

	// Appel de la fonction du Controler qui va crypter le mdp
	$pass = hachePass($pass);

	$reponse = $bdd->prepare("INSERT INTO users (name,pass, uimail, dateinscri) VALUES (:name, :pass, :uimail, :dateinscri)");

	$reponse->bindValue(':name',$name);
	$reponse->bindValue(':pass',$pass);
	$reponse->bindValue(':uimail',$mail);
	$reponse->bindValue(':dateinscri', getDat());

	$reponse->execute();
	
}


// Fonction qui supprime un utilisateur de la BDD
function delUser ($uid) 
{
	
	$bdd=connect();
	
	$req = $bdd->query("DELETE FROM `user` WHERE `uid` = $uid");

}

// Fonction qui vérifie si le login et le mot de passe entrés correspondent
function isValidUser ($name, $pass) 
{
	
	$bdd=connect();
	
	$req = $bdd->prepare("SELECT uid, pass FROM `users` WHERE `name` = :name");
	
	$req->bindValue(':name', $name);

	$req->execute();

	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

	// Si les mot de passe sont pareil 
	if (password_verify($pass, $resultat[0]['pass']))
	{
		return $resultat[0]['uid'];
	}
	// Sinon 
	else
	{
		return false;
	}
}

// Fonction qui ajoute un message au forum
function addMessage ($contenu, $uid) 
{
	
	$bdd=connect();

	// Récupération de l'heure et de la date 
	$time = getTime();
	$date = getDat();
	
	$reponse = $bdd->prepare("INSERT INTO message (contenu,uid, heure, dat) VALUES (:contenu, :uid, :heure, :dat)");

	$reponse->bindValue(':contenu',$contenu);
	$reponse->bindValue(':uid',$uid);
	$reponse->bindValue(':heure',$time);
	$reponse->bindValue(':dat',$date);

	$reponse->execute();
	
}

// Renvoi l'heure actuel
function getTime()
{
	$heure = date("H");
    $minute = date("i");

    $time = (String)$heure.":". $minute;

	return $time;
}

// Renvoi la date actuel 
function getDat()
{
	$jour = date("d");
	$mois = date("m");
	$annes = date("Y");

	$date = (String)$jour. "/" . $mois . "/" . $annes;

	return $date;
}

// Fonction qui renvoie tous les messages des utilisateurs  (si mid=-1) ou d'un utilisateur precis 
function retrieveMessage ($mid=-1) 
{
	
	$bdd=connect();
	
	if (($mid)!=-1) 
	{
		$req = $bdd->prepare("SELECT * FROM `message` WHERE `uid` = $mid");
	}
	else 
	{
		$req = $bdd->prepare("SELECT * FROM `message`");
	}
	
	$req->execute();

	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

	return $resultat;
	
}


// Fonction renvoie le nom d'un utilisateur via son ID
function retrieveUserName ($uid)
{
	
	$bdd=connect();
	
	$req = $bdd->prepare("SELECT name FROM `users` WHERE `uid` = $uid");
	
	$req->execute();

	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

	return $resultat;
}

// Fonction qui va renvoyer l'ID d'un utilisateur via son nom 
function selectUid($name)
{
	$bdd=connect();
	$uid;
	
	$req = $bdd->query("SELECT uid FROM `users` WHERE name = $name ");


	while($data = $req->fetch())
	{
		$uid = $data['uid'];
	}

	return $uid;
}


// Fonction qui va supprimer un message
function deleteMessage($mid)
{
	$bdd = connect();

	$req = $bdd->query("DELETE FROM `message` WHERE `mid` = $mid");
}

// Fonction qui va supprimer tout les message d'un utilisateurs 
function deleteAllMessage($uid)
{
	$bdd = connect();

	$req = $bdd->query("DELETE FROM `message` WHERE `uid` = $uid");

}


// Function qui va regarder si l'utilisateur est admin
function isAdmin($uid)
{
	$bdd = connect();

	$req = $bdd->query("SELECT isadmin FROM `users` WHERE `uid` = $uid");

	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

	return $resultat;

}

// Fonction qui vérifie que l'user est bien l'auteur d'un message 
function isAuthor ($uid,$mid) {
	
	$bdd=connect();
	
	$req = $bdd->prepare("SELECT COUNT(mid) AS isAuthor FROM `message` WHERE `uid` = $uid AND `mid` = $mid");
	
	$req->execute();
	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
	return $resultat;
	
}

// Fonction qui va séléctionner depuis quand l'utilisateur est inscrit
function memberFrom($uid)
{
	$bdd=connect();

	$req = $bdd->query("SELECT dateinscri FROM `users` WHERE `uid` = $uid");

	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
	return $resultat;
}






?>