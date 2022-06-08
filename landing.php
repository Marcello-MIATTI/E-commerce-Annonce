<?php
session_start();
require "header_user.php";
//  http://localhost/projet-deal/src/vue/user.php

?>
<div class="container">
    <div class="px-4 py-5 my-5 text-center">
    
    <h1 class="display-5 fw-bold">Bonjour ! <?php echo $_SESSION['pseudo']; ?> </h1>
    <div class="col-lg-6 mx-auto">
        <ul class="list-group">
            <li class="list-group-item">Mon pseudo : <?php echo $_SESSION['pseudo']; ?></li>
            <li class="list-group-item">Mon nom : <?php echo $_SESSION['nom']; ?></li>
            <li class="list-group-item">Mon prenom : <?php echo $_SESSION['prenom']; ?></li>
            <li class="list-group-item">Mon telephone : <?php echo $_SESSION['telephone']; ?></li>
        </ul>
    </div>
    <div class="container">
        <button type="submit" class="btn btn-danger btn-lg px-4 gap-3">Déconnexion</button>
    </div>
    </div>
</div>
