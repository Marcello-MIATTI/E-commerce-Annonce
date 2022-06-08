<?php 
session_start();
require "./lib/bdd.php"; 

if($_POST){
    if($_POST['pseudo'] && $_POST['mdp']) {

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = htmlspecialchars($_POST['mdp']);

        $sql = 'SELECT * FROM membres WHERE pseudo= :pseudo';

        $membre = $connexion_bdd->prepare($sql);
        $membre->execute(
        [
            ":pseudo"=> $_POST["pseudo"]
        ]
        );

        if ($membre->rowCount() == 1){   // On vérifie que la réponse de la requête contient au moins 1 résulat

            $reponse= $membre->fetch(PDO::FETCH_ASSOC);
            $mdp_ok = password_verify(($_POST["mdp"]),($reponse['mdp'])); 
    
            if($mdp_ok)
            {
                $_SESSION['pseudo'] = $reponse['pseudo'];
                $_SESSION['mdp'] = $reponse['mdp'];
                $_SESSION['nom'] = $reponse['nom'];
                $_SESSION['prenom'] = $reponse['prenom'];
                $_SESSION['telephone'] = $reponse['telephone'];
                header('Location:landing.php');  // On redirige vers la page utilisateur
            }
        }
    } 
      if(isset($_GET['login_err']))
    {
        $err = htmlspecialchars($_GET['login_err']);
        switch($err)
        {
            case 'email' : ?>
              <div class="col-md-6 mt-3 alert alert-danger">
                <strong> Erreur! </strong> Email différent !
              </div>
          <?php
            break;
            case 'password' : ?>
              <div class="col-md-6 mt-3 alert alert-danger">
                <strong> Erreur! </strong> Mot de passe incorrect !
              </div>
          <?php
            break;
        }
    }
}

require "header.php"; 

?>
</head>
<body class="text-center">
    <main class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <form method="POST">
                <h1 class="h3 mb-3 fw-normal">Connection</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudo">
                <label for="floatingInput">pseudo</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password">
                <label for="floatingPassword">Mot de passe</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Se souvenir de moi
                </label>
            </div>
            <button class="w-10 btn btn-lg btn-primary " type="submit">Se connecter</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
            </form> 
        </div>
    </main>
  </body>
</html>
<?php require "footer.php"; ?>