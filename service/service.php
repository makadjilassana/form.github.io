<?php include ('../model/decret.php') ?>
<?php include ('../controller/controller.php') ?>
<?php

$var = "BARADJI (Djime), né le 05/03/1998 à Bamako (Mali), NAT, 2023X 020884, dép. 075, Dt. 008/138.";
// BALLO (Mafarma), née le 22/04/1998 à Dakar (Sénégal), NAT, 2023X 004922, dép. 093, Dt. 008/134.

function collectData($texte){
          return $texte;
     }

function extrairePhrasesDUnTexte($texte)
{

}
a
function extraireMotsDUnePhrase($phrase)
{
     $aremplacer = array(",",";",":","!","?","(",")","[","]","{","}","\"","'"
     ," ", "né", "née", "le", "à");
     $enremplacement = " ";
     $sansponctuation = trim(str_replace($aremplacer, $enremplacement, $phrase));
     $separateur = "#[ .]+#";
     $mots = preg_split($separateur, $sansponctuation);

     return $mots;
}

function insertionPersonneDansDecret($phrase, $dateDecret){
$mots = extraireMotsDUnePhrase($phrase);
$dateNaissance = explode("/",  $mots[2]);
$dateNaissance = $dateNaissance[2].$dateNaissance[1].$dateNaissance[0];
$personne = new Decret($dateDecret, $mots[0], $mots[1], $dateNaissance, $mots[3], $mots[6].$mots[7], $mots[9]);
try{
     insertion($personne->getDateDecret(), $personne->getNom(), $personne->getPrenom(), $personne->getDateNaissance(), $personne->getVilleNaissance(), $personne->getSerie(), $personne->getDepartement());
} catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
     }
}
insertionPersonneDansDecret($var, "2023-03-14");
?>
