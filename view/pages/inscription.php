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

		<div class="formulaires">
			<h3>Inscription:</h3>
				<form method="post" action="./home.php?action=subscribeMember">
					<label name="lastname">Nom:<input type="text" name="lastname" id="nom" required /></label>
							

					<label name="firstname"> Prénom:<input type="text" name="firstname" id="firstname" required /></label>
							

					<label name="pseudo"> Pseudo:<input type="text" name="pseudo" id="pseudo" required></label>
							

					<label name="mail"> Adresse mail:<input type="email" name="mail" id="mail" required/></label>
							<span id="mailcheck"></span>

					<label name="mdp">Mot de passe:<input type="password" name="mdp" id="motDpasse" required /></label>
							<span id="longueurMDP"></span>

					<label name="mdp1">Cofirmation du mot de passe:<input type="password" name="mdp1" id="mdp1" required /></label>
					<span id="statutMDP"></span>

					<input type="submit" id="valide" value="Valider" />
				</form>
				<!-- <?php //var_dump($infoUser); ?> -->
		</div>

		<div class="formulaires">
			<h3>Connexion: </h3>
				<form method="post" action="./home.php?action=logger">
					<label name="checkPseudo"> Pseudo:<input type="text" name="checkPseudo" id="pseudoMember" required></label>
					<label name="checkmdp">Mot de passe:<input type="password" name="checkmdp" id="motDpasseMember" required /></label>
					<input type="submit" id="validation" value="Valider" />
				</form>
		</div>
		</div> <!-- end of subBlock -->
	</div><!--end secondSideDeco-->
</section>

		<!-- <script type="text/javascript" src="../javascript/validInscription.js"></script>
 -->
 </body>
</html>