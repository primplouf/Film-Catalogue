<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $title ?></title>
        <link href="../style.css" rel="stylesheet" /> 
        <meta charset="utf-8">
    </head>
    <body>
        <ul>
            <li><a href="index.php?controller=filmController&action=tabfilm">Films</a></li>
            <li><a href="index.php?controller=acteurController&action=tabacteur">Acteurs</a></li>
            <li><a href="index.php?controller=castingController&action=tabcasting">Casting</a></li>
            <?php     
            if(isset($_SESSION["id"])){
            ?>
                <li style="float:right"><a href="index.php?controller=userController&action=profil">Mon profil</a></li>
                <li style="float:right"><a href="index.php?controller=userController&action=deconnexion">Se déconnecter</a></li>
            <?php 
            } else {
            ?>
                <li style="float:right"><a href="index.php?controller=userController&action=seconnecter">Se connecter</a></li>
                <li style="float:right"><a href="index.php?controller=userController&action=sinscrire">S'inscrire</a></li>
            <?php 
            }
            ?>      
        </ul>
        <?php
        if(isset($msg)){
            echo $msg;
        }
        ?>
        <?= $content ?>
    </body>
</html>