<?php 
session_start();
require "header.php";
require "./lib/function.php";
require "./lib/bdd.php";
 
   
    if( isset($_POST["pseudo"]) &&  isset($_POST["mdp"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["telephone"])  && isset($_POST["email"])) 
    {
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $telephone = htmlspecialchars($_POST["telephone"]);
        $email = htmlspecialchars($_POST["email"]);

        $check = $connexion_bdd->prepare('SELECT pseudo, email password FROM membres WHERE email=?');
        $check ->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0)
        {
            if(strlen($pseudo) <= 20 )  // verif lié au max value bdd
            {
                if(strlen($email) <=50 )
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if(preg_match('/[a-zA-Z0-9]/', $_POST["mdp"]))
                        {
                          
                            // ---insertion une fois tt les tests validés
                            $ma_requete = "INSERT INTO membres 
                            ( id_membre,pseudo, mdp,nom,prenom, telephone, email,statut, date_enregistrement)
                            VALUES( NULL,:pseudo,:mdp,:nom,:prenom,:telephone,:email,0,CURRENT_TIMESTAMP())";

                            $enregistrement = $connexion_bdd->prepare($ma_requete); 
                            $enregistrement->execute(
                            [
                                ":pseudo"=> $_POST["pseudo"],
                                ":mdp"=> password_hash($_POST["mdp"],PASSWORD_DEFAULT),
                                ":nom"=> $_POST["nom"],
                                ":prenom"=> $_POST["prenom"],
                                ":telephone"=> $_POST["telephone"],
                                ":email"=> $_POST["email"]
                                
                            ]);
                            ?>
                            <div class="col-md-6 mt-3 alert alert-success">
                                <strong> Succès ! </strong> inscription réussie !
                            </div>
                           <?php
                           
                           
                        }else header('Location:subscribe.php?reg_err=mdp');
                    }else header('Location:subscribe.php?reg_err=email');
                }else header('Location:subscribe.php?reg_err=email_big');
            }else header('Location:subscribe.php?reg_err=pseudo_big');
        }else header('Location:subscribe.php?reg_err=already');  // pour préciser que l'user est déjà dedans
    }
 
    
         
    ?>
    <div class="container mt-5">
      <div class="col align-self-center">
    <?php       
      if(isset($_GET['reg_err']))
    {
        $err = htmlspecialchars($_GET['reg_err']);
        switch($err)
        {
            case 'success' : ?>
              <div class="col-md-6 mt-3 alert alert-success">
                <strong> Succès ! </strong> inscription réussie !
              </div>
          <?php
            break;
            case 'mdp' : ?>
              <div class="col-md-6 mt-3 alert alert-danger">
                <strong> Erreur! </strong> mot de passe différent !
              </div>
          <?php
            break;
            case 'email' : ?>
              <div class="col-md-6 mt-3 alert alert-danger">
                <strong> Erreur! </strong> Email non validé!
              </div>
          <?php
            break;
            case 'email_big' : ?>
                <div class="col-md-6 mt-3 alert alert-danger">
                  <strong> Erreur! </strong> E-mail trop long !
                </div>
            <?php
              break;
              case 'pseudo_big' : ?>
                <div class="col-md-6 mt-3 alert alert-danger">
                  <strong> Erreur! </strong> pseudo trop long !
                </div>
            <?php
              break;
              case 'already' : ?>
                <div class="col-md-6 mt-3 alert alert-danger">
                  <strong> Erreur! </strong> Compte déjà existant !
                </div>
            <?php
              break;
        
        }
    } ?>
            <form method="POST" class="flex-wrap">
                            <div class="col-md-6 mt-3">
                                <label for="civilite">Civilite</label>
                                <select  name="civilite" id="categorie" class="form-select" aria-label="select example">
                                  <option value="m">Monsieur</option>
                                  <option value="f">Madame</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="pseudo">Pseudo</label>
                                <input type="text" class="form-control" id="pseudo" name="pseudo" 
                                value="<?= (isset($_POST["pseudo"])) ? $_POST["pseudo"] : "" ?>"
                                placeholder="Placez votre Pseudo ici" >
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="mdp">Mot de passe</label>
                                <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Placez votre mdp ici"
                                value="<?= (isset($_POST["mdp"])) ? $_POST["mdp"] : "" ?>" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Placez votre Nom ici" 
                                value="<?= (isset($_POST["nom"])) ? $_POST["nom"] : "" ?>" required>
                            </div> 
                            <div class="col-md-6 mt-3">
                                <label for="prenom">Prenom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Placez votre Prenom ici"
                                value="<?= (isset($_POST["prenom"])) ? $_POST["prenom"] : "" ?>" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Placez votre telephone ici" value="<?= (isset($_POST["telephone"])) ? $_POST["telephone"] : "" ?>" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Placez votre email ici" 
                                value="<?= (isset($_POST["email"])) ? $_POST["email"] : "" ?>" required>
                            </div>
                            <div class="mb-3 mt-4">
                                <button type="submit" class="btn btn-outline-primary w-15" >Inscription </button>
                            </div>  
              </form>
    
      </div>
  </div>
  <?php require "footer.php"; ?>