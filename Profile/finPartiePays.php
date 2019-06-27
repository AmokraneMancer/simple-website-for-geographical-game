<?php
include_once '../ConnexionBD.php';
$bdd = new PDO('mysql:host=localhost;dbname=jeucapitales;charset=utf8', 'root','');
session_start();


$email=$_SESSION["email"];


// pour afficher totale des point d'un joueur 
$totalepoint ="SELECT score  FROM user WHERE email= '$email'";
$statementpoint= $bdd->prepare($totalepoint);
$statementpoint->execute();
$ancienScore = $statementpoint->fetch();


if(isset($_POST["valider"])){
	
	$ltq1=$_POST['jq1'];
	$lgq1=$_POST['lq1'];
	$reponse1 = $_POST['reponse1'];
	//var_dump($reponse1);

	$ltq2=$_POST['jq2'];
	$lgq2=$_POST['lq2'];
	$reponse2 = $_POST['reponse2'];

	$ltq3=$_POST['jq3'];
	$lgq3=$_POST['lq3'];
	$reponse3 = $_POST['reponse3'];

	$ltq4=$_POST['jq4'];
	$lgq4=$_POST['lq4'];
	$reponse4 = $_POST['reponse4'];

	$ltq5=$_POST['jq5'];
	$lgq5=$_POST['lq5'];
	$reponse5 = $_POST['reponse5'];
	//var_dump($reponse5);
	$ltq6=$_POST['jq6'];
	$lgq6=$_POST['lq6'];
	$reponse6 = $_POST['reponse6'];

	$ltq7=$_POST['jq7'];
	$lgq7=$_POST['lq7'];
	$reponse7 = $_POST['reponse7'];
	// questions
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];
	$q6 = $_POST['q6'];
	$q7 = $_POST['q7'];
					// les reponses 
	$sqlgetrep1 = "SELECT * FROM questions WHERE question = '$q1'";
	$statementrep1 = $bdd->prepare($sqlgetrep1);
	$statementrep1->execute();
	$rep1 = $statementrep1->fetch();

	$sqlgetrep2 = "SELECT * FROM questions WHERE question = '$q2'";
	$statementrep2 = $bdd->prepare($sqlgetrep2);
	$statementrep2->execute();
	$rep2 = $statementrep2->fetch();

	$sqlgetrep3 = "SELECT * FROM questions WHERE question = '$q3'";
	$statementrep3 = $bdd->prepare($sqlgetrep3);
	$statementrep3->execute();
	$rep3 = $statementrep3->fetch();

	$sqlgetrep4 = "SELECT * FROM questions WHERE question = '$q4'";
	$statementrep4 = $bdd->prepare($sqlgetrep4);
	$statementrep4->execute();
	$rep4 = $statementrep4->fetch();

	$sqlgetrep5 = "SELECT * FROM questions WHERE question = '$q5'";
	$statementrep5 = $bdd->prepare($sqlgetrep5);
	$statementrep5->execute();
	$rep5 = $statementrep5->fetch();

	$sqlgetrep6 = "SELECT * FROM questions WHERE question = '$q6'";
	$statementrep6 = $bdd->prepare($sqlgetrep6);
	$statementrep6->execute();
	$rep6 = $statementrep6->fetch();

	$sqlgetrep7 = "SELECT * FROM questions WHERE question = '$q7'";
	$statementrep7 = $bdd->prepare($sqlgetrep7);
	$statementrep7->execute();
	$rep7 = $statementrep7->fetch();
	//var_dump($rep1);


	if( $reponse1 == 'true'){
		$scorerep1 = 10;
	}else{
		$scorerep1 = 0;
	}

	if( $reponse2 == 'true'){
		$scorerep2 = 10;
	}else{
		$scorerep2 = 0;
	}

	if( $reponse3 == 'true'){
		$scorerep3 = 10;
	}else{
		$scorerep3 = 0;
	}

	if( $reponse4 == 'true'){
		$scorerep4 = 10;
	}else{
		$scorerep4 = 0;
	}

	if( $reponse5 == 'true'){
		$scorerep5 = 10;
	}else{
		$scorerep5 = 0;
	}

	if( $reponse6 == 'true'){
		$scorerep6 = 10;
	}else{
		$scorerep6 = 0;
	}

	if( $reponse7 == 'true'){
		$scorerep7 = 10;
	}else{
		$scorerep7 = 0;
	}	
		// le totale de points pour faire la mise a jours du niveau		
	$totalpoints = $ancienScore['score'] + $scorerep1 + $scorerep2 + $scorerep3 + $scorerep4 + $scorerep5 + $scorerep6 + $scorerep7;

		// total de points obtenu pour chaque question
	$totalpointstmp = $scorerep1 + $scorerep2 + $scorerep3 + $scorerep4 + $scorerep5 + $scorerep6 + $scorerep7;


	$sqlupdatescore = "UPDATE user SET score = '$totalpoints' WHERE email='$email'";
	$statementscoreupdate = $bdd->prepare($sqlupdatescore);
	$statementscoreupdate->execute();

		// la mise à jour du niveau
	if($totalpoints < 70){
		$niveau = 1;


	}
	if($totalpoints >= 70 and $totalepoint < 140){
		$niveau = 2;

	}
	if($totalpoints >= 140){
		$niveau = 3;

	}

	$sqlupdateniveau = "UPDATE user SET niveau = '$niveau' WHERE email='$email'";
	$statementniveauupdate = $bdd->prepare($sqlupdateniveau);
	$statementniveauupdate->execute();		
}			

?>	
<!DOCTYPE html>
<html>

<head>


	<meta charset="utf-8">
	<title>Fin de la partie</title>
	<link rel="icon" type="image/png" href="img/LogoM.jpg"  />
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Polices personnalisées pour ce modèle -->
	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
	<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">





	<!-- Styles personnalisés pour ce modèle-->
	<link href="css/resume.css" rel="stylesheet">
	<!-- Leaflet -->
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />  
	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>



</head>

<body id="page-top" >



		<!-- le menu vertical de gauche (navbar) -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
			<!-- l'image de l'utilisateur -->
			<a class="navbar-brand js-scroll-trigger" href="#page-top">
				<span class="d-none d-lg-block">


				</span>
			</a>


			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="Joueur.php">Mon profil</a>
					</li>


					<li class="nav-item">

						<a class="nav-link js-scroll-trigger"  href="../Deconnecter.php">Deconnecter</a>

					</li>
				</ul>
			</div>
		</nav>

		<div class="panel" style="margin-left : 200px;">
			<div class="container-fluid p-0">
				<h1>Resultats</h1>

				<!-- la table des résultats -->			
				<table class="table" style="background-color : #FFD700; width : 550px;">
					<thead>
						<tr>
							<th scope="col">Question</th>
							<th scope="col">Points</th>
							<th scope="col">Informatios</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td><?php echo $scorerep1; ?></td>
							<td><a href="https://fr.wikipedia.org/wiki/<?php echo substr($rep1['pays'], 1, -1); ?> " target="_blank">En savoir plus</a></td>

						</tr>
						<tr>
							<th scope="row">2</th>
							<td><?php echo $scorerep2; ?></td>
							<td><a href="https://fr.wikipedia.org/wiki/<?php echo substr($rep2['pays'], 1, -1); ?>" target="_blank">En savoir plus</a></td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td><?php echo $scorerep3; ?></td>
							<td><a href="https://fr.wikipedia.org/wiki/<?php echo substr($rep3['pays'], 1, -1); ?> " target="_blank">En savoir plus</a></td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td><?php echo $scorerep4; ?></td>
							<td><a href="https://fr.wikipedia.org/wiki/<?php echo substr($rep4['pays'], 1, -1); ?> " target="_blank">En savoir plus</a></td>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td><?php echo $scorerep5; ?></td>
							<td><a href="https://fr.wikipedia.org/wiki/<?php echo substr($rep5['pays'], 1, -1); ?> " target="_blank">En savoir plus</a></td>
						</tr>
						<tr>
							<th scope="row">6</th>
							<td><?php echo $scorerep6; ?></td>
							<td><a href="https://fr.wikipedia.org/wiki/<?php echo substr($rep6['pays'], 1, -1); ?> " target="_blank">En savoir plus</a></td>
						</tr>
						<tr>
							<th scope="row">7</th>
							<td><?php echo $scorerep7; ?></td>
							<td><a href="https://fr.wikipedia.org/wiki/<?php echo substr($rep7['pays'], 1, -1); ?> " target="_blank">En savoir plus</a></td>
						</tr>
						<tr>
							<th scope="row">Total</th>
							<td><?php echo $totalpointstmp; ?></td>

						</tr>
					</tbody>
				</table>
			</div>		
		</div>



			<!-- Bootstrap -->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			<!-- JavaScript -->
			<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
			<script src="js/resume.min.js"></script>

			<script>
				/* afficher et cacher un pannel */
				function affichePanel(ID)
				{     
					if(document.getElementById(ID))
						document.getElementById(ID).style.visibility = 'visible';

				}   
				function close(ID)
				{
					if(document.getElementById(ID))
						document.getElementById(ID).style.visibility = 'hidden';
				}


			</script>

		</body>
		</html>