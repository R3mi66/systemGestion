<?php
	//Connexion à la base de données
	try
	{
		$base = new PDO('mysql:host=localhost; dbname=vdr_system_gestion;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>

			