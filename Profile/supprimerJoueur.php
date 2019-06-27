<?php

	$email=$_GET['email'];
	include_once '../ConnexionBD.php';
	$bdd = new PDO('mysql:host=localhost;dbname=jeucapitales;charset=utf8', 'root','');
	
	// suppression d'un joueur
	/*$sqldeleteH="DELETE FROM historiques WHERE email='$email'";
	$statementH=$bdd->prepare($sqldeleteH);
	$statementH->execute();*/
	$sqldelete="DELETE FROM user WHERE email='$email'";
	$statement=$bdd->prepare($sqldelete);
	$statement->execute();
	header('location:Admin.php');
?>