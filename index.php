<?php
session_start();
if(isset($_GET["controller"])){
    $controller = $_GET["controller"];
    $action = $_GET["action"];
} else {
    $controller = "";
    $action = "";
}

require_once("Controllers/filmController.php");
require_once("Controllers/acteurController.php");
require_once("Controllers/userController.php");
require_once("Controllers/castingController.php");

switch($controller){
    case "filmController" : $fc = new filmController();
    switch($action){
        case "add" : $fc->addF(); break;
        case "update" : $fc->updateF(); break;
        case "delete" : $fc->deleteF(); break;
        case "tabfilm" : $fc->afficheF(); break;
        case "detailFilm" : $fc->detailsF($_GET["id"]); break;
    }
    break;
    case "acteurController" : $ac = new acteurController();
    switch($action){
        case "add" : $ac->addA(); break;
        case "update" : $ac->updateA(); break;
        case "delete" : $ac->deleteA(); break;
        case "tabacteur" : $ac->afficheA(); break;
    }
    break;
    case "userController" : $uc = new userController();
    switch($action){
        case "inscription" : $uc->addU(); break;
        case "connexion" : $uc->connexion(); break;
        case "deconnexion" : $uc->deconnexion(); break;
        case "profil" : $uc->afficheP(); break;
        case "sinscrire" : $uc->afficheI(); break;
        case "seconnecter" : $uc->afficheC(); break;
    }
    break;
    case "castingController" : $cc = new castingController();
    switch($action){
        case "add" : $cc->addC(); break;
        case "delete" : $cc->deleteC(); break;
        case "tabcasting" : $cc->afficheC(); break;
    }
    break;
    case "voteController" : $cc = new votecontroller();
    switch($action){
        case "add" : $cc->addV(); break;
        case "update" : $cc->updateV(); break;
    }
    break;
    default : $fc = new filmController(); $fc->afficheF(); break;
}
?>