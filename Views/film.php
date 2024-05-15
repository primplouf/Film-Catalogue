<?php 
$title = "Ma médiathèque de films";
?>
<?php ob_start(); ?>
<h1>Ma médiathèque de films</h1>
<table border=1>
    <?php
    echo "<tr><th>Id</th><th>Film</th><th>Acteurs</th><th>Plus d'informations</th></tr>";
    foreach($actorsInFilm as $aif){
        $film = $aif["film"];
        $acteurs = $aif["acteurs"];
        $id = $film->id();
        echo "<tr>";
        echo "<td>".$film->id()."</td>";
        echo "<td>".$film->nom()."</td>";
        echo "<td>";
        foreach($acteurs as $acteur){
            echo $acteur->prenom()." ".$acteur->nom()."</br>";
        }
        echo "</td>";
        ?>
        <td><a href="index.php?controller=filmController&action=detailFilm&id=<?= $id ?>">Détails</a></td>
        <?php
        echo "</tr>";
    }
    ?>
</table>
<?php     
    if(isset($_SESSION["id"])){
?>
        <form action="index.php?controller=filmController&action=add" method="post">
        <label>Nom du film</label></br>
        <input type="text" placeholder="Titre" name="nom"/>
        <hr style="visibility:hidden;">
        <label>Année de sortie</label></br>
        <input type="number" placeholder="Année de sortie" name="annee"/>
        <hr style="visibility:hidden;">
        <label>Score</label></br>
        <input type="number" placeholder="Score" name="score"/>
        <hr style="visibility:hidden;">
        <label>Nombre de votants</label></br>
        <input type="number" placeholder="Nombre de votants" name="nbvotants"/>
        <hr style="visibility:hidden;">
        <input type="submit" value="Ajouter" name="valid"/>
        </form>
        </br>
        <form action="index.php?controller=filmController&action=update" method="post">
        <label>Numéro d'identifiant</label></br>
        <input type="number" placeholder="Id" name="id"/>
        <hr style="visibility:hidden;">
        <label>Nom du film</label></br>
        <input type="text" placeholder="Titre" name="nom"/>
        <hr style="visibility:hidden;">
        <label>Année de sortie</label></br>
        <input type="number" placeholder="Année de sortie" name="annee"/>
        <hr style="visibility:hidden;">
        <label>Score</label></br>
        <input type="number" placeholder="Score" name="score"/>
        <hr style="visibility:hidden;">
        <label>Nombre de votants</label></br>
        <input type="number" placeholder="Nombre de votants" name="nbvotants"/>
        <hr style="visibility:hidden;">
        <input type="submit" value="Modifier" name="valid"/>
        </form>
        </br>
        <form action="index.php?controller=filmController&action=delete" method="post">
        <label>Numéro d'identifiant</label></br>
        <input type="number" placeholder="Id" name="id"/>
        <hr style="visibility:hidden;">
        <input type="submit" value="Supprimer" name="valid"/>
        </form>
<?php 
        }
?>
<?php $content = ob_get_clean(); ?>

<?php require_once("layout.php") ?>
