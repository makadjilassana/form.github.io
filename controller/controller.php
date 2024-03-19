<?php

	/* fonction connection a la base de données */

	function connexion(){
		$user= 'root';
		$password= 'root';
		try{
      	  $bdd = new PDO('mysql:host=localhost;dbname=naturalisation;charset=utf8', $user, $password);
		  return ($bdd);
		}
		catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
		}
	}

	function insertion($dateDecret, $nom, $prenom, $dateNaissance, $villeNaissance, $serie, $departement){
try{
		$bdd = connexion();
	    $req = $bdd->prepare('INSERT INTO decret(dateDecret,nom,prenom,dateNaissance,villeNaissance,serie,departement) VALUES(:dateDecret,:nom,:prenom,:dateNaissance,:villeNaissance,:serie,:departement)');
	    $req->execute(array(
	    	'dateDecret' => $dateDecret,
		    'nom' => $nom,
		    'prenom' => $prenom,
		    'dateNaissance' => $dateNaissance,
		    'villeNaissance' => $villeNaissance,
		    'serie' => $serie,
		    'departement' => $departement
	));

}
catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
     }
}

	?>
