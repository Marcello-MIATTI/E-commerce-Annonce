<?php  

  //   http://localhost/projet-deal/src/index.php
  require "home.php";
 
    if(isset($_GET['login_err']))
    {
        $err = htmlspecialchars($_GET['login_err']);
        switch($err)
        {
            case 'password' : ?>
              <div class="alert alert-danger">
                <strong> Erreur! </strong> mot de passe incorrect !
              </div>
          <?php
            break;
            case 'email' : ?>
              <div class="alert alert-danger">
                <strong> Erreur! </strong> email incorrect !
              </div>
          <?php
            break;
            case 'already' : ?>
              <div class="alert alert-danger">
                <strong> Erreur! </strong> Compte déjà existant !
              </div>
          <?php
            break;
        
        }
    }




?>