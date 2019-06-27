<?php
include_once '../ConnexionBD.php'; 
 $bdd = new PDO('mysql:host=localhost;dbname=jeucapitales;charset=utf8', 'root','');// l'appel a la connexion avec la base de données
 session_start();
// pour récuperer le prénom d'affichage (Bonjour Prénom)
 $emailprenom=$_SESSION["email"];		
 $prenomafficher ="SELECT * FROM user WHERE email= '$emailprenom'";
 $statement = $bdd->prepare($prenomafficher);
 $statement->execute(array(':prenom' => $prenomafficher));

// pour afficher totale des point d'un joueur 

 $totalepoint ="SELECT score  FROM user WHERE email= '$emailprenom'";
 $statementpoint= $bdd->prepare($totalepoint);
 $statementpoint->execute();

// pour afficher le nombre des joueures 

 $nombrejoueures ="SELECT count(*) as nombre FROM user WHERE email NOT IN('admin@admin.com','admin2@admin.com')";
 $statementnombre= $bdd->prepare($nombrejoueures);
 $statementnombre->execute();
 $donneesnombre=$statementnombre->fetch();

// pour afficher le niveau d'un joueur 

 $niveaujoueur ="SELECT niveau FROM user WHERE email= '$emailprenom'";
 $statementniveau= $bdd->prepare($niveaujoueur);
 $statementniveau->execute();

// pour afficher la photo d'un joueur

 $imagejoueur ="SELECT image FROM user WHERE email= '$emailprenom'";
 $statementnimage= $bdd->prepare($imagejoueur);
 $statementnimage->execute();


// pour afficher le classment  d'un joueur
 $scorejoueur ="SELECT score  FROM user WHERE  email= '$emailprenom'";
 $statementscorejoueur= $bdd->prepare($scorejoueur);
 $statementscorejoueur->execute();
 $donneesscorejoueur=$statementscorejoueur->fetch();
 $tmp=$donneesscorejoueur['score'];

 $classementjoueur ="SELECT count(*) as classementJoueur FROM user WHERE score>='$tmp' AND email NOT IN('admin@admin.com','admin2@admin.com') ";
 $statementnclassementjoueur= $bdd->prepare($classementjoueur);
 $statementnclassementjoueur->execute();
 $donneesClassmentJoueur=$statementnclassementjoueur->fetch();



 if(isset($_POST["enregistrer"]))
 {
 	$email=$_SESSION["email"];
 	$prenomjoueur=$_POST['prenomjoueur'];
 	$nomjoueur=$_POST['nomjoueur'];
 	$ancmotdepasse=md5($_POST['ancmotdepasse']);
 	$nouveaumotdepasse=md5($_POST['nouveaumotdepasse']);



 	$sqlUpdate = "UPDATE user SET prenom= '$prenomjoueur', nom= '$nomjoueur', motdepasse= '$nouveaumotdepasse' WHERE email= '$email'";
 	$statement = $bdd->prepare($sqlUpdate);
 	$statement->execute();
			   // if($statement->rowCount() == 1)
					// {
						// echo '<script>alert("modificatiosn avec succés")</script>';
					// }
					// else
					// {
						// echo '<script>alert("Erreur de modification")</script>';
					// }

 }

 if(isset($_POST["jouerJeux"]))
 {
 	$valeurCategorie = $_GET['categorie']; 
 	$sqlgetcat = "SELECT question FROM questions  WHERE categorie = '$valeurCategorie' ";
 	$statementjeux = $bdd->prepare($sqlgetcat);
 	$statementjeux->execute();


 	$qst = array();
 	while($dn=$statementjeux->fetch())
 	{   
 		$qst[] = $dn['question'];

 	}


 }			   
 ?>


 <!DOCTYPE html>
 <html>

 <head>

 	<meta charset="utf-8">

 	<title>Profil- Joueur</title>

 	<!-- data table -->
 	<link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />

 	<!-- Bootstrap -->
 	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 	<!-- Polices -->
 	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
 	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 	<link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
 	<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">



 	<!-- le fichier css -->
 	<link href="css/resume.css" rel="stylesheet">


 </head>

 <body id="page-top" onload="close('Qst'); close('tableinv')" >

 	<audio id="buttonAudio">
 		<source src="../sounds/button.mp3" type="audio/mpeg">
 		</audio>




 		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">

 			<a class="navbar-brand js-scroll-trigger" href="#page-top">

 			</a>

 			<div class="collapse navbar-collapse" id="navbarSupportedContent">
 				<ul class="navbar-nav">
 					<li class="nav-item">
 						<a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')"  href="#MonProfil">Mon profil</a>
 					</li>

 					<li class="nav-item">
 						<a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')" href="#profil">Modifier Profil</a>
 					</li>

 					<li class="nav-item">
 						<a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')" href="#classement">Classement</a>
 					</li>

 					<li class="nav-item">

 						<a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')" href="../Deconnecter.php">Deconnecter</a>

 					</li>
 				</ul>
 			</div>
 		</nav>

 		<div class="container-fluid p-0">
 			<section class="resume-section p-3 p-lg-5 " id="MonProfil">

 				<div class="row">
 					<div class="col-lg-12 col-xl-4">
 						<div class="card-box">
 							<div class="bar-widget">
 								<div class="table-box">
 									<div class="table-detail">
 										<!-- <div class="iconbox bg-info"> -->
 											<i class="fa fa-star" style="font-size:48px;color:yellow"></i>
 											<!-- </div> -->
 										</div>

 										<div class="table-detail">
 											<?php
 											while ($donnees = $statementpoint->fetch())
 											{
 												echo'<h4 class="m-t-0 m-b-5"><b>'.$donnees['score']. '</b></h4>';
 											}
 											?>
 											<p class="text-muted m-b-0 m-t-0">Total Points :</p>
 										</div>


 									</div>
 								</div>
 							</div>
 						</div>

 						<div class="col-lg-12 col-xl-4">
 							<div class="card-box">
 								<div class="bar-widget">
 									<div class="table-box">
 										<div class="table-detail">
 											<!-- <div class="iconbox bg-custom"> -->
 												<i class="fa fa-level-up" style="font-size:48px;color:#207245"></i>
 												<!-- </div> -->
 											</div>

 											<div class="table-detail">
 												<?php 
 												while($donnees =$statementniveau->fetch())
 												{
 													echo'<h4 class="m-t-0 m-b-5"><b>'.$donnees['niveau'].'</b></h4>';
 												}
 												?>
 												<p class="text-muted m-b-0 m-t-0">Niveau :</p>
 											</div>


 										</div>
 									</div>
 								</div>
 							</div>

 							<div class="col-lg-12 col-xl-4">
 								<div class="card-box">
 									<div class="bar-widget">
 										<div class="table-box">
 											<div class="table-detail">
 												<div class="iconbox bg-danger">
 													<i class="icon-layers"></i>
 												</div>
 											</div>

 											<div class="table-detail">

 												<h4 class="m-t-0 m-b-5"><b><?php echo $donneesClassmentJoueur['classementJoueur'];?>/<?php echo $donneesnombre['nombre'];?></b></h4>

 												<p class="text-muted m-b-0 m-t-0">Classement :</p>
 											</div>


 										</div>
 									</div>
 								</div>
 							</div>
 						</div>

 						<!-- le message Bonjour prenom du Joueur -->
 						<h2 class="mb-0">Bonjour
 							<?php
 							$donnees = $statement->fetch();
 							{						
 								echo '<span class="text-primary">'.$donnees['prenom'].'</span>';
 							}							 
 							?>	   					
 						</h2>
 						<!-- les bouttons qui permets aux joueurs de choisir la catégorie a jouer -->	
 						<?php 
 						$afficherCategorie ="SELECT distinct nom FROM categories";
 						$statementAfficherCategorie= $bdd->prepare($afficherCategorie);
 						$statementAfficherCategorie->execute();
 						?>
 						<?php
 						while($donneesC = $statementAfficherCategorie->fetch() )
 						{
 							?>
 							<a href ="Jeu<?php echo ucfirst($donneesC['nom']);?>.php"><button type="button" class="buttonCommencer button2" style="height : 300px; width:350px; font-size:28px;"  name="jouerJeux"><?php echo $donneesC['nom']; ?></button></a>
 							<?php
 						}
 						?>

 					</section>



 					<!-- la section modifier profil -->		
 					<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="profil">	  
 						<div class="container">
 							<h2 class="mb-5">Modifier Profil</h2>

 							<div class="row">
 								<!-- le formulaire -->
 								<form method="POST" action="Joueur.php" enctype="multipart/form-data">


 									<div class='row'>

 										<!-- les inputs de gauche -->
 										<div class="col-lg-6">							
 											<div class="form-group">
 												<label for="prenomjoueur" class="col-sm-2 control-label">Prénom </label>
 												<div class="col-sm-8">
 													<input type="text" class="form-control" name="prenomjoueur" id="prenomjoueur" placeholder="Prénom" required>
 												</div>
 											</div>

 											<div class="form-group" >
 												<label for="emailpr" class="col-sm-2 control-label">E-mail</label>
 												<div class="col-sm-8">
 													<?php
 													echo   '<input type="email" class="form-control" name="emailpr" id="emailpr" disabled="disabled" value="'.$_SESSION["email"].'" required>';
 													?>
 												</div>
 											</div>	

 											<div class="form-group">
 												<label for="ancmotdepasse" class="col-sm-2 control-label">Ancienne MP</label>
 												<div class="col-sm-8">
 													<input type="password" class="form-control" name="ancmotdepasse" id="ancmotdepasse" placeholder="**********" required>
 												</div>
 											</div>
 										</div>


 										<!-- les inputs (champs) de droite -->
 										<div class="col-lg-6">

 											<div class="form-group">
 												<label for="nomjoueur" class="col-sm-2 control-label">Nom </label>
 												<div class="col-sm-8">
 													<input type="text" class="form-control" name="nomjoueur" id="nomjoueur" placeholder="Nom"required>
 												</div>									
 											</div>

 											<div class="form-group">
 												<label for="datenaissancejoueur" class="col-sm-2 control-label">datenaissance</label>
 												<div class="col-sm-8">
 													<input type="date" class="form-control" name="datenaissancejoueur" id="datenaissancejoueur" disabled="">
 												</div>									
 											</div>

 											<div class="form-group">
 												<label for="nouveaumotdepasse" class="col-sm-2 control-label">NV MP</label>
 												<div class="col-sm-8">
 													<input type="password" class="form-control" name="nouveaumotdepasse" id="nouveaumotdepasse" placeholder="***********" required>
 												</div>
 											</div>
 										</div>

 										<!-- les bouttons annuler et Enregistrer -->
 										<div class="col-md-12">
 											<div class="boutonsForm">
 												<button type="reset"   class="button button1">Annuler</button>
 												<button type="submit"   class="button button1" name="enregistrer" id="enregistrer" onclick='window.location.reload()' >Enregistrer</button>
 											</div>
 										</div>						
 									</div>
 								</form>				 
 							</div>
 						</div>

 					</section>

 					

 					<!-- la section classement -->
 					<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="classement">

 						<h2 class="mb-5">Classement</h2>

 						<!-- un tableau pour afficher les classments du joueur -->
 						<div class="fresh-table  ">

 							<table id="fresh-table" class="table">

 
 								<!-- la racupération des données depuis la table user  -->
 								<?php
 								$afficherclassment ="SELECT prenom,email,score FROM user WHERE email != 'admin@admin.com' ORDER BY score DESC ";
 								$statementclassement = $bdd->prepare($afficherclassment);
 								$statementclassement->execute();
 								$numeroclassment=1;
 								?>
 								<tbody> <?php
 								while ($donnees = $statementclassement->fetch())
 								{
 									?>

 									

 										<tr>
 											<td><?php echo $numeroclassment++;?></td>
 											<td><?php echo $donnees['prenom'];?></td>
 											<td><?php echo $donnees['email'];?></td>
 											<td><?php echo $donnees['score'];?></td>			
 										</tr>
 										<?php
 										//var_dump($donnees);
 									}

 									?>

 								</tbody>
 							</table>
 						</div>

 					</section>
 				</div>

 				<!-- bootstrap -->
 				<script src="vendor/jquery/jquery.min.js"></script>
 				<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 				<!-- jquery -->
 				<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 				<!-- javascript -->
 				<script src="js/resume.min.js"></script>

 				<!-- data table javascript -->
 				<script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
 				<script type="text/javascript" src="assets/js/bootstrap.js"></script>
 				<script type="text/javascript" src="assets/js/bootstrap-table.js"></script>

 				<!-- script du data table -->
 				<script type="text/javascript">
 					var $table = $('#fresh-table'),
 					full_screen = false;

 					$().ready(function(){
 						$table.bootstrapTable({
 							toolbar: ".toolbar",

 							showRefresh: true,
 							search: true,
 							showToggle: true,
 							showColumns: true,
 							pagination: true,
 							striped: true,
 							pageSize: 8,
 							pageList: [8,10,25,50,100],

 							formatShowingRows: function(pageFrom, pageTo, totalRows){

 							},
 							formatRecordsPerPage: function(pageNumber){
 								return pageNumber + " rangée visible";
 							},
 							icons: {
 								refresh: 'fa fa-refresh',
 								toggle: 'fa fa-th-list',
 								columns: 'fa fa-columns',
 								detailOpen: 'fa fa-plus-circle',
 								detailClose: 'fa fa-minus-circle'
 							}
 						});



 						$(window).resize(function () {
 							$table.bootstrapTable('resetView');
 						});


 					});



 				</script>



 			</body>

 			</html>

