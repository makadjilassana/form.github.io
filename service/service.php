<?php include ('../model/decret.php') ?>
<?php include ('../controller/controller.php') ?>
<?php

$texte =  collectData("decret00814032024.txt");

function collectData($filename){
     $fileContent = file_get_contents('../files/'.$filename);
     return $fileContent;
     }

function extrairePhrasesDUnTexte($texte)
{
     $phrases = explode("Dt.", $texte);
     return $phrases;
}

function transformerPhrase($phrase)
{
     if(!preg_match('/^[A-Z]$/', $phrase[0])){
     $tmp = intval($phrase[0]);
     if(!preg_match('/^[A-Z]$/', $tmp)){
          return substr($phrase,8);
            }
     }
          return $phrase;
}

function extraireMotsDUnePhrase($phrase)
{
     $aremplacer = array("née", "né", "le", "à","autorisée", "autorisé","s’appeler légalement","'"," ",",",";",".",":","!","?","(",")","[","]","{","}");
     $enremplacement = " ";
     $sansponctuation = trim(str_replace($aremplacer, $enremplacement, $phrase));
     $separateur = "#[ ]+#";
     $mots = preg_split($separateur, $sansponctuation);

     return $mots;
}

function listeNaturalisesParDecret($texte){
     $i = 0;
     $phrases = extrairePhrasesDUnTexte($texte);
     foreach($phrases as $phrase){
          $phrases[$i] = transformerPhrase($phrase);
          $i++;
     }
     return $phrases;
}

function extractionPaysNaissance($mot){
     if(!preg_match('/^[1-9]$/',$mot[0])){
          return $mot;
     }
         return "France";
}

function insertionPersonneDansDecret($texte, $dateDecret){
     $phrases = listeNaturalisesParDecret($texte);
     /** chaque phrase detient les infos d'une pesonne naturalisée **/

     for($i = 0; $i<=count($phrases); $i++){
          $mots = extraireMotsDUnePhrase($phrases[$i]);
          $dateNaissance = explode("/",  $mots[2]);
          $dateNaissance = $dateNaissance[2].$dateNaissance[1].$dateNaissance[0];[5];
          $paysNaissance = extractionPaysNaissance($mots[4]);
          $personne = new Decret($dateDecret, $mots[0], $mots[1], $dateNaissance, $mots[3], $paysNaissance,$mots[6].$mots[7], $mots[9]);
          try{
               insertion($personne->getDateDecret(), $personne->getNom(), $personne->getPrenom(), $personne->getDateNaissance(), $personne->getVilleNaissance(),  $personne->getPaysNaissance(), $personne->getSerie(), $personne->getDepartement());
          } catch (Exception $e){
               die('Erreur : ' . $e->getMessage());
          }
     }
}

$phrases = listeNaturalisesParDecret($texte);

for ($i = 0; $i<=count($phrases); $i++){
     $mots = extraireMotsDUnePhrase($phrases[$i]);
     for($j = 0; $j<=count($mots); $j++){
          print($mots[$j]);
          echo '</br>';
     }

}

insertionPersonneDansDecret($texte, "2023-03-14");

?>
