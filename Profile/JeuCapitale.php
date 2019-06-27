<?php
 include_once '../ConnexionBD.php';
 $bdd = new PDO('mysql:host=localhost;dbname=jeucapitales;charset=utf8', 'root','');
 session_start();
$email=$_SESSION["email"];



// recuperation des questions d'une certaine categorie

$sqlgetques = "SELECT * FROM questions WHERE categorie='capitale' ORDER BY RAND() "; //WHERE categorie = 'capitale'";
$statementjeux = $bdd->prepare($sqlgetques);
$statementjeux->execute();

$qst = array();
while($donneeStatementJeu = $statementjeux->fetch())
{
	$qst[] = $donneeStatementJeu['question'];
	$cat[] = $donneeStatementJeu['categorie'];
	$pays[] = $donneeStatementJeu['pays'];
	$capitales[] = $donneeStatementJeu['capitale'];
}
		   
	   			   
?>


<!DOCTYPE html>
<html>

  <head>


    <meta charset="utf-8">
 
	
	

    <title>Jeu</title>
	
	<!--logo-->
	

<link rel="icon" type="image/png" href="img/LogoM.jpg"  />
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	
	
	
	

    <!-- Custom styles for this template -->
    <link href="css/resume.css" rel="stylesheet">
	<!-- Leaflet -->
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />  
   	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
   	<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script> 
	<!-- Jouer -->
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />  
	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
	<link href="Profile/css/StyleJouer.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="Profile/img/LogoM.jpg"  />

	

	
	
  </head>

  <body id="page-top" >


	  

	 
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        

      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger"  href="Joueur.php">Mon profil</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link js-scroll-trigger"  href="#Jouer">Jeu</a>
          </li>
         
          
        
          
		  <li class="nav-item">
           
            <a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')" href="../Deconnecter.php">Deconnecter</a>
			
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

	  
	  <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="Jouer">
                         

 
 
	<div class="row">
		
		
		
		
		

		
<div class="card-box" >

<div id="map" style="height : 400px;"></div>

<div class="panel panel-default" id="QstCapitales">
  <div class="panel-body">
        <form name="" method="POST" action="finPartieCapitales.php">
		
         <div class="PositionField">
			<fieldset>
				<legend>Trouver la Capitale : </legend>
				<fieldset>
				<legend ><input type="checkbox" id="question1" name="question1" onclick="check()" /><label>Question 1 :</label><?php echo $qst[0];?></legend>
				<input type="hidden" name="q1" value="<?php echo $qst[0];?>">
				<div class="LatLon">
				<label for="lq1">Latitude :</label><input type="text" name="lq1" id="ltq1"  />
				<label for="jq1">Longitude :</label><input  type="text" name="jq1" id="lgq1" /> 
				<label>10pts.</label>
				<div>
				</fieldset>
		
				<fieldset>
				<legend><input type="checkbox" id="question2" name="question2" onclick="check2()" /><label>Question 2 :</label><?php echo $qst[1];?></legend>
				<input type="hidden" name="q2" value="<?php echo $qst[1];?>">
				<div class="LatLon">
				<label for="lq2">Latitude : </label><input type="text" name="lq2" id="ltq2" />
				<label for="jq2">Longitude : </label><input  type="text" name="jq2" id="lgq2" />
				<label>10pts.</label>
				</div>
				</fieldset>

				<fieldset>
				<legend><input type="checkbox" id="question3" name="question3" onclick="check3()" /><label>Question 3 :</label><?php echo $qst[2];?></legend>
				<input type="hidden" name="q3" value="<?php echo $qst[2];?>">
				<div class="LatLon">
				<label for="lq3">Latitude :</label><input type="text" name="lq3" id="ltq3" />
				<label for="jq3">Longitude :</label><input  type="text" name="jq3" id="lgq3" />
				<label>10pts.</label>
				</div>
				</fieldset>

				<fieldset>
				<legend><input type="checkbox" id="question4" name="question4" onclick="check4()" /><label>Question 4 :</label><?php echo $qst[3];?></legend>
				<input type="hidden" name="q4" value="<?php echo $qst[3];?>">
				<div class="LatLon">
				<label for="lq4">Latitude :</label><input type="text" name="lq4" id="ltq4" />
				<label for="jq4">Longitude :</label><input  type="text" name="jq4" id="lgq4" />
				<label>10pts.</label>
				</div>
				</fieldset>
				
				<fieldset>
				<legend><input type="checkbox" id="question5" name="question5" onclick="check5()" /><label>Question 5 :</label><?php echo $qst[4];?></legend>
				<input type="hidden" name="q5" value="<?php echo $qst[4];?>">
				<div class="LatLon">
				<label for="lq5">Latitude :</label><input type="text" name="lq5" id="ltq5" />
				<label for="jq5">Longitude :</label><input  type="text" name="jq5" id="lgq5" />
				<label>10pts.</label>
				</div>
				</fieldset>
				
				<fieldset>
				<legend><input type="checkbox" id="question6" name="question6" onclick="check6()" /><label>Question 6 :</label><?php echo $qst[5];?></legend>
				<input type="hidden" name="q6" value="<?php echo $qst[5];?>">
				<div class="LatLon">
				<label for="lq6">Latitude :</label><input type="text" name="lq6" id="ltq6" />
				<label for="lq6">Longitude :</label><input  type="text" name="jq6" id="lgq6" />
				<label>10pts.</label>
				</div>
				</fieldset>
				
				<fieldset>
				<legend><input type="checkbox" id="question7" name="question7" onclick="check7()" /><label>Question 7 :</label><?php echo $qst[6];?></legend>
				<input type="hidden" name="q7" value="<?php echo $qst[6];?>">
				<div class="LatLon">
				<label for="lq7">Latitude :</label><input type="text" name="lq7" id="ltq7" />
				<label for="jq7">Longitude :</label><input  type="text" name="jq7" id="lgq7" />
				<label >10pts.</label>
				</div>
				</fieldset>
				
			</fieldset><br>
        </div>

        <div class="boutonsForm">

 
        <a href="finPartieCapitale.php"><button type="submit"   class="button button1" name="valider">valider</button></a>
        </div>
		
        </form>
    </div>
  </div>  
  
</div></div>

</form>




      </section>


     

      
      
      

     

    </div>

    <!-- jquery JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/resume.min.js"></script>

	<!--  Partie MAP  -->
<script type="text/javascript">
		var polygon1;
		var polygon2;
		var polygon3;
		var polygon4;
		var polygon5;
		var polygon6;
		var polygon7;

		var map;
		var markertest;
		var tab = new L.LayerGroup();
		console.log(tab);

// checkbox initilser a faux au chargement de la page
unable_check=document.getElementById("question1");
unable_check.checked=false;

unable_check1=document.getElementById("question2");
unable_check1.checked=false;

unable_check2=document.getElementById("question3");
unable_check2.checked=false;

unable_check3=document.getElementById("question4");
unable_check3.checked=false;

unable_check4=document.getElementById("question5");
unable_check4.checked=false;

unable_check5=document.getElementById("question6");
unable_check5.checked=false;

unable_check6=document.getElementById("question7");
unable_check6.checked=false;


// test de la checkbox pour connaitre sont état
var question1_check = false;
var efface1 = document.getElementById('question1'); 

var question2_check = false;
var efface2 = document.getElementById('question2'); 

var question3_check = false;
var efface3 = document.getElementById('question3'); 

var question4_check = false;
var efface4 = document.getElementById('question4'); 

var question5_check = false;
var efface5 = document.getElementById('question5');

var question6_check = false;
var efface6 = document.getElementById('question6'); 

var question7_check = false;
var efface7 = document.getElementById('question7'); 

function check() {        
	if (efface1.checked == true )
	{
		question1_check = true;
		question2_check=false;
		efface2.checked=false;
		question3_check=false;
		efface3.checked=false;
		question4_check=false;
		efface4.checked=false;
		question5_check=false;
		efface5.checked=false;
		question6_check=false;
		efface6.checked=false;
		question7_check=false;
		efface7.checked=false;
		console.log('ok');
	}

	else if (efface1.checked == false) 
		{ question1_check = false 
			console.log('NOK');
		}
		
	}
	function check2()
	{
		if(efface2.checked == true)
		{
			question2_check = true;
			question1_check=false;
			efface1.checked=false;
			question3_check=false;
			efface3.checked=false;
			question4_check=false;
			efface4.checked=false;
			question5_check=false;
			efface5.checked=false;
			question6_check=false;
			efface6.checked=false;
			question7_check=false;
			efface7.checked=false;
			console.log('ok');
		}
		
		else if (efface2.checked == false) 
			{ question2_check = false 
				console.log('NOK');
			}
		}
		function check3()
		{
			if(efface3.checked == true)
			{
				question3_check = true;
				question1_check=false;
				efface1.checked=false;
				question2_check=false;
				efface2.checked=false;
				question4_check=false;
				efface4.checked=false;
				question5_check=false;
				efface5.checked=false;
				question6_check=false;
				efface6.checked=false;
				question7_check=false;
				efface7.checked=false;
				console.log('ok');
			}

			else if (efface3.checked == false) 
				{ question3_check = false 
					console.log('NOK');
				}
			}
			function check4()
			{
				if(efface4.checked == true)
				{
					question4_check = true;
					question1_check=false;
					efface1.checked=false;
					question2_check=false;
					efface2.checked=false;
					question3_check=false;
					efface3.checked=false;
					question5_check=false;
					efface5.checked=false;
					question6_check=false;
					efface6.checked=false;
					question7_check=false;
					efface7.checked=false;
					console.log('ok');
				}

				else if (efface4.checked == false) 
					{ question4_check = false 
						console.log('NOK');
					}
				}

				function check5()
				{
					if(efface5.checked == true)
					{
						question5_check = true;
						question1_check=false;
						efface1.checked=false;
						question2_check=false;
						efface2.checked=false;
						question3_check=false;
						efface3.checked=false;
						question4_check=false;
						efface4.checked=false;
						question6_check=false;
						efface6.checked=false;
						question7_check=false;
						efface7.checked=false;
						console.log('ok');
					}

					else if (efface5.checked == false) 
						{ question5_check = false 
							console.log('NOK');
						}
					}
					function check6()
					{
						if(efface6.checked == true)
						{
							question6_check = true;
							question1_check=false;
							efface1.checked=false;
							question2_check=false;
							efface2.checked=false;
							question3_check=false;
							efface3.checked=false;
							question4_check=false;
							efface4.checked=false;
							question5_check=false;
							efface5.checked=false;
							question7_check=false;
							efface7.checked=false;
							console.log('ok');
						}

						else if (efface6.checked == false) 
							{ question6_check = false 
								console.log('NOK');
							}
						}
						function check7()
						{
							if(efface7.checked == true)
							{
								question7_check = true;
								question1_check=false;
								efface1.checked=false;
								question2_check=false;
								efface2.checked=false;
								question3_check=false;
								efface3.checked=false;
								question4_check=false;
								efface4.checked=false;
								question5_check=false;
								efface5.checked=false;
								question6_check=false;
								efface6.checked=false;
								console.log('ok');
							}

							else if (efface7.checked == false) 
								{ question7_check = false 
									console.log('NOK');
								}
							}



// affichage de la carte aux coordonnées et au niveau de zoom choisis

var northWest = L.latLng(90, -180);
var southEast = L.latLng(-90, 180);
var bornes = L.latLngBounds(northWest, southEast);
			// Initialisation de la couche StamenWatercolor
			var coucheStamenWatercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
				attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
				subdomains: 'abcd',
				ext: 'jpg'
			});
			// Initialisation de la carte et association avec la div
			map = new L.Map('map', {
				center: [48.858376, 2.294442],
				minZoom: 2,
				maxZoom: 18,
				zoom: 2,
				maxBounds: bornes
			});

			map.addLayer(coucheStamenWatercolor);

			

 	//map
 	map.on('click', selectM1);

 	function supprime(e) {
 		tab.clearLayers();
 	}


 	var premierClic = true;
 	var deuxiemeClic = false;
 	var premierClic2 = true;
 	var deuxiemeClic2 = false;
 	var premierClic3 = true;
 	var deuxiemeClic3 = false;
 	var premierClic4 = true;
 	var deuxiemeClic4 = false;
 	var premierClic5 = true;
 	var deuxiemeClic5 = false;
 	var premierClic6 = true;
 	var deuxiemeClic6 = false;
 	var premierClic7 = true;
 	var deuxiemeClic7 = false;




                function coordGeoJSON(latlng,precision) { 
                	return '[' +
                	L.Util.formatNum(latlng.lng, precision) + ',' +
                	L.Util.formatNum(latlng.lat, precision) + ']';
                }

                function selectM1(e){ 
                	var popup = L.popup();
                	popup.setLatLng(e.latlng)
                	.setContent("Hello click détecté sur la carte !<br/> " + e.latlng.toString()+ "<br/>en GeoJSON: " + coordGeoJSON(e.latlng,7) + "<br/>Niveau de  Zoom: " + map.getZoom().toString())
                	.openOn(map);
                	
                	if (question1_check==true){

	                      if (premierClic) {
                       <?php
                        $sqlgetcoord = "SELECT p.coordonnees FROM pays p LEFT JOIN capitales c ON p.iso = c.iso WHERE capitale = '$capitales[0]' "; //WHERE categorie = 'capitale'";
                        $statement = $bdd->prepare($sqlgetcoord);
                        $statement->execute();
                        $coordArray = $statement->fetch();
                        $coord = json_decode($coordArray['coordonnees']);
                        //var_dump($coord);
                              //var_dump($statementjeux);
                        ?>

                        var data1 =  <?php  echo json_encode($coord); ?>;
                        //alert(data2);
                        
                        //var latLngs = L.GeoJSON.coordsToLatLngs(data,1);
                        
                        const latLngs1 =  L.GeoJSON.coordsToLatLngs(data1,1);//.addTo(map);
                        polygon1 = L.polygon(latLngs1);
                        map.addLayer(polygon1);
                        map.fitBounds(polygon1.getBounds());
                       	premierClic = deuxiemeClic;
                       	deuxiemeClic = true;
                       }

                       var x = e.latlng.lat;
                       var y = e.latlng.lng;
                       document.getElementById('ltq1').value=x;
                       document.getElementById('lgq1').value=y;
                       /*console.log(x,y);  */       
                   }
                   else if (question1_check==false){ 
                   	var curseur = document.getElementById('map');
                   	curseur.style.cursor='grab'; 
                   	map.removeLayer(polygon1);
                   }

                	if (question2_check==true)
                	{
                		                		
                		if (premierClic2) {
                			
                			<?php
                        $sqlgetcoord = "SELECT p.coordonnees FROM pays p LEFT JOIN capitales c ON p.iso = c.iso WHERE capitale = '$capitales[1]' "; //WHERE categorie = 'capitale'";
                        $statement = $bdd->prepare($sqlgetcoord);
                        $statement->execute();
                        $coordArray = $statement->fetch();
                        $coord = json_decode($coordArray['coordonnees']);
                        //var_dump($coord);
                              //var_dump($statementjeux);
                        ?>

                        var data2 =  <?php  echo json_encode($coord); ?>;
                        //alert(data2);
                        
                        //var latLngs = L.GeoJSON.coordsToLatLngs(data,1);
                        
                        const latLngs2 =  L.GeoJSON.coordsToLatLngs(data2,1);//.addTo(map);
                        polygon2 = L.polygon(latLngs2);
                        map.addLayer(polygon2);
                        map.fitBounds(polygon2.getBounds());
                    
                			
                			premierClic2 = deuxiemeClic2;
                			deuxiemeClic2 = true;
                		}

                		var x = e.latlng.lat;
                		var y = e.latlng.lng;
                		document.getElementById('ltq2').value=x;
                		document.getElementById('lgq2').value=y;
                		/*console.log(x,y);  */       
                	}    
                	else if (question2_check==false){ 
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='grab'; 
                		map.removeLayer(polygon2);
                	}
                	if (question3_check==true)
                	{
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='pointer';

                		var coord = e.latlng.toString();

                		if (premierClic3) {
                			

                		
                			<?php
                        $sqlgetcoord = "SELECT p.coordonnees FROM pays p LEFT JOIN capitales c ON p.iso = c.iso WHERE capitale = '$capitales[2]' "; //WHERE categorie = 'capitale'";
                        $statement = $bdd->prepare($sqlgetcoord);
                        $statement->execute();
                        $coordArray = $statement->fetch();
                        $coord = json_decode($coordArray['coordonnees']);
                        //var_dump($coord);
                              //var_dump($statementjeux);
                        ?>

                        var data3 =  <?php  echo json_encode($coord); ?>;
                        
                        //var latLngs = L.GeoJSON.coordsToLatLngs(data,1);
                        
                        const latLngs3 =  L.GeoJSON.coordsToLatLngs(data3,1);//.addTo(map);
                        polygon3 = L.polygon(latLngs3);
                        map.addLayer(polygon3);
                        map.fitBounds(polygon3.getBounds());
                    

                			premierClic3 = deuxiemeClic3;
                			deuxiemeClic3 = true;
                		}

                		var x = e.latlng.lat;
                		var y = e.latlng.lng;
                		document.getElementById('ltq3').value=x;
                		document.getElementById('lgq3').value=y;
                		/*console.log(x,y);  */       
                	}    
                	else if (question3_check==false){ 
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='grab'; 
                		map.removeLayer(polygon3);
                	}
                	if (question4_check==true)
                	{
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='pointer';

                		var coord = e.latlng.toString();
                		

                    if (premierClic4) {
                			
                    		<?php
                        $sqlgetcoord = "SELECT p.coordonnees FROM pays p LEFT JOIN capitales c ON p.iso = c.iso WHERE capitale = '$capitales[3]' "; //WHERE categorie = 'capitale'";
                        $statement = $bdd->prepare($sqlgetcoord);
                        $statement->execute();
                        $coordArray = $statement->fetch();
                        $coord = json_decode($coordArray['coordonnees']);
                        //var_dump($coord);
                              //var_dump($statementjeux);
                        ?>

                        var data4 =  <?php  echo json_encode($coord); ?>;
                        //alert(data2);
                        
                        //var latLngs = L.GeoJSON.coordsToLatLngs(data,1);
                        
                        const latLngs4 =  L.GeoJSON.coordsToLatLngs(data4,1);//.addTo(map);
                        polygon4 = L.polygon(latLngs4);
                        map.addLayer(polygon4);
                        map.fitBounds(polygon4.getBounds());
                			premierClic4 = deuxiemeClic4;
                			deuxiemeClic4 = true;
                		}

                		var x = e.latlng.lat;
                		var y = e.latlng.lng;
                		document.getElementById('ltq4').value=x;
                		document.getElementById('lgq4').value=y;
                		/*console.log(x,y);  */       
                	}    
                	else if (question4_check==false){ 
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='grab'; 
                		map.removeLayer(polygon4);
                	}

                	if (question5_check==true)
                	{
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='pointer';

                		var coord = e.latlng.toString();

                		if (premierClic5) {
                			
                			<?php
                        $sqlgetcoord = "SELECT p.coordonnees FROM pays p LEFT JOIN capitales c ON p.iso = c.iso WHERE capitale = '$capitales[4]' "; //WHERE categorie = 'capitale'";
                        $statement = $bdd->prepare($sqlgetcoord);
                        $statement->execute();
                        $coordArray = $statement->fetch();
                        $coord = json_decode($coordArray['coordonnees']);
                        //var_dump($coord);
                              //var_dump($statementjeux);
                        ?>

                        var data5 =  <?php  echo json_encode($coord); ?>;
                        
                        //var latLngs = L.GeoJSON.coordsToLatLngs(data,1);
                        
                        const latLngs5 =  L.GeoJSON.coordsToLatLngs(data5,1);//.addTo(map);
                        polygon5 = L.polygon(latLngs5);
                        map.addLayer(polygon5);
                        map.fitBounds(polygon5.getBounds());
                    

                			premierClic5 = deuxiemeClic5;
                			deuxiemeClic5 = true;
                		}

                		var x = e.latlng.lat;
                		var y = e.latlng.lng;
                		document.getElementById('ltq5').value=x;
                		document.getElementById('lgq5').value=y;
                		/*console.log(x,y);  */      
                	}    
                	else if (question5_check==false){ 
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='grab';
                		map.removeLayer(polygon5); 
                	}
                	if (question6_check==true)
                	{
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='pointer';

                		var coord = e.latlng.toString();
                		if (premierClic6) {
                			<?php
                        $sqlgetcoord = "SELECT p.coordonnees FROM pays p LEFT JOIN capitales c ON p.iso = c.iso WHERE capitale = '$capitales[5]' "; //WHERE categorie = 'capitale'";
                        $statement = $bdd->prepare($sqlgetcoord);
                        $statement->execute();
                        $coordArray = $statement->fetch();
                        $coord = json_decode($coordArray['coordonnees']);
                        //var_dump($coord);
                              //var_dump($statementjeux);
                        ?>

                        var data6 =  <?php  echo json_encode($coord); ?>;
                        //alert(data2);
                        
                        //var latLngs = L.GeoJSON.coordsToLatLngs(data,1);
                        
                        const latLngs6 =  L.GeoJSON.coordsToLatLngs(data6,1);//.addTo(map);
                        polygon6 = L.polygon(latLngs6);
                        map.addLayer(polygon6);
                        map.fitBounds(polygon6.getBounds());

                			premierClic6 = deuxiemeClic6;
                			deuxiemeClic6 = true;
                		}

                		var x = e.latlng.lat;
                		var y = e.latlng.lng;
                		document.getElementById('ltq6').value=x;
                		document.getElementById('lgq6').value=y;
                		/*console.log(x,y);  */       
                	}    
                	else if (question6_check==false){ 
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='grab'; 
                		map.removeLayer(polygon6);
                	}
                	if (question7_check==true)
                	{
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='pointer';

                		var coord = e.latlng.toString();

                		if (premierClic7) {
                			
                			<?php
                        $sqlgetcoord = "SELECT p.coordonnees FROM pays p LEFT JOIN capitales c ON p.iso = c.iso WHERE capitale = '$capitales[6]' "; //WHERE categorie = 'capitale'";
                        $statement = $bdd->prepare($sqlgetcoord);
                        $statement->execute();
                        $coordArray = $statement->fetch();
                        $coord = json_decode($coordArray['coordonnees']);
                        //var_dump($coord);
                              //var_dump($statementjeux);
                        ?>

                        var data7 =  <?php  echo json_encode($coord); ?>;
                        
                        //var latLngs = L.GeoJSON.coordsToLatLngs(data,1);
                        
                        const latLngs7 =  L.GeoJSON.coordsToLatLngs(data7,1);//.addTo(map);
                        polygon7 = L.polygon(latLngs7);
                        map.addLayer(polygon7);
                        map.fitBounds(polygon7.getBounds());
                           
                			premierClic7 = deuxiemeClic7;
                			deuxiemeClic7 = true;
                		}

                		var x = e.latlng.lat;
                		var y = e.latlng.lng;
                		document.getElementById('ltq7').value=x;
                		document.getElementById('lgq7').value=y;
                		/*console.log(x,y);  */       
                	}    
                	else if (question7_check==false){ 
                		var curseur = document.getElementById('map');
                		curseur.style.cursor='grab'; 
                		map.removeLayer(polygon7);
                	}
                }
                




            </script>



  </body>

</html>
