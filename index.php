<?php
include_once 'ConnexionBD.php'; // connecxion à la base de données 
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	<title>Capitales et Pays du Monde - Présentation</title>
	<meta charset="utf-8">
	
	<!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Polices -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
	 <!-- Styles -->
	<link href="style.css" rel="stylesheet">
	
	<!-- icon de l'onglet titre de la page -->
	<link rel="icon" type="image/png" href="Profile/img/logo.png"  />

	
	</head>
<body id="page-top">
	
	<!-- le menu de la page (navbar) -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">Capitales et Pays du Monde</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			  Menu
			  <i class="fa fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
			  <ul class="navbar-nav text-uppercase ml-auto">
				<li class="nav-item">
				  <a class="nav-link js-scroll-trigger" href="#services">Présentation</a>
				</li>
				
				<li class="nav-item">
				  <a class="nav-link js-scroll-trigger" href="#apropos">A propos</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link js-scroll-trigger" href="#contact">Contactez-Moi</a>
				</li>
			  </ul>
			</div>
		</div>
	</nav>

    <!-- entéte avec les deux bouttons "tester" et "Login/s'inscrire"-->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
         
          <div class="intro-heading text-uppercase">Bienvenue</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="test.php" >Tester</a>
		   <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger"  href="Login.php">Login / S'inscrire</a>
        </div>
      </div>
    </header>

    <!-- Présentation -->
    <section id="services">
		<div class="container">
			<div class="row">
			  <div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">Présentation</h2>
				<h3 class="section-subheading text-muted">Un Jeu pour mesurer ses progrès en culture générale, jour après jour.
					Parce que la culture générale ce n'est pas seulement Platon, Mozart et Victor Hugo, notre équipe  propose ce nouveau jeu pour développer votre culture générale. Les questions de culture généralee y occupent une large place.</h3>
			  </div>
			</div>
			<div class="row text-center">
			  <div class="col-md-8">
			  
				<h4 class="service-heading">Description</h4>
				<p class="text-muted">le principe de notre jeu est très simple, on propose deux catégories, chaque catégorie contient un questionnaire de sept questions, chaque question consiste a localiser sur une carte du monde à l'aide d'un clic de souris, l'emplacement pays ou capitale. tout dépend de la question !
				</p>

				<h4 class="service-heading">Les régles du jeu</h4>
				<p class="text-muted">pour chaque réponse dans la partie "capitale" vous aurez (10, 5 ou 0) points a savoir la distance entre votre clic et l'emplacement de la capitale </p>		
        <p class="text-muted">pour chaque réponse dans la partie "pays" vous aurez (10 ou 0) points a savoir si le point du clic est inclu dans le contour du pays demandé </p> 
				<p class="text-muted">chaque niveau est équivalent a 70 points, (entre 0 et 70 => niveau 1 , entre 71 et 140 => 2, ... etc)</p>
				<p class="text-muted"></p>
			  </div>
			  
			  <div class="col-md-4">
			  <img src="image/map-2153535.jpg" class="img-responsive" alt="carte du monde" width="450" height="300"> 
				
			  </div>
			
			</div>
		</div>
    </section>

 
 
    <!-- Groupe -->
    <section class="bg-light" id="apropos">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">A propos de moi : </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="team-member">
          
              <h4>Mohammed Amokrane MANCER</h4>
              <p class="text-muted">Etudiant au CNAM ile de France</p>
             <p >Projet Complet en open source sur :</p>
             
              <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://github.com/AmokraneMancer/social-application-for-an-association-beta" target="_blank">
              <i class="fa fa-github" ></i>
              </a>
            </li>
          </ul>

             
            </div>
          </div>

         
        </div>

      </div>
    </section>
		

    <!-- Contactez Nous -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contactez-Moi</h2>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="nom" type="text" placeholder="Votre Nom *" required data-validation-required-message="Veuillez entrer votre nom.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Votre Email *" required data-validation-required-message="Veuillez entrer votre Email.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="tel" type="phone" placeholder="Votre N° TEL *" required data-validation-required-message="Veuillez entrer votre Tel.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Votre Message *" required data-validation-required-message="Votre Message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envoyer Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- bas de pages le footer !-->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item" >
                <a href="https://github.com/AmokraneMancer" target="_blank">
                  <i class="fa fa-github"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.linkedin.com/in/mohammed-amokrane-mancer/" target="_blank">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <span class="copyright">Copyright amokrane.mancer &copy; 2019</span>
          </div>
        </div>
      </div>
    </footer>
	 


   
    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="jquery-easing/jquery.easing.min.js"></script>

    <!-- Formulaire de contact JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Scripts personnalisés pour ce modèle -->
    <script src="js/agency.min.js"></script>

</body>
</html>
	