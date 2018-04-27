<?php
if(isset($_SESSION["pseudo"])){
	if( ($_SESSION["id"])=="115"){
	//	header("Location:home.php?action=adminOnly");
		require("adminPage.php");//temporaire
		//echo "hello";
	}

}
else{
	echo'<section>
	<div id="AdminConnexion">
		<p class="warning">Seul l\'administrateur de ce blog à accès à cette section.<br/>
		 Veulliez retrournez<a href="./home.php"> à la page d\'accueil </a>ou <a href="./home.php?action=inscription"> connecter vous à votre espace</a> pour profiter des fonctionnalitées du site.<br/>
		Merci.</p>';
}
?>

	<!-- 	<p class="warning">Seul l'administrateur de ce blog à accès à cette section.<br/>
		 Veulliez retrournez<a href="./home.php"> à la page d'accueil </a>ou <a href="./home.php?action=inscription"> connecter vous à votre espace</a> pour profiter des fonctionnalitées du site.<br/>
		Merci.</p> -->
			<h3>Connexion: </h3>
				<form method="post" action="./home.php?action=adminOnly">
					<label name="IdAdmin"> Pseudo:<input type="text" name="IdAdmin" id="IdAdmin" required></label>
					<label name="PwdAdmin">Mot de passe:<input type="password" name="PwdAdmin" id="PwdAdmin" required /></label>
					<input type="submit" id="validation" value="Entrer" />
				</form>
		</div>
</section>