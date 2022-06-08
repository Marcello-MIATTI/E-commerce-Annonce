<?php 
session_start();
require "header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Déposer une annonce</title>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col">   <!-- Partie gauche  -->
      <div class="container">
        <label for="titre"><strong>Titre</strong></label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="titre de l'annonce">
      </div>
      <hr class=" opacity-0">  <!-- bloc de spération -->
      <div class="container">
        <label for="floatingTextarea2"><strong>Description courte</strong></label>
        <textarea class="form-control" placeholder="Description courte de votre annonce" id="floatingTextarea2" style="height: 100px"></textarea>
      </div>
      <hr class=" opacity-0">
      <div class="container">
        <label for="floatingTextarea2"><strong>Description longue</strong></label>
        <textarea class="form-control" placeholder="Description longue de votre annonce" id="floatingTextarea2" style="height: 100px"></textarea>
      </div>
      <hr class=" opacity-0">
      <div class="container">
        <label for="pseudo"><strong>Prix</strong></label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Prix figurant dans l'annonce">
      </div>
      <hr class=" opacity-0">
      <div class="container">
        <label for="pseudo"><strong>Catégorie</strong></label>
        <select class="form-select" aria-label="select example">
          <option selected>Toutes les catégories</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
    </div>
    <div class="col">   <!-- Partie droite  -->
    <div class="row">
      <label for="pseudo"><strong>Photo</strong></label>
      <div class="col">Photo 1<a href="#" class="lien"><img src="../assets/images/camera-minus.png" alt="photo" style="height: 80px"></a></div>
      <div class="col">Photo 2<a href="#" class="lien"><img src="../assets/images/camera-minus.png" alt="photo" style="height: 80px"></a></div>
      <div class="col">Photo 3<a href="#" class="lien"><img src="../assets/images/camera-minus.png" alt="photo" style="height: 80px"></a></div>
      <div class="col">Photo 4<a href="#" class="lien"><img src="../assets/images/camera-minus.png" alt="photo" style="height: 80px"></a></div>
      <div class="col">Photo 5<a href="#" class="lien"><img src="../assets/images/camera-minus.png" alt="photo" style="height: 80px"></a></div>
    </div>
      <div class="container">
        <label for="pseudo"><strong>Pays</strong></label>
        <select class="form-select" aria-label="select example">
          <option selected>France</option>
          <option value="1">One</option>
          <option value="2">Two</option>
        </select>
    </div>
    <hr class=" opacity-0">
    <hr class=" opacity-0">
    <hr class=" opacity-0">
    <div class="container">
        <label for="pseudo"><strong>Ville</strong></label>
        <select class="form-select" aria-label="select example">
          <option selected>Paris</option>
          <option value="1">One</option>
          <option value="2">Two</option>
        </select>
    </div>
    <hr class=" opacity-0">
    <div class="container">
        <label for="floatingTextarea2"><strong> Adresse</strong></label>
        <textarea class="form-control" placeholder="Adresse figurant dans l'adresse" id="floatingTextarea2" placeholder="adresse figurant dans l'annonce" style="height: 100px"></textarea>
    </div>
    <hr class=" opacity-0">
      <div class="container">
        <label for="pseudo"><strong>Code postal</strong></label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Code postal figurant dans l'annonce">
      </div>
  </div>  
</div>
<div class="d-grid gap-2 col-1 mx-auto mt-5">
  <button type="button" class="btn btn-primary">Enregister</button>
</div>









</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>