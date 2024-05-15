<?php 
$title = "Ma médiathèque de films";
?>
<?php ob_start(); ?>
<h1>Mes castings</h1>
<table border=1>
    <?php
    echo "<tr><th>Id</th><th>Film</th><th>Id</th><th>Acteur</th></tr>";
    foreach($castings as $casting){
        $acteur = $casting["acteur"];
        $film = $casting["film"];
        echo "<tr>";
        echo "<td>".$film->id()."</td>";
        echo "<td>".$film->nom()."</td>";
        echo "<td>".$acteur->id()."</td>";
        echo "<td>".$acteur->prenom()." ".$acteur->nom()."</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php     
    if(isset($_SESSION["id"])){
?>
        <form action="index.php?controller=castingController&action=add" method="post">
            <label>Numéro d'identifiant du film</label></br>
            <input type="number" placeholder="Id du film" name="film_id"/>
            <hr style="visibility:hidden;">
            <label>Numéro d'identifiant de l'acteur</label></br>
            <input type="number" placeholder="Id de l'acteur" name="acteur_id"/>
            <hr style="visibility:hidden;">
            <input type="submit" value="Ajouter" nam="valid"/>
        </form>
        </br>
        <form action="index.php?controller=castingController&action=delete" method="post">
            <label>Numéro d'identifiant du film</label></br>
            <input type="text" placeholder="Id du film" name="film_id"/>
            <hr style="visibility:hidden;">
            <label>Numéro d'identifiant de l'acteur</label></br>
            <input type="text" placeholder="Id de l'acteur" name="acteur_id"/>
            <hr style="visibility:hidden;">
            <input type="submit" value="Supprimer" nam="valid"/>
        </form>
<?php 
        }
?>
<?php $content = ob_get_clean(); ?>

<?php require_once("layout.php") ?>
