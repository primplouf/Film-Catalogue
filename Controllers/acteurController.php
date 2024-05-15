<?php

require_once("../Models/Acteur.class.php");
require_once("../Models/Film.class.php");
require_once("../Models/ActeurManager.php");
require_once("../Models/FilmManager.php");
require_once("../Models/Database.class.php");

class acteurController {

    private $ActeurManager;
    private $bdd;

    public function __construct(){
        $bd = new database();
        $this->bdd = $bd->connectDb();
        $this->ActeurManager = new ActeurManager($this->bdd);
    }

    public function addA(){
        $prenom = htmlspecialchars($_POST["prenom"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $a = array("prenom" => "$prenom", "nom" => "$nom");
        $acteur = new Acteur($a);
        if ($this->ActeurManager->addActeur($acteur)){
            $msg = "Acteur ajouté";
        } else {
            $msg = "L'acteur n'a pas été ajouté";
        }
        Header("location: index.php?controller=acteurController&action=tabacteur");
    }

    public function updateA(){
        $id = htmlspecialchars($_POST["id"]);
        $acteur = $this->ActeurManager->getById($id);
        if($_POST["prenom"]!=""){
            $acteur->setPrenom(htmlspecialchars($_POST["prenom"]));
        }
        if($_POST["nom"]==""){
            $acteur->setNom(htmlspecialchars($_POST["nom"]));
        } 
        if ($this->ActeurManager->updateActeur($acteur)){
            $msg = "Acteur modifié";
        } else {
            $msg = "L'acteur n'a pas été modifié";
        }
        Header("location: index.php?controller=acteurController&action=tabacteur");
    }

    public function deleteA(){
        $id = htmlspecialchars($_POST["id"]);
        $a = array("id" => "$id");
        $acteur = new Acteur($a);
        if ($this->ActeurManager->deleteActeur($acteur)){
            $CastingManager = new CastingManager($this->bdd);
            $castings = $CastingManager->getByIdA($id);
            foreach($castings as $casting){
                $CastingManager->deleteCasting($casting);
            }
            $msg = "Acteur supprimé";
        } else {
            $msg = "L'acteur n'a pas été supprimé";
        }
        Header("location: index.php?controller=acteurController&action=tabacteur");
    }

    public function getAllA(){
        $acteurs = $this->ActeurManager->getList();
        return $acteurs;
    }

    public function getActorsInF(Film $film){
        $acteurs = $this->ActeurManager->getActorsInFilm($film);
        return $acteurs;
    }

    public function afficheA(){
        $acteurs = $this->ActeurManager->getList();
        $FilmManager = new FilmManager($this->bdd);
        $filmsWithActors = array();
        foreach($acteurs as $acteur){
            $films = $FilmManager->getFilmsWithActor($acteur);
            $filmsWithActors[$acteur->id()]['acteur'] = $acteur;
            $filmsWithActors[$acteur->id()]['films'] = $films;
        }
        include("../Views/acteur.php");
    }
}

?>