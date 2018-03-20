<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">

	<meta name="description" content="Découvert le nouveau roman de Jean Forteroche, 'Billet simple pour Alaska'.(Projet Openclassroom)">

	<meta name="keywords" content="Billet simple pour l'Alaska, Jean Forteroche, Roman, Livre, En Ligne, nouveautées, Actulitée, Auteur" />
		<!--Meta Facebook-->
	<meta property="og:title" content="Billet simple ppir l'Alaska, par JF" />
	<meta property="og:type" content="article" /> 
	<meta property="og:url" content="http://www.projet4.laura-lariccia.fr" /> 
	<meta property="og:image" content="images/" /> 
	<meta property="og:description" content="Le nouveau roman de Jean ForteRoche" /> 
	<meta property="og:site_name" content="Billet simple ppir l'Alaska, par JF" /> 
	<meta property="fb:admins" content="Facebook numeric ID" />
		
		<!--Meta Twitter-->
	<meta name="twitter:card" content="images/.png">
	<meta name="twitter:site" content="@laura"> 
	<meta name="twitter:title" content="Billet simple ppir l'Alaska, par JR">
	<meta name="twitter:description" content="Le nouveau roman de Jean ForteRoche"> 
	<meta name="twitter:creator" content="@author_handle">
	<meta name="twitter:image:src" content="images.png">
		<!--FIN META -->
		
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/stylesA.css">
	<link rel="stylesheet" type="text/css" href="../css/stylesResponsiv.css">
	<!--POLICES-->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet">
	<title>Devenir Membre</title>
	</head>

	<body>
		<?php 
		require('../portions/header.php');
		?>
		<section>
			<div id="secondSideDeco">	
				<article id="rules">
					<h4 class="subInfo">Avant de continuer..</h4>
						<p> Remplissez le formulaire  pour rejoindre notre communauté! </br>
						Devenez membre et profiter de contenu exclusif.
						Paratger vos impressions avec les autres utilisateurs, en postant des messages sur les billets et chapitres postés par l'auteur.  </br></br>

						<i>En remplissant, et acceptant l'envoie du formulaire vous acceptez l'utilisation des cookies.</br>
						Les informations renseignées ne seront utilisées que sur ce site.</i>
						</p>
				</article>
			<div id="subBlock">
				<aside class="formulaires">
					<h3>Inscription:</h3>
						<form method="post" action="espacemembre.php">
							<label name="lastname">Nom:<input type="text" name="lastname" id="nom" required /></label>
							

							<label name="firstname"> Prénom:<input type="text" name="firstname" id="firstname" required /></label>
							

							<label name="pseudo"> Pseudo:<input type="text" name="pseudo" id="pseudo" required></label>
							

							<label name="mail"> Adresse mail:<input type="email" name="mail" id="mail" required/></label>
							<span id="mailcheck"></span>

							<label name="mdp">Mot de passe:<input type="password" name="mdp" id="motDpasse" required /></label>
							<span id="longueurMDP"></span>

							<label name="mdp1">Cofirmation du mot de passe:<input type="password" name="mdp1" id="mdp1" required /></label>
							<span id="statutMDP"></span>

							<!--<textarea name="signature" row="2" col="35"> Ecrivez ici votre signature.
							</textarea> -->
							<input type="submit" id="validation" value="Valider" />
						</form>
				</aside>
				<aside class="formulaires">
					<h3>Connexion: </h3>
					<form method="post" action="espacemembre.php">
						<label name="checkPseudo"> Pseudo:<input type="text" name="checkPseudo" id="pseudo" required></label>
						<label name="checkmdp">Mot de passe:<input type="password" name="checkmdp" id="motDpasse" required /></label>
						<input type="submit" id="validation" value="Valider" />
					</form>
				</aside>
			</div> <!-- end of subBlock -->
			</div><!--end secondSideDeco-->
		</section>
			<footer>
				<?php require ("../portions/mentionsLeg.php");
					?>
			</footer>
		</section>

		<script type="text/javascript" src="../javascript/validInscription.js"></script>
	</body>
</html>