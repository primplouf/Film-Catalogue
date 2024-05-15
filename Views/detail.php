<?php 
$title = "Ma médiathèque de films";
?>
<?php ob_start(); ?>
<h1>Détail du film</h1>
<table border=1>
    <?php
    echo "<tr><th>Id</th><th>Nom</th><th>Année de sortie</th>
    <th>Score</th><th>Nombre de votes</th><th>Acteurs</th>
    </tr>";
    //var_dump($castings, count($castings));
    $countActors = count($castings);
    echo "<tr>";
    echo "<td>".$film->id()."</td>";
    echo "<td>".$film->nom()."</td>";
    echo "<td>".$film->annee()."</td>";
    echo "<td>".$film->score()."</td>";
    echo "<td>".$film->vote()."</td>";
    echo "<td>";
    foreach($castings as $i => $casting){
        $acteur = $casting["acteur"];
        echo $acteur->id() . " - " . $acteur->prenom()." ".$acteur->nom() . "<br>";
    }
    echo "</td></tr>";
    ?>
</table>
<?php $content = ob_get_clean(); ?>

<?php require_once("layout.php") ?>
