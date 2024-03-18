<?php

$var = "BARADJI (Djime), né le 01/03/1998 à Bamako (Mali), NAT, 2023X 020884, dép. 075, Dt. 008/138.BALLO (Mafarma), née le 22/04/1998 à Dakar (Sénégal), NAT, 2023X 004922, dép. 093, Dt. 008/134.";

function collectData($texte){
          return $texte;
     }

function extrairePhrasesDUnTexte($texte)
{

}

function extraireMotsDUnePhrase($phrase)
{
     $aremplacer = array(",",";",":","!","?","(",")","[","]","{","}","\"","'"
     ," ");
     $enremplacement = " ";
     $sansponctuation = trim(str_replace($aremplacer, $enremplacement, $phrase));
     $separateur = "#[ .]+#";
     $mots = preg_split($separateur, $sansponctuation);

     return $mots;
}

/*$quelquesmots = extraireMotsDUnePhrase($var);
//print($quelquesmots[0])
foreach($quelquesmots as $valeur)
{
     echo "$valeur</br>";
}*/
?>
