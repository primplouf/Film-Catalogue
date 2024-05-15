<?php 
$title = "Ma médiathèque de films";
?>
<?php ob_start(); ?><form action="index.php?controller=userController&action=inscription" method="post">
<h1>Connexion</h1>
<label>Identifiant</label></br>
<input type="text" placeholder="Pseudo" name="login">
<hr style="visibility:hidden;">
<label>Adresse mail</label></br>
<input type="text" placeholder="Adresse mail" name="email"/>
<hr style="visibility:hidden;">
<label>Mot de passe</label></br>
<input type="password" placeholder="Mot de passe" name="pwd"/>
<hr style="visibility:hidden;">
<input type="submit" value="Valider" name="valid">
</form>

<?php $content = ob_get_clean(); ?>

<?php require_once("layout.php") ?>
