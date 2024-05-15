<?php

require_once("../Models/Casting.class.php");
require_once("../Models/Film.class.php");
require_once("../Models/Acteur.class.php");
require_once("../Models/CastingManager.php");
require_once("../Models/Database.class.php");

class castingController {
    
    private $bdd;
    private $CastingManager;

    public function __construct()
    {
        $bd = new database();
        $this->bdd = $bd->connectDb();
        $this->CastingManager = new CastingManager($this->bdd);
    }

    public function addC()
    {
        $film_id = htmlspecialchars($_POST["film_id"]);
        $acteur_id = htmlspecialchars($_POST["acteur_id"]);
        $c = array("film_id" => $film_id, "acteur_id" => $acteur_id);
        $casting = new Casting($c);
        if ($this->CastingManager->addCasting($casting)){
            $msg = "Casting ajouté";
        } else {
            $msg = "Le casting n'a pas été ajouté";
        }
        header("location: index.php?controller=castingController&action=tabcasting");
    }

    public function deleteC()
    {
        $film_id = htmlspecialchars($_POST["film_id"]);
        $acteur_id = htmlspecialchars($_POST["acteur_id"]);
        $c = array("film_id" => $film_id, "acteur_id" => $acteur_id);
        $casting = new Casting($c);
        if ($this->CastingManager->deleteCasting($casting)){
            $msg = "Casting supprimé";
        } else {
            $msg = "Le casting n'a pas été supprimé";
        }
        header("location: index.php?controller=castingController&action=tabcasting");    }

    public function getALLC()
    {
        $castings = $this->CastingManager->getList();
        return $castings;
    }

    public function getByFA(Film $film, Acteur $acteur)
    {
        $castings = $this->CastingManager->getBy($film, $acteur);
        return $castings;
    }

    public function afficheC(){
        $castings = $this->CastingManager->getList();
        include("../Views/casting.php");
    }
}

?>