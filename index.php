
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Recherche de vos documents </title>
</head>
<body>

<br><br>

<form action="connectionBD.php" method="post">
         <div align= 'center'>
		 <fieldset>
		 <img src="./assets/intm.png" alt="INTM Groupe">
		 <h1> Rechercher un document </h1><br>


	 <label for="titre">Titre:</label>
         <input type="text" id="titre" name="titre">
         <br><br>
  <label for="contenu">Contenu:</label>
        <input type="text" id="contenu" name="contenu"><br>

  <br><br>
  <button type="submit" name="submit"> Envoyer</button>
    <input type="button" value="annuler">


     </fieldset>
  </div>


</form>
</body>
</html>
