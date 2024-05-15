<?php 

require_once("../Models/Database.class.php");
require_once("../Models/FilmManager.php");
require_once("../Models/ActeurManager.php");
require_once("../Models/Film.class.php");
require_once("../Models/Acteur.class.php");


class filmController {
    private $FilmManager;
    private $bdd;

    public function __construct(){
        $bd = new database();
        $this->bdd = $bd->connectDb();
        $this->FilmManager = new FilmManager($this->bdd);
    }

    function addF(){
        $n = htmlspecialchars($_POST['nom']);
        $a = htmlspecialchars($_POST['annee']);
        $s = htmlspecialchars($_POST['score']);
        $nb = htmlspecialchars($_POST['nbvotants']);
        $f = array("nom" => "$n", "annee" => "$a", "score" => "$s", "nb_vote" => "$nb");
        $film = new Film($f);
        if ($this->FilmManager->addFilm($film)){
            $msg = "film add";

        } else {
            $msg = "Le film n'a pas été ajouté";

        }
        header("location: index.php?controller=filmController&action=tabfilm");
    }

    function updateF(){
        $id = htmlspecialchars($_POST["id"]);
        $film = $this->FilmManager->getById($id);
        if($_POST["nom"]!=""){
            $film->setNom(htmlspecialchars($_POST["nom"]));
        }
        if($_POST["annee"]!=""){
            $film->setAnnee(htmlspecialchars($_POST["annee"]));
        }
        if($_POST["score"]!=""){
            $film->setScore(htmlspecialchars($_POST["score"]));
        }
        if($_POST["nbvotants"]!=""){
            $film->setNb_vote(htmlspecialchars($_POST["nbvotants"]));
        }
        if ($this->FilmManager->updateFilm($film)){
            $msg = "film modifié";
        } else {
            $msg = "Le film n'a pas été modifié";
        }
        header("location: index.php?controller=filmController&action=tabfilm");   
     }

    function deleteF(){
        $id = htmlspecialchars($_POST["id"]);
        if ($this->FilmManager->deleteFilm($id)){
            $CastingManager = new CastingManager($this->bdd);
            $castings = $CastingManager->getByIdF($id);
            foreach($castings as $casting){
                $CastingManager->deleteCasting($casting);
            }
            $msg = "film supprimé";
        } else {
            $msg = "Le film n'a pas été supprimé";
        }
        header("location: index.php?controller=filmController&action=tabfilm");    
    }
    
    function getALLF(){
        $films = $this->FilmManager->getList();
        return $films;
    }

    function getFilmsWithA(Acteur $acteur){
        $films = $this->FilmManager->getFilmsWithActor($acteur);
        return $films;
    }

    public function afficheF(){
        $films = $this->FilmManager->getList();
        $ActeurManager = new ActeurManager($this->bdd);
        $actorsInFilm = array();
        foreach($films as $film){
            $acteurs = $ActeurManager->getActorsInFilm($film);
            $actorsInFilm[$film->id()]['film'] = $film;
            $actorsInFilm[$film->id()]['acteurs'] = $acteurs;
        }
        include("../Views/film.php");
    }

    function detailsF($idf){
        $film = $this->FilmManager->getById($idf);
        $CastingManager = new CastingManager($this->bdd);
        $castings = $CastingManager->getList($idf);
        include("../Views/detail.php");
    }
}
?>