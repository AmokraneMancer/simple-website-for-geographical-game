<?php
 
	// recuperation dees données
    $question=$_GET['question'];
	include_once '../ConnexionBD.php';
    $bdd = new PDO('mysql:host=localhost;dbname=jeucapitales;charset=utf8', 'root','');

	$sqlUpdate="SELECT * FROM questions WHERE question='$question'";
	$statement=$bdd->prepare($sqlUpdate);
	$statement->execute();
	$donnee=$statement->fetch();

	
	
?>
<!DOCTYPE html>
<html>

  <head>


	<meta charset="utf-8">
    <title>Admin - modifier question</title>
	
	<!-- data table-->
        <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
		<link rel="icon" type="image/png" href="img/LogoM.jpg"  />
   
	
   

    <!-- Bootstrap  CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- styles-->
    <link href="css/resume.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
		<h1>ADMIN</h1>
	  </a>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Admin.php">Profil Admin</a>
          </li>
        
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#ModifierQuestion">Modifier Question</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../Deconnecter.php">Deconnexion</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
  
	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="ModifierQuestion">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">     
                                    <form class="form-horizontal" method="POST" action="modifierMerveilleQuestionScript.php">
                                        <div class='row'>
                                            <div class="col-lg-12">
                                                <div class="ajoutermerveille">
                                                    <span class="prg">Modifier question</span> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            
                                                <div class="col-lg-6">
                                                
                                                    <div class="form-group">
                                                        <label for="questionM" class="col-sm-2 control-label">QuestionM </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="questionM" id="questionM" value="<?php echo $donnee['question']; ?>" disabled required><input name="questionMM" type="hidden" value="<?php echo $donnee['question']; ?>">
                                                        </div>
                                                    </div>
													
													<div class="form-group" >
                                                        <label for="maxLat5" class="col-sm-2 control-label">maxLat5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="maxLat5" id="maxLat5" value="<?php echo $donnee['maxLat5']; ?>"required>
                                                        </div>
                                                    </div>
													
												
													 <div class="form-group">
                                                        <label for="minLat5" class="col-sm-2 control-label">minLat5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="minLat5" id="minLat5"  value="<?php echo $donnee['minLat5']; ?>"required>
                                                        </div>
                                                    </div>
													
                                                    <div class="form-group">
                                                        <label for="maxLgt5" class="col-sm-2 control-label">maxLgt5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="maxLgt5" id="maxLgt5"  value="<?php echo $donnee['maxLgt5']; ?>"required>
                                                        </div>
                                                    </div>
                                                    
													<div class="form-group">
                                                        <label for="minLgt5" class="col-sm-2 control-label">minLgt5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="minLgt5" id="minLgt5"  value="<?php echo $donnee['minLgt5']; ?>"required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6">
                                                  
                                                   <div class="form-group">
                                                        <label for="nomMerveilleM" class="col-sm-2 control-label">nomMerveilleM </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="nomMerveilleM" id="nomMerveille"  value="<?php echo $donnee['nomMerveille']; ?>"required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                         <label for="maxLat10" class="col-sm-2 control-label">maxLat10</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="maxLat10" id="maxLat10" value="<?php echo $donnee['maxLat10']; ?>"required>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="minLat10" class="col-sm-2 control-label">minLat10</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="minLat10" id="minLat10"  value="<?php echo $donnee['minLat10']; ?>"required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="maxLgt10" class="col-sm-2 control-label">maxLgt10</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="maxLgt10" class="form-control" id="maxLgt10"  value="<?php echo $donnee['maxLgt10']; ?>"required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="minLgt10" class="col-sm-2 control-label">minLgt10</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="minLgt10" id="minLgt10" value="<?php echo $donnee['minLgt10']; ?>"required>
                                                        </div>
                                                    </div>
													
										
                                                </div>

                                            
                                        </div>

                                        <div class="row">
                                         
                                                   
                                         <div class="col-lg-12">
                                                    <div class="ajoutermerveille">
                                                     </div>  
                                                 <div class="boutonsForm">

												<button type="reset"   class="button button1">Annuler</button>
												<button type="submit"   class="button button1" name="ModifierQuestion">Modifier</button>
						                         </div>
                                                     
                                         </div>
 
                                                    </div>
                                    </form>
					</div>
				</div>
			</div>	 
      </section>
    </div>
    <!-- jquery JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/resume.min.js"></script>

  </body>

</html>
