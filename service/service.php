<?php include ('../model/decret.php') ?>
<?php include ('../controller/controller.php') ?>
<?php

$texte = "BAQERI (Fatemeh), née le 23/02/1992 à Teheran (Iran), NAT, 2023X 020629, dép. 077, Dt. 008/136.
BARADJI (Djime), né le 01/03/1998 à Bamako (Mali), NAT, 2023X 020884, dép. 075, Dt. 008/138.";

function collectData($texte){
          return $texte;
     }

function extrairePhrasesDUnTexte($texte)
{
     $phrases = explode("Dt.", $texte);
     return $phrases;
}

function transformerPhrase($phrase)
{
     if(!preg_match('/^[A-Z]$/', $phrase[0])){
     $cmp = intval($phrase[0]);
     if(!preg_match('/^[A-Z]$/', $cmp)){
          return substr($phrase,10);
            }
     }
     else{
          return $phrase;
     }
}

function extraireMotsDUnePhrase($phrase)
{
     $aremplacer = array("née", "né", "le", "à","'"," ",",",";",".",":","!","?","(",")","[","]","{","}");
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

function insertionPersonneDansDecret($texte, $dateDecret){
     $phrases = listeNaturalisesParDecret($texte);
     /** chaque phrase detient les infos d'une pesonne naturalisée **/

     for($i = 0; $i<=count($phrases); $i++){
          $mots = extraireMotsDUnePhrase($phrases[$i]);
          $dateNaissance = explode("/",  $mots[2]);
          $dateNaissance = $dateNaissance[2].$dateNaissance[1].$dateNaissance[0];
          $personne = new Decret($dateDecret, $mots[0], $mots[1], $dateNaissance, $mots[3], $mots[6].$mots[7], $mots[9]);
          try{
               insertion($personne->getDateDecret(), $personne->getNom(), $personne->getPrenom(), $personne->getDateNaissance(), $personne->getVilleNaissance(), $personne->getSerie(), $personne->getDepartement());
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
