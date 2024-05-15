<?php 
$title = "Ma médiathèque de films";
?>
<?php ob_start(); ?>
<h1>Connexion</h1>
<form action="index.php?controller=userController&action=connexion" method="post">
<label>Identifiant</label></br>
<input type="text" placeholder="Pseudo ou adresse mail" name="loginmail">
<hr style="visibility:hidden;">
<label>Mot de passe</label></br>
<input type="password" placeholder="Mot de passe" name="pwd"/>
<hr style="visibility:hidden;"></br>
<input type="submit" value="Valider" name="valid">
</form>

<?php $content = ob_get_clean(); ?>

<?php require_once("layout.php") ?>
