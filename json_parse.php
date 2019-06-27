<?php
ini_set('memory_limit', '-1');
	
	//$bdd = new PDO('mysql:host=localhost;dbname=jeucapitales;charset=utf8', 'root','');

   	$jsonCountries = file_get_contents('json/countries.geojson');
     $countries = json_decode($jsonCountries, true);
     
     
     //echo sizeof($countries['features']);
     //$coordinates = json_encode($countries);
     //var_dump($coordinates['features']);
/*usort($countries['features'][1], function($a, $b) { //Sort the array using a user defined function
    return $a['geometry']['coordinates'] > $b['geometry']['coordinates']? 1 : -1; //Compare the scores
}); */

//var_dump(array_reverse($countries['features'][1]['geometry']['coordinates'][], true));
var_dump($countries['features']);
    $jsonCapitals = file_get_contents('json/capitals.geojson');
     $capitals = json_decode($jsonCapitals, true);
usort($capitals['features'], function($a, $b) { //Sort the array using a user defined function
    return $a['properties']['iso2'] > $b['properties']['iso2']? 1 : -1; //Compare the scores
});                                                                                                                                             *                                                        

//var_dump($capitals['features']);
     

    try{
     for($i = 0 ; $i < sizeof($countries['features']) ; $i++){
          $requete1 = "INSERT INTO pays (iso, coordonnees) VALUES(:iso, :coordonnees)";         
          $statement1 = $bdd->prepare($requete1);         
          $statement1->execute(array(
          'iso' => json_encode($countries['features'][$i]['properties']['cca2']),
          'coordonnees' => json_encode($countries['features'][$i]['geometry']['coordinates'])
          ));
     }

   for ($j=0; $j < sizeof($capitals['features']) ; $j++) { 
          $requete2 = "INSERT INTO capitales (capitale, nomPays, iso, coordonnees) VALUES (:capitale, :nomPays, :iso, :coordonnees)";
          $statement2 = $bdd->prepare($requete2);
          $statement2->execute(array(
          'capitale' => json_encode($capitals['features'][$j]['properties']['city']),
          'nomPays' => json_encode($capitals['features'][$j]['properties']['country']),
          'iso' => strtolower(json_encode($capitals['features'][$j]['properties']['iso2'])),
          'coordonnees' => json_encode($capitals['features'][$j]['geometry']['coordinates'])
          ));
     }
}catch(Exception $e){
     echo($e->getMessage());
}

    
     //$statement = $bdd->prepare($requete);
	//$statement->execute(array(':json' => $jsonFormat));
     //echo $jsonFormat;
     // var_dump($jsonFormat);



?>

