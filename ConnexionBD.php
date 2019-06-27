<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=jeucapitales','root','');
	
}
catch (PDOException $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
