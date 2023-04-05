<?php
$action=$_GET['action'];
switch($action){
    case 'list' :
        var_dump($action);
        $lesContinents=Continent::findAll();
        include('vues/listeContinent.php');
        break;
    case 'add' :
        $mode="Ajouter";
        include('vues/formContinent.php');
        break;
    case 'update' :
        $mode="Modifier";
        $continent=Continent::findById($_GET['num']);
        include('vues/formContinent.php');
        break;
    case 'delete' :
        $continent=Continent::findById($_GET['num']);
        $nb=Continent::delete($continent);
        if($nb==1){
            $_SESSION['message']=["success"=>"Le continent a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"Le continent n'a pas été supprimé"];
        }
        header('location: index.php?uc=continents&action=list');
        exit();
        break;
    case 'validForm' :
        $continent= new Continent();
        if(empty($_POST['num'])){ // cas d'une création
            $continent->setLibelle($_POST['libelle']);
            $nb=Continent::add($continent);
            $message = "ajouté";
        }else{ //cas d'une modif
            $continent->setNum($_POST['num']);
            $continent->setLibelle($_POST['libelle']);
            $nb=Continent::update($continent);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"Le continent a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"Le continent n'a pas été $message"];
        }
        header('location: index.php?uc=continents&action=list');
        exit();
        break;
}
?>