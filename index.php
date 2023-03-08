<?php session_start(); ?>

<?php include "vues/header.php";

$us = empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($us){
  case 'accueil' :
    include('vues/accueil.php');
    break;
  case 'continents' :
    break;
}

include "vues/footer.php";?>