<?php 
$host = "mysql:host=localhost;dbname=id18910649_deal_mia"; // deal_mia
$login = "id18910649_deal_mia_973"; // login : deal_mia_973
$password ="Miatti_marcello_973"; // mdp Miatti_marcello_973
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // gestion des erreurs
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); // on force l'utf8 sur les données provenants de la bdd

$connexion_bdd = new PDO($host,$login,$password,$options);