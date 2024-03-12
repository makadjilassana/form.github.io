<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<title> Recherche de vos documents </title>
</head>
<body>
<br><br>
<form  action="connectionBD.php" method="post">
       <div align= 'center'>
	<fieldset>
		 <img src="./assets/intm.png" alt="INTM Groupe">
		 <h1> Rechercher un document </h1><br>

<div class="form-group">
   <div class="col-auto">
     <label for="motsCles" class="visually-hidden">Mots Clés</label>
     <i class="fa fa-search"></i>
     <input type="text"  class="form-control mb-2 mr-sm-2" id="motsCles" placeholder="">
   </div>
   <div class="col-auto"><br>

  <button type="submit" class="btn btn-primary mb-3">Rechercher</button>
   </div>
    </fieldset>
</div>
      </div>

</form>
</body>
</html>
