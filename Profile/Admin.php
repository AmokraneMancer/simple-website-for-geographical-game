<?php
 include_once '../ConnexionBD.php';
           session_start();
           $bdd = new PDO('mysql:host=localhost;dbname=jeucapitales;charset=utf8', 'root','');
// pour r?uperer le pr?om de l'administrateur (Bonjour Pr?om)
$emailprenom=$_SESSION["email"];		
$prenomafficher ="SELECT * FROM user WHERE email= '$emailprenom'";
$statement = $bdd->prepare($prenomafficher);
$statement->execute(array(':prenom' => $prenomafficher));
// pour afficher le nombre des joueures 

$nombrejoueures ="SELECT count(*) as nombre FROM user";
$statementnombre= $bdd->prepare($nombrejoueures);
$statementnombre->execute();
$donneesNombreJoueur =$statementnombre->fetch();


// pour afficher le nombre des question 

$nombrequestions ="SELECT count(question) as nombrequestion FROM questions";
$statementnombrequestions= $bdd->prepare($nombrequestions);
$statementnombrequestions->execute();
$donneesdonneesNombreQuestion=$statementnombrequestions->fetch();


// pour afficher la liste des joueurs 

$nombrequestions ="SELECT count(question) as nombrequestion FROM questions";
$statementnombrequestions= $bdd->prepare($nombrequestions);
$statementnombrequestions->execute();

		
		    if(isset($_POST['AjouterQuestion']))
		   {
        $categorie = $_POST['categorie'];
			   $capitale=$_POST['capitale'];
         $pays = $_POST['pays'];
		     $question=$_POST['question'];
		    $maxLat5=$_POST['maxLat5'];
			 $minLat5=$_POST['minLat5'];
			  $maxLgt5=$_POST['maxLgt5'];
			    $minLgt5=$_POST['minLgt5'];
			     $maxLat10=$_POST['maxLat10'];
				  $minLat10=$_POST['minLat10'];
				  $maxLgt10=$_POST['maxLgt10'];
				   $minLgt10=$_POST['minLgt10'];		   

				   
			 $sqlInsert ="INSERT INTO questions (question, categorie, pays, capitale, maxLat5, minLat5, maxLgt5, minLgt5,maxLat10,minLat10, maxLgt10, minLgt10) VALUES(:question, :categorie, :pays, :capitale, :maxLat5, :minLat5, :maxLgt5, :minLgt5, :maxLat10, :minLat10, :maxLgt10, :minLgt10)";
			 $statement = $bdd->prepare($sqlInsert);
	         $statement->execute(array(':question' => $question, ':categorie' => $categorie,':pays' => $pays, ':capitale' => $capitale, ':maxLat5' => $maxLat5, ':minLat5' => $minLat5, ':maxLgt5' => $maxLgt5,':minLgt5' => $minLgt5,':maxLat10' => $maxLat10,':minLat10' => $minLat10,':maxLgt10' => $maxLgt10,':minLgt10' => $minLgt10));
			    if($statement->rowCount() == 1)
					 {
						echo '<script>alert("insertion avec succ?")</script>';
				 }
					 else
					 {
						echo '<script>alert("Erreur d insertion")</script>';
					}
							   
		   }


		   
// $question=$_POST['question'];
		    // $replgmin5=$_POST['replgmin5'];
			 // $replgmax5=$_POST['replgmax5'];
			  // $repltmin5=$_POST['repltmin5'];
			   // $repltmax5=$_POST['repltmax5'];
			    // $repltmax10=$_POST['repltmax10'];
				 // $replgmin10=$_POST['replgmin10'];
				  // $replgmax10=$_POST['replgmax10'];
				   // $repltmin10=$_POST['repltmin10'];		   
		   
		   
?>
<!DOCTYPE html>

<html>

  <head>


 
    
	
	<!--Hist-->
        <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
   
	
    <title>Admin</title>
    <meta http-equiv="content-type" content="text/html" charset=UTF-8" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	
	<!--  style boutton afficher-->
 	
 
    <!-- Custom styles for this template -->
    <link href="css/resume.css" rel="stylesheet">
	<!-- Leaflet -->
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />  
   	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
	<link rel="icon" type="image/png" href="img/LogoM.jpg"  />

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">

		<h1>ADMIN</h1>
	  </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#ProfilAdmin">Profil Admin</a>
          </li>
         <!--  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#ModifierProfil">Modifier Profil</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#VisualiserJoueurs">Visualiser Joueurs</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#VisualiserCategories">Visualiser Catégories</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#VisualiserQuestions">Visualiser Questions</a>
          </li>
		  
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#AjouterAdmin">Ajouter Admin</a>
          </li> -->

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#AjouterQuestion">Ajouter Question</a>
          </li>
		   
		  
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../Deconnecter.php">Deconnexion</a>
          </li>
        </ul>
      </div>
    </nav>

<div class="container-fluid p-0">
	 <section class="resume-section p-3 p-lg-5 " id="ProfilAdmin">
     <div class="row">
                            <div class="col-lg-12 col-xl-4">
                                <div class="card-box">
                                    <div class="bar-widget">
                                        <div class="table-box">
                                            <div class="table-detail">
                                                <!-- <div class="iconbox bg-info"> -->
                                                    <i class="fa fa-users" style="font-size:48px"></i>
                                                <!-- </div> -->
                                            </div>

                                            <div class="table-detail">
											
											
                                                <h4 class="m-t-0 m-b-5"><b><?php echo $donneesNombreJoueur['nombre']?></b></h4>
											
                                                <p class="text-muted m-b-0 m-t-0">Nombre des Joueurs</p>
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
                                                    <i class="fa fa-question"></i>
                                                </div>
                                            </div>

                                            <div class="table-detail">
                                                
							
                                               <h4 class="m-t-0 m-b-5"><b><?php echo $donneesdonneesNombreQuestion['nombrequestion']?></b></h4>
											
                                                <p class="text-muted m-b-0 m-t-0">Nombre de Questions</p>
                                            </div>
                                         

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
     
        <div class="my-auto">
          <!-- <h2 >Les gerantes :</h2> -->
        </div>

		<div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
		 
		   <?php
		 
		  while ($donnees = $statement->fetch())
				{
            echo '<h2 class="section-heading text-uppercase"> Admin  :'.$donnees['prenom'].'</h2>';
				}
		   ?>
            <!-- <h3 class="section-subheading text-muted">n'h?iter pas ?nous contacter pour tout renseignement.</h3> -->
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="equipe">
              <img class="mx-auto rounded-circle" src="img/admin-icon.png" alt="">
              <h4>Mohammed Amokrane MANCER</h4>
              <p class="text-muted">Etudiant CNAM ile de France</p>
              <ul class="list-inline social-buttons">
                
               
              </ul>
            </div>
          </div>

         

      </section>

  <!--     <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="ModifierProfil">
        
      </section> -->

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="VisualiserJoueurs">
      <h2 class="mb-5">La liste Des Joueurs</h2>
	
	
	 
	 <div class="fresh-table">
		<table id="fresh-table" class="table">
		<?php
		
		$SqlAficherJoueurs="SELECT * FROM user";
		$statementAfficherJoueurs= $bdd->prepare($SqlAficherJoueurs);
		$statementAfficherJoueurs->execute();
		?>
		 
		 
                        <thead>
                            <th>Prenom</th>
                        	<th  data-sortable="true">Nom</th>
                        	<th  data-sortable="true">E-mail</th>
                        	<th data-sortable="true">datenaissance</th>
                        	<th >sexe</th>
							<th >niveau</th>
							<th >score</th>
                        	<th data-field="actions">Action</th>
                        </thead>
                        <tbody>
		  <?php
						while($donnees = $statementAfficherJoueurs->fetch())
		 {
           ?>                 <tr>
                            	<td><?php echo $donnees['prenom'] ?></td>
                            	<td><?php echo $donnees['nom'] ?></td>
                            	<td><?php echo $donnees['email'] ?></td>
                            	<td><?php echo $donnees['datenaissance'] ?></td>
								<td><?php echo $donnees['sexe'] ?></td>
								<td><?php echo $donnees['niveau'] ?></td>
								<td><?php echo $donnees['score'] ?></td>
								
								<td><a href="supprimerJoueur.php?email=<?php echo $donnees['email'] ?>" onclick="return confirm('voulez-vous supprimer ce Joueur ? o_O!')" role= "button" id="supprimer"><i class="fa fa-times"></i></a></td>
                            	
                            </tr>
		 <?php
		 }
         ?>               
                        </tbody>
				
        </table>
		
	  </div>	
      </section>
	  
	  
	  
	   <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="VisualiserCategories">
     <h2 class="mb-5">La liste Des Catégories</h2>
	
	
	 
	 <div >
		<table class="table table-fixed">
		<?php
		
		$sqlAfficherCat="SELECT * FROM categories";
		$statementAfficherCat= $bdd->prepare($sqlAfficherCat);
		$statementAfficherCat->execute();
		?>
		 
		 
                        <thead>
                            <th>Catégorie</th>
                        	<th  data-sortable="true">Description</th>
                        </thead>
                        <tbody>
		  <?php
						while($donnees = $statementAfficherCat->fetch())
		 {
           ?>                 <tr>
                            	<td><?php echo $donnees['nom'] ?></td>
                            	<td><?php echo $donnees['description'] ?></td>
                            	
                            </tr>
		 <?php
		 }
         ?>               
                        </tbody>
				
        </table>
	  </div>	
      </section>
	  
	  
	   <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="VisualiserQuestions">
      <h2 class="mb-5">La liste Des Questions</h2>
	 

	
	 
	 <div class="fresh-table toolbar-color-orange">
		<table id="fresh-table" class="table">
		<?php
		
		$SqlAficherQuestion="SELECT * FROM questions";
		$statementAfficherQuestion= $bdd->prepare($SqlAficherQuestion);
		$statementAfficherQuestion->execute();
		?>
		 
		 
                        <thead>
                            <th>Question</th>
                        	<th  data-sortable="true">Catéorie</th>
                          <th  data-sortable="true">Pays</th>
                          <th  data-sortable="true">Capitale</th>
                        	<th  data-sortable="true">MaxLat5</th>
                        	<th data-sortable="true">MinLat5</th>
                        	<th >MaxLgt5</th>
							<th >MinLgt5</th>
							<th >MaxLat10</th>
							<th >MinLat10</th>
							<th >MaxLgt10</th>
							<th >MinLgt10</th>

                        	
                        </thead>
                        <tbody>
		  <?php
						while($donnees = $statementAfficherQuestion->fetch())
		 {
           ?>                 <tr>
                            	<td><?php echo $donnees['question'] ?></td>
                            	<td><?php echo $donnees['categorie'] ?></td>
                              <td><?php echo $donnees['pays'] ?></td>
                              <td><?php echo $donnees['capitale'] ?></td>
                            	<td><?php echo $donnees['maxLat5'] ?></td>
                            	<td><?php echo $donnees['minLat5'] ?></td>
								<td><?php echo $donnees['maxLgt5'] ?></td>
								<td><?php echo $donnees['minLgt5'] ?></td>
								<td><?php echo $donnees['maxLat10'] ?></td>
                            	<td><?php echo $donnees['minLat10'] ?></td>
								<td><?php echo $donnees['maxLgt10'] ?></td>
								<td><?php echo $donnees['minLgt10'] ?></td>
								
								
                            	
                            </tr>
		 <?php
		 }
         ?>               
                        </tbody>
				
        </table>
		
	  </div>	
      </section>
	  
  

	  
	  
	  
	  
	  
	 <!-- Ajouter une question -->
    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="AjouterQuestion">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">     
                    <form class="form-horizontal" role="form" method="POST">
                                        <div class='row'>
                                            <div class="col-lg-12">
                                                <div class="ajouterquestion">
                                                    <span class="prg">Ajouter Question</span> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            
                                                <div class="col-lg-6">
                                                
													
													<div class="form-group">
                                                      <div class="col-sm-8">
                                                        <p>Catégorie :</p>
													  
													  <?php 
													  
													  $sqlAfficherCat ="SELECT nom FROM categories";
													  $statementAfficherCat= $bdd->prepare($sqlAfficherCat);
													   $statementAfficherCat->execute();
													  
													  ?>
                                                                    <select class="form-control" name="categorie"required>
																	
																	
																	<?php 
																	while ($donneesAfficherCat =$statementAfficherCat->fetch() ) 
																	{
																	    echo'<option>'.$donneesAfficherCat['nom'].'</option>';
																	}
                                                                     ?>
                                                                       
                                                                    </select>
                                                                </div>
												    </div>

                              <div class="form-group">
                                                         <label for="pays" class="col-sm-2 control-label">Pays:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="pays" id="pays"required>
                                                        </div>
                                                      </div>
													
													
													<div class="form-group" >
                                                        <label for="maxLat5" class="col-sm-2 control-label">maxLat5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="maxLat5" id="maxLat5"required>
                                                        </div>
                                                    </div>
													 <div class="form-group">
                                                        <label for="minLat5" class="col-sm-2 control-label">minLat5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="minLat5" id="minLat5"required>
                                                        </div>
                                                    </div>
													
                                                    <div class="form-group">
                                                        <label for="maxLgt5" class="col-sm-2 control-label">maxLgt5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="maxLgt5" id="maxLgt5"required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="minLgt5" class="col-sm-2 control-label">minLgt5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="minLgt5" id="minLgt5"required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6">
                                                    <!--<form class="form-horizontal" role="form">-->
                                                      <div class="form-group">
                                                         <label for="question" class="col-sm-2 control-label">Question?:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="question" id="question"required>
                                                        </div>
                                                        
                                                    </div>

                                                          <div class="form-group">
                                                         <label for="capitale" class="col-sm-2 control-label">Capitale:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="capitale" id="capitale"required>
                                                        </div>
                                                        
                                                
												
                                                  

                                                    <div class="form-group">
                                                        <label for="maxLat10" class="col-sm-2 control-label">maxLat10</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="maxLat10" id="maxLat10"required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="minLat10" class="col-sm-2 control-label">minLat10</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="minLat10" class="form-control" id="minLat10"required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="maxLgt10" class="col-sm-2 control-label">maxLgt10</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="maxLgt10" id="maxLgt10"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="minLgt10" class="col-sm-2 control-label">minLgt10</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="minLgt10" id="minLgt10"required>
                                                        </div>
                                                    </div>

                                                </div>
                                            
                                        </div>

                                        
                                                                                           
							
													 <div class="boutonsForm">

													<button type="reset"   class="button button1">Annuler</button>
													<button type="submit"   class="button button1" name="AjouterQuestion">Enregistrer</button>
													 </div>
														 
											 </div>
        
                                        </div>
                
                                         
                                        

                                     
                    </form>
                              
                            
                </div>    
			</div>
		</div>  
    </section>


 </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/resume.min.js"></script>
	
	<!--data table pour les visualisations-->
	 <script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-table.js"></script>

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
                    //do nothing here, we don't want to show the text "showing x of y from..." 
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rang? visible";
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
    
          
            window.operateEvents = {
                'click .edit': function (e, value, row, index) {
                    alert('You click edit icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);    
                },
                'click .remove': function (e, value, row, index) {
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
            
                }
            };
            
            
            
        });
            
		
        function rendreBouttonVisible() {
			var elm = document.getElementById("aideselect").value;
			if(elm == "joueurs"){
				document.getElementById("modifier").style.visibility = "hidden";
				document.getElementById("supprimer").style.visibility = "visible";
			}
        }
		
            
    </script>

  </body>

</html>
