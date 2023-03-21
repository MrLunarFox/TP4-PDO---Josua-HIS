<?php
$action=$_GET['action'];
switch($action){
    case 'list' :
        $lesNationalites=Nationalite::findAll();
        include('vues/listeNationalite.php');
        break;
    case 'add' :
        $mode="Ajouter";
        include('vues/formNationalite.php');
        break;
    case 'update' :
        $mode="Modifier";
        $nationalite=Nationalite::findById($_GET['num']);
        include('vues/formNationalite.php');
        break;
    case 'delete' :
        $nationalite=Nationalite::findById($_GET['num']);
        $nb=Nationalite::delete($nationalite);
        if($nb==1){
            $_SESSION['message']=["success"=>"La nationalite a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"La nationalite n'a pas été supprimé"];
        }
        header('location: index.php?uc=nationalites&action=list');
        exit();
        break;
    case 'validForm' :
        $nationalite= new Nationalite();
        if(empty($_POST['num'])){ // cas d'une création
            $nationalite->setLibelle2($_POST['libelle']);
            $nb=Nationalite::add($nationalite);
            $message = "ajouté";
        }else{ //cas d'une modif
            $nationalite->setNum2($_POST['num']);
            $nationalite->setLibelle2($_POST['libelle']);
            $nb=Nationalite::update($nationalite);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"La nationalite a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"La nationalite n'a pas été $message"];
        }
        header('location: index.php?uc=nationalites&action=list');
        exit();
        break;
}
?>