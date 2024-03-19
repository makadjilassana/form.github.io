<?php include ('../model/decret.php') ?>
<?php include ('../controller/controller.php') ?>
<?php

$texte = "BAQERI (Fatemeh), née le 23/02/1992 à Téhéran (Iran), NAT, 2023X 020629, dép. 077, Dt. 008/136.
BARA (Khalifa), née le 04/04/1978 à Ait Aicha (Algérie), NAT, 2023X 021175, dép. 067, Dt. 008/137.
BARADJI (Djime), né le 01/03/1998 à Bamako (Mali), NAT, 2023X 020884, dép. 075, Dt. 008/138.
BARBOSA CAMPOS (Aida, Maria), née le 28/09/1974 à Geme Vila Verde (Portugal), NAT, 2023X 021641,
dép. 033, Dt. 008/139. ";

function collectData($texte){
          return $texte;
     }

function extrairePhrasesDUnTexte($texte)
{
     $phrases = explode("Dt.", $texte);
    /* for($i=0; $i<= count($phrases); $i++){
          $phrases[i] = transformerPhrase($phrases[i]);
     } */
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
     $aremplacer = array(",",";",".",":","!","?","(",")","[","]","{","}","\"","'"
     ," ", "né", "née", "le", "à");
     $enremplacement = " ";
     $sansponctuation = trim(str_replace($aremplacer, $enremplacement, $phrase));
     $separateur = "#[ ]+#";
     $mots = preg_split($separateur, $sansponctuation);

     return $mots;
}

function listeNaturalisesParDecret($phrases){

}

function insertionPersonneDansDecret($texte, $dateDecret){
     $phrases = extrairePhrasesDUnTexte($texte);
     for($i = 0; $i<=count($phrases); $i++){
          $mots = extraireMotsDUnePhrase($phrases[i]);
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
$phrases = extrairePhrasesDUnTexte($texte);
print($phrases[0]);
echo '</br>';
print(transformerPhrase($phrases[0]));

echo '</br>';
print($phrases[1]);
echo '</br>';
print(transformerPhrase($phrases[1]));

echo '</br>';
print($phrases[2]);
echo '</br>';
print(transformerPhrase($phrases[2]));

echo '</br>';
print($phrases[3]);
echo '</br>';
print(transformerPhrase($phrases[3]));
//insertionPersonneDansDecret($texte, "2023-03-14");
?>
