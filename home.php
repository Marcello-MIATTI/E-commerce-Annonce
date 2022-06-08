<?php 
session_start();
require "header.php" ;
// require "src/lib/bdd.php" ;
// http://localhost/projet-deal/index.php
?>

  <div class="h-50 d-inline-block col-12"></div>
  <div class="container mt-5">
        <div class="row g-5">
        <!-- Partie droite -->
          <div class="col-md-4">
            <h2>Catégorie</h2>
            <form class="d-flex text-align-center">
             <select class="form-select" aria-label="Default select example">
                <option selected>Toutes les catégories</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            </form>
            <h2>Région</h2>
            <form class="d-flex text-align-center">
            <select class="form-select" aria-label="Default select example">
                <option selected>Toutes les catégories</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            </form>
            <h2>Membres</h2>
            <form class="d-flex text-align-center">
            <select class="form-select" aria-label="Default select example">
                <option selected>Toutes les catégories</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
          </div>
          <!-- Partie gauche -->
          <div class="col-md-8">
            <select class="form-select" aria-label="Default select example">
                <option selected>Toutes les catégories</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
                <hr>
            <div class="row">
                <div class="col">
                    <img class="fit-picture w-50" src="./assets/images/photo-1.jpg"
                    alt="top">
                </div>
                <div class="col">
                    <h3>Iphone 3</h3>
                    <p>Ce téléphone est super</p>
                </div>
            </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <img class="fit-picture w-50" src="./assets/images/photo-2.jpg"
                    alt="top">
                    </div>
                    <div class="col">
                        <h3>Iphone 3</h3>
                        <p>Ce téléphone est super</p>
                    </div>
                </div>
                <hr>
          </div>
      </div>
  </div>
</html>
<?php require "footer.php"; ?>