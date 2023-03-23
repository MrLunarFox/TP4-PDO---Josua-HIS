<?php
$action=$_GET['action'];
switch($action){
    case 'list' :
        $lesAuteurs=Auteur::findAll();
        include('vues/listeAuteur.php');
        break;
    case 'add' :
        $mode="Ajouter";
        include('vues/formAuteur.php');
        break;
    case 'update' :
        $mode="Modifier";
        $auteur=Auteur::findById($_GET['num']);
        include('vues/formAuteur.php');
        break;
    case 'delete' :
        $auteur=Auteur::findById($_GET['num']);
        $nb=Auteur::delete($auteur);
        if($nb==1){
            $_SESSION['message']=["success"=>"L'Auteur a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"L' Auteur n'a pas été supprimé"];
        }
        header('location: index.php?uc=auteurs&action=list');
        exit();
        break;
    case 'validForm' :
        $auteur= new Auteur();
        if(empty($_POST['num'])){ // cas d'une création
            $auteur->setNom3($_POST['nom']);
            $nb=Auteur::add($auteur);
            $message = "ajouté";
        }else{ //cas d'une modif
            $auteur->setNum3($_POST['num']);
            $auteur->setNom3($_POST['nom']);
            $nb=Auteur::update($auteur);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"L'Auteur a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"L'Auteur n'a pas été $message"];
        }
        header('location: index.php?uc=auteurs&action=list');
        exit();
        break;
}
?>