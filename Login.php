<?php
include_once 'ConnexionBD.php';
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=jeucapitales;charset=utf8', 'root','');
// insertion dans la base de données les informations pour creer un utilisateur
if(isset($_POST['Inscrire']))
{
	$prenom=$_POST['prenom'];
	$nom=$_POST['nom'];
	$email=$_POST['email'];
	$datenaissance=$_POST['datenaissance'];
	$sexe=$_POST['sexe'];
	$motdepasse=md5($_POST['motdepasse']);
	//$questionsecurite=$_POST['question'];
	//$reponse=md5($_POST['reponse']);
	
	try {
	$sqlInsert ='INSERT INTO user (nom, prenom, email, motdepasse, sexe , dateinscription, datenaissance) VALUES(:nom, :prenom, :email, :motdepasse, :sexe, NOW(), :datenaissance)';
	
	$statement = $bdd->prepare($sqlInsert);
	$statement->execute(array('nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'motdepasse' => $motdepasse, 'sexe' => $sexe, 'datenaissance' => $datenaissance ));
	
	if($statement->rowCount() == 1)
	{
		header('Location:CompteBienCree.php');
	}
	} catch(Exception $ex)
	{
		//header('Location:index.php');
		echo($ex);
	}
}
else if(isset($_POST['Login']))
{
$admin='admin';

$email=$_POST['email'];	
$motdepasse=md5($_POST['motdepasse']);	
$sqlInsert ="SELECT * FROM user WHERE email= '$email' and motdepasse= '$motdepasse' ";
$statement = $bdd->prepare($sqlInsert);
$statement->execute(array(':email' => $_POST['email'], ':motdepasse' => $_POST['motdepasse']));
$count = $statement->rowCount();


if($count > 0)
{ 
    if ($motdepasse === md5($admin) )
	{
			 $_SESSION["email"] = $_POST["email"];
			 header("location:Profile/Admin.php");  
	} 
	if($motdepasse !== md5($admin))
	{
		$_SESSION["email"] = $_POST["email"];  
			 header("location:Profile/Joueur.php");  
	}

}
else
{
	 header("location:MotdepasseOrEmailIncorrecte.php");  
}

}



?>
<!DOCTYPE html>
<html>
		<head>
			<title>LE JEU DES CAPITALES  - Login</title>
	        <meta charset="utf-8">
	         <!-- Bootstrap  CSS de base -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<!-- Styles personnalisés pour ce modèle -->
	        <link href="LoginCss.css" rel="stylesheet">
			<link rel="icon" type="image/png" href="Profile/img/LogoM.jpg"  />
		
		</head>

<body>
	
	<div id="form">
		<div class="container">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
			  <div id="userform">
				<ul class="nav nav-tabs nav-justified" role="tablist">
				  <li class="tab"><a href="#signup"  role="tab" data-toggle="tab">S'inscrire</a></li>
				  <li class="tab active"><a href="#login"  role="tab" data-toggle="tab ">Login</a></li>
				</ul>

				<div class="tab-content">
				  <div class="tab-pane fade  in" id="signup">
					<h2 class="text-uppercase text-center"> Inscription Gratuite</h2>
					
					<!-- partie inscription -->
					<form id="signup" action="Login.php" method="POST">
					  <div class="row">
						<div class="col-xs-12 col-sm-6">
						  <div class="form-group">
							<label>Prénom<span class="req">*</span> </label>
							<input type="text" class="form-control"  name="prenom" id="prenom" required data-validation-required-message="S'il vous plaît entrez votre prénom." autocomplete="off">
							<p class="help-block text-danger"></p>
						  </div>
						</div>
						<div class="col-xs-12 col-sm-6">
						  <div class="form-group">
							<label> Nom<span class="req">*</span> </label>
							<input type="text" class="form-control"  name="nom" id="nom" required data-validation-required-message="S'il vous plaît entrez votre nom." autocomplete="off">
							<p class="help-block text-danger"></p>
						  </div>
						</div>
					  </div>
						<div class="row">
						<div class="col-xs-12 col-sm-6">
						  <div class="form-group">
							<label>Date Naissance<span class="req">aaaa-mm-jj</label>
							<input type="text" class="form-control"  name="datenaissance" id="datenaissance" required data-validation-required-message="S'il vous plaît entrez votre date de naissance." autocomplete="off">
							<p class="help-block text-danger"></p>
						  </div>
						</div>
						<div class="col-xs-12 col-sm-6">
						  <div class="form-group">
							<label> Sexe<span class="req">M||F</span> </label>
							<input type="text" class="form-control"  name="sexe" id="sexe" required data-validation-required-message="S'il vous plaît entrez votre sexe." autocomplete="off">
							<p class="help-block text-danger"></p>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<label> E-mail<span class="req">*</span> </label>
						<input type="email" class="form-control" name="email" id="email" required data-validation-required-message="S'il vous plaît entrez votre E-mail." autocomplete="off">
						<p class="help-block text-danger"></p>
					  </div>
					 
					 
					  <div class="form-group">
						<label> Mot de passe<span class="req">*</span> </label>
						<input type="password" class="form-control"  name="motdepasse" id="motdepasse" required data-validation-required-message="S'il vous plaît entrez votre mot de passe." autocomplete="off">
						<p class="help-block text-danger"></p>
					  </div>

					  <div class="mrgn-30-top">
						<button type="submit" class="btn btn-larger btn-block" name="Inscrire" />
						Inscrire
						</button>
					  </div>
						<div class="mrgn-30-top">
						<button type="reset" class="btn btn-larger btn-block" name="cancel" />
						Cancel
						</button>
					  </div>
					</form>
				  </div>
				  <div class="tab-pane fade active in" id="login">
					<h2 class="text-uppercase text-center"> Login</h2>
					
					<!-- partie d'authentification-->
					<form id="login" action="Login.php" method="post">
					  <div class="form-group">
						<label> E-mail<span class="req">*</span> </label>
						<input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
						<p class="help-block text-danger"></p>
					  </div>
					  <div class="form-group">
						<label> Mot de passe<span class="req">*</span> </label>
						<input type="password" class="form-control" id="motdepasse" name="motdepasse" required data-validation-required-message="Please enter your password" autocomplete="off">
						<p class="help-block text-danger"></p>
					  </div></br>

					  <div class="mrgn-30-top">
						<button type="submit" class="btn btn-larger btn-block" name="Login"/>
						Login
						</button>
					  </div>
					  <div class="mrgn-30-top">
						<button type="reset" class="btn btn-larger btn-block" name="cancel"/>
						Cancel
						</button>
					  </div>

					 
					</form>
				  </div>
				</div>
			  </div>
			</div>
		</div>
		  <!-- /.container --> 
	</div>

<script>
$('#form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

      if (e.type === 'keyup') {
            if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
            label.removeClass('active highlight'); 
            } else {
            label.removeClass('highlight');   
            }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
            label.removeClass('highlight'); 
            } 
      else if( $this.val() !== '' ) {
            label.addClass('highlight');
            }
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(800);
  
});
</script>

</body>
</html>