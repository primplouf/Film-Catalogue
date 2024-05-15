<?php 
$title = "Ma médiathèque de films";
?>
<?php ob_start(); ?>
<h1>Ma médiathèque d'acteurs</h1>
<table border=1>
    <?php
    echo "<tr><th>Id</th><th>Acteur</th><th>Films</th></tr>";
    foreach($filmsWithActors as $fwa){
        $acteur = $fwa["acteur"];
        $films = $fwa["films"];
        echo "<tr>";
        echo "<td>".$acteur->id()."</td>";
        echo "<td>".$acteur->prenom()." ".$acteur->nom()."</td>";
        echo "<td>";
        foreach($films as $film){
            echo $film->nom()."</br>";
        }
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php     
    if(isset($_SESSION["id"])){
?>
        <form action="index.php?controller=acteurController&action=add" method="post">
            <label>Prenom</label></br>
            <input type="text" placeholder="Prenom" name="prenom"/>
            <hr style="visibility:hidden;">
            <label>Nom</label></br>
            <input type="text" placeholder="Nom" name="nom"/>
            <hr style="visibility:hidden;">
            <input type="submit" value="Ajouter" nam="valid"/>
        </form>
        </br>
        <form action="index.php?controller=acteurController&action=update" method="post">
            <label>Numéro d'identifiant</label></br>
            <input type="number" placeholder="Id" name="id"/>
            <hr style="visibility:hidden;">
            <label>Prenom</label></br>
            <input type="text" placeholder="Prenom" name="prenom"/>
            <hr style="visibility:hidden;">
            <label>Nom</label></br>
            <input type="text" placeholder="Nom" name="nom"/>
            <hr style="visibility:hidden;">
            <input type="submit" value="Modifier" nam="valid"/>
        </form>
        </br>
        <form action="index.php?controller=acteurController&action=delete" method="post">
            <label>Numéro d'identifiant</label></br>
            <input type="number" placeholder="Id" name="id"/>
            <hr style="visibility:hidden;">
            <input type="submit" value="Supprimer" nam="valid"/>
        </form>
<?php 
        }
?>
<?php $content = ob_get_clean(); ?>

<?php require_once("layout.php") ?>
